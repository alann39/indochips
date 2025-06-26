<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Home extends Controller
{
    public function index()
    {
        $file = APPPATH . 'index.html';
        if (file_exists($file)) {
            // Set header agar browser tahu ini HTML
            header('Content-Type: text/html');
            echo file_get_contents($file);
        } else {
            // Jika file tidak ditemukan, tampilkan pesan error
            echo '<h1>404 Not Found.</h1>';
        }
    }
}
