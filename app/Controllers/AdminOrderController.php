<?php
namespace App\Controllers;
use App\Models\TransactionModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminOrderController extends BaseController
{
    public function index()
    {
        $model = new TransactionModel();
        $status = $this->request->getGet('status');
        $search = $this->request->getGet('search');
        $query = $model;
        
        // Filter berdasarkan status numerik
        if ($status !== null && $status !== '') {
            if ($status === 'Completed') {
                $query = $query->where('status', 1);
            } elseif ($status === 'Pending') {
                $query = $query->where('status', 0);
            } elseif ($status === 'Failed') {
                $query = $query->where('status', 2);
            }
        }
        
        if ($search) {
            $query = $query->like('username', $search);
        }
        
        $orders = $query->orderBy('created_at', 'DESC')->findAll();
        
        // Statistik
        $totalOrders = $model->countAllResults();
        $totalRevenue = $model->selectSum('total_harga')->first()['total_harga'] ?? 0;
        $completedOrders = $model->where('status', 1)->countAllResults();
        $pendingOrders = $model->where('status', 0)->countAllResults();
        $failedOrders = $model->where('status', 2)->countAllResults();
        
        return view('admin/orders_dashboard', [
            'orders' => $orders,
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'completedOrders' => $completedOrders,
            'pendingOrders' => $pendingOrders,
            'failedOrders' => $failedOrders,
            'filterStatus' => $status,
            'search' => $search,
        ]);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        
        // Mapping status string ke nilai numerik
        $statusMapping = [
            'Pending' => 0,
            'Completed' => 1,
            'Failed' => 2
        ];
        
        if (!array_key_exists($status, $statusMapping)) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)->setJSON(['error'=>'Invalid status']);
        }
        
        $model = new TransactionModel();
        $model->update($id, ['status' => $statusMapping[$status]]);
        
        // Redirect kembali ke dashboard admin dengan notifikasi
        return redirect()->to(site_url('admin/orders'))->with('success', 'Status pesanan berhasil diupdate!');
    }

    public function downloadReport()
    {
        $model = new TransactionModel();
        $orders = $model->findAll();
        
        $filename = 'orders_report_' . date('Ymd_His') . '.csv';
        $csv = "No,Username,Alamat,Total Harga,Ongkir,Status,Tanggal\n";
        
        $statusMapping = [
            0 => 'Pending',
            1 => 'Completed', 
            2 => 'Failed'
        ];
        
        foreach ($orders as $i => $order) {
            $statusText = $statusMapping[$order['status']] ?? 'Unknown';
            $csv .= ($i+1) . ',"' . $order['username'] . '","' . $order['alamat'] . '",' . $order['total_harga'] . ',' . $order['ongkir'] . ',"' . $statusText . '","' . $order['created_at'] . "\n";
        }
        
        return $this->response
            ->setHeader('Content-Type', 'text/csv')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->setBody($csv);
    }
} 