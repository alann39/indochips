<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

// using user-defined namespace for UserModel
use App\Models\UserModel;

class AuthController extends BaseController
{
    protected $user;

    function __construct()
{
    helper('form');
    $this->user = new UserModel();
}

    public function index()
    {
        $data = [
            'title' => 'Login',
            'hlm' => 'Login'
        ];
        return view('v_login', $data);
    }

    public function login()
{
    if ($this->request->getPost()) {
        $rules = [
            'username' => 'required|min_length[6]',
            'password' => 'required|min_length[7]',
        ];

        if ($this->validate($rules)) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');

            $dataUser = $this->user->where(['username' => $username])->first(); //pasw 1234567

            if ($dataUser) {
                if (password_verify($password, $dataUser['password'])) {
                    session()->set([
                        'username' => $dataUser['username'],
                        'role' => $dataUser['role'],
                        'isLoggedIn' => TRUE
                    ]);

                    return redirect()->to(base_url('/'));
                } else {
                    session()->setFlashdata('failed', 'Kombinasi Username & Password Salah');
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('failed', 'Username Tidak Ditemukan');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('failed', $this->validator->listErrors());
            return redirect()->back();
        }
    }

    return view('v_login');
    
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'hlm' => 'Register'
        ];
        return view('v_register', $data);
    }

    public function processRegister()
    {
        if ($this->request->getPost()) {
            $rules = [
                'username' => 'required|min_length[6]|is_unique[user.username]',
                'email' => 'required|valid_email|is_unique[user.email]',
                'password' => 'required|min_length[7]',
                'password_confirm' => 'required|matches[password]'
            ];

            if ($this->validate($rules)) {
                $username = $this->request->getVar('username');
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');

                $this->user->save([
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role' => 'user',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);

                session()->setFlashdata('success', 'Registrasi berhasil! Silakan login.');
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('failed', $this->validator->listErrors());
                return redirect()->back()->withInput();
            }
        }
        return redirect()->to('/register');
    }
}
