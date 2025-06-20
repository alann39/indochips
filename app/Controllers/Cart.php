<?php

namespace App\Controllers;

class Cart extends BaseController
{
    protected $cart;

        function __construct()
        {
            helper('number');
            helper('form');
            $this->cart = \Config\Services::cart();
        }

        public function index()
        {
            $data['items'] = $this->cart->contents();
            $data['total'] = $this->cart->total();
            return view('v_cart', $data);
        }

        public function cart_add()
        {
            $this->cart->insert(array(
                'id'        => $this->request->getPost('id'),
                'qty'       => 1,
                'price'     => $this->request->getPost('harga'),
                'name'      => $this->request->getPost('nama'),
                'options'   => array('foto' => $this->request->getPost('foto'))
            ));
            session()->setflashdata('success', 'Produk berhasil ditambahkan ke Cart. (<a href="' . base_url() . 'cart">Lihat</a>)');
            return redirect()->to(base_url('/'));
        }

        public function cart_clear()
        {
            $this->cart->destroy();
            session()->setflashdata('success', 'Keranjang Berhasil Dikosongkan');
            return redirect()->to(base_url('cart'));
        }

        public function cart_edit()
        {
            $i = 1;
            foreach ($this->cart->contents() as $value) {
                $this->cart->update(array(
                    'rowid' => $value['rowid'],
                    'qty'   => $this->request->getPost('qty' . $i++)
                ));
            }

            session()->setflashdata('success', 'Keranjang Berhasil Diedit');
            return redirect()->to(base_url('cart'));
        }

        public function cart_delete($rowid)
        {
            $this->cart->remove($rowid);
            session()->setflashdata('success', 'Keranjang Berhasil Dihapus');
            return redirect()->to(base_url('cart'));
        }
}
