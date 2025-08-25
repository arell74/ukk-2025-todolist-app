<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class Auth extends BaseController
{

    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $data = [
            'title' => 'login',
            'validation' => service('validation')
        ];

        return view('auth/login', $data);
    }

    public function loginProcess()
    {
        $session = session();
        $validation = service('validation');

        $validation->setRules([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $loginInput = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $this->userModel->where('username', $loginInput)
                                ->orWhere('email', $loginInput)
                                ->first();

        if($user) {
            if (password_verify($password, $user['password'])){
                $session->set([
                    'id' =>   $user['id'],
                    'username' => $user['username'],
                    'password' => $user['password'],
                    'email'        => $user['email'],
                    'bio'          => $user['bio'],
                    'foto_profile' => $user['foto_profile'],
                    'logged_in' => true
                ]);

                return redirect()->to('home')->with('success', 'Selamat Datang ' . $user['username'] . '!');
            } else {
                return redirect()->back()->withInput()->with('pesan', 'password salah!');
            }
        } else {
            return redirect()->back()->withInput()->with('pesan', 'Username/Email tidak ditemukan');
        }
    }

    public function register()
    {
        $data = [
            'title' => 'Register',
            'validation' => service('validation')
        ];

        return view('auth/register', $data);
    }

    public function registerProcess()
    {
        $rules = [
            'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'username harus diisi.'
                ],
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
                ],
            ],
            'confirm_password' => [
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => 'Email tidak boleh kosong!',
                    'matches' => 'password tidak cocok'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            $data = [
                'validation' => service('validation')
            ];

            return view('auth/register', $data);
        }


        $password_hash = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);

        $this->userModel->insert([
            'username' => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'password' => $password_hash
        ]);

        return redirect()->to('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('success', 'Berhasil Logout');
        return redirect()->to('/');
    }

}
