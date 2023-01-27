<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{

    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'User',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'v_user',
            'user' => $this->ModelUser->AllData(),
        ];
        return view('v_template', $data);
    }

    public function insertdata()
    {
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
        ];

        $this->ModelUser->insertdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

        return redirect()->to('user');
    }
    public function updatedata($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => sha1($this->request->getPost('password')),
            'level' => $this->request->getPost('level'),
        ];

        $this->ModelUser->updatedata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!!');

        return redirect()->to('user');
    }
    public function deletedata($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];

        $this->ModelUser->deletedata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to('user');
    }
}
