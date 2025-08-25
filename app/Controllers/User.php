<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{

    protected $userModel;   
    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function profile()
    {
        $userId = session()->get('id');
        $user = $this->userModel->find($userId);
        $data = [
            'title' => 'User Profile',
            'user' => $user,
            'validation' => service('validation')
        ];
        return view('user/profile', $data);
    }

    public function updateProfile()
    {
        $userId = session()->get('id');
    
        $rules = [
            'username' => 'required',
            'email'    => 'required|valid_email',
        ];
    
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }
    
        $foto = $this->request->getFile('foto_profile');
        $namaFoto = '';
    
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move('uploads/profile', $namaFoto);
        }
    
        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'bio'      => $this->request->getPost('bio'),
        ];
    
        if ($namaFoto != '') {
            $data['foto_profile'] = $namaFoto;
            session()->set('foto_profile', $namaFoto); 
        }
    
        $this->userModel->update($userId, $data);
    
        session()->set('username', $data['username']); 
        session()->set('email', $data['email']);
        session()->set('bio', $data['bio']);
    
        session()->setFlashdata('berhasil', 'Profil berhasil diperbarui');
        return redirect()->to('/user/profile');
    }
}
