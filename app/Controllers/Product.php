<?php

namespace App\Controllers;

use App\Models\ProductModel;
use Dompdf\Dompdf;

class Product extends BaseController
{
    protected $product; 

    function __construct()
    {
        $this->product = new ProductModel();
    }

    public function index()
    {
        $product = $this->product->findAll();
        $data['product'] = $product;

        return view('v_product', $data);
    }

    public function create()
{
    $dataFoto = $this->request->getFile('foto');

    $dataForm = [
        'nama' => $this->request->getPost('nama'),
        'harga' => $this->request->getPost('harga'),
        'jumlah' => $this->request->getPost('jumlah'),
        'created_at' => date("Y-m-d H:i:s")
    ];

    if ($dataFoto->isValid()) {
        $fileName = $dataFoto->getRandomName();
        $dataForm['foto'] = $fileName;
        $dataFoto->move('assets/images/', $fileName);
    }

    $this->product->insert($dataForm);

    return redirect('product')->with('success', 'Data Berhasil Ditambah');
} 

    public function edit($id)
    {
        $dataFoto = $this->request->getFile('foto');
        $dataForm = [
            'nama' => $this->request->getPost('nama'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
            'updated_at' => date("Y-m-d H:i:s")
        ];

        if ($dataFoto->isValid()) {
            $fileName = $dataFoto->getRandomName();
            $dataForm['foto'] = $fileName;
            $dataFoto->move('assets/images/', $fileName);
        }

        $this->product->update($id, $dataForm);

        return redirect('product')->with('success', 'Data Berhasil Diubah');
    }

    public function delete($id)
    {
        $dataProduk = $this->product->find($id);

        if ($dataProduk['foto'] != '' and file_exists("assets/images/" . $dataProduk['foto'] . "")) {
            unlink("assets/images//" . $dataProduk['foto']);
        }

        $this->product->delete($id);

        return redirect('product')->with('success', 'Data Berhasil Dihapus');
    }

    public function download()
    {
            //get data from database
        $product = $this->product->findAll();

            //pass data to file view
        $html = view('v_productPDF', ['product' => $product]);

            //set the pdf filename
        $filename = date('y-m-d-H-i-s') . '-produk';

        // instantiate and use the dompdf class
        $dompdf = new Dompdf();

        // load HTML content (file view)
        $dompdf->loadHtml($html);

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
