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
        if ($status && in_array($status, ['Pending','Completed','Failed'])) {
            $query = $query->where('status', $status);
        }
        if ($search) {
            $query = $query->like('username', $search);
        }
        $orders = $query->orderBy('created_at', 'DESC')->findAll();
        // Statistik
        $totalOrders = $model->countAllResults();
        $totalRevenue = $model->selectSum('total_harga')->first()['total_harga'] ?? 0;
        $completedOrders = $model->where('status', 'Completed')->countAllResults();
        $pendingOrders = $model->where('status', 'Pending')->countAllResults();
        return view('admin/orders_dashboard', [
            'orders' => $orders,
            'totalOrders' => $totalOrders,
            'totalRevenue' => $totalRevenue,
            'completedOrders' => $completedOrders,
            'pendingOrders' => $pendingOrders,
            'filterStatus' => $status,
            'search' => $search,
        ]);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        if (!in_array($status, ['Pending','Completed','Failed'])) {
            return $this->response->setStatusCode(ResponseInterface::HTTP_BAD_REQUEST)->setJSON(['error'=>'Invalid status']);
        }
        $model = new TransactionModel();
        $model->update($id, ['status' => $status]);
        return redirect()->back()->with('message', 'Status updated!');
    }

    public function downloadReport()
    {
        $model = new TransactionModel();
        $orders = $model->findAll();
        $filename = 'orders_report_' . date('Ymd_His') . '.csv';
        $csv = "No,Username,Alamat,Total Harga,Ongkir,Status,Tanggal\n";
        foreach ($orders as $i => $order) {
            $csv .= ($i+1) . ',"' . $order['username'] . '","' . $order['alamat'] . '",' . $order['total_harga'] . ',' . $order['ongkir'] . ',"' . $order['status'] . '","' . $order['created_at'] . "\n";
        }
        return $this->response
            ->setHeader('Content-Type', 'text/csv')
            ->setHeader('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->setBody($csv);
    }
} 