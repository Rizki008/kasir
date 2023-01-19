<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->ModelKategori = new ModelKategori();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Kategori',
            'menu' => 'masterdata',
            'submenu' => 'kategori',
            'page' => 'v_kategori',
            'kategori' => $this->ModelKategori->alldata(),
        ];
        return view('v_template', $data);
    }

    public function insertdata()
    {
        $data = ['nama_kategori' => $this->request->getPost('nama_kategori')];

        $this->ModelKategori->insertdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('Kategori');
    }
    public function updatedata($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];

        $this->ModelKategori->updatedata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diedit');

        return redirect()->to('Kategori');
    }
    public function deletedata($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
        ];

        $this->ModelKategori->deletedata($data);
        session()->setFlashdata('pesan', 'Data Berhasil DIhapus');

        return redirect()->to('Kategori');
    }
}
