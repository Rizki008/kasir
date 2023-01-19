<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelsatuan;

class Satuan extends BaseController
{
    public function __construct()
    {
        $this->Modelsatuan = new Modelsatuan();
    }
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Satuan',
            'menu' => 'masterdata',
            'submenu' => 'satuan',
            'page' => 'v_satuan',
            'satuan' => $this->Modelsatuan->alldata(),
        ];
        return view('v_template', $data);
    }

    public function insertdata()
    {
        $data = ['nama_satuan' => $this->request->getPost('nama_satuan')];

        $this->Modelsatuan->insertdata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('Satuan');
    }
    public function updatedata($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
            'nama_satuan' => $this->request->getPost('nama_satuan'),
        ];

        $this->Modelsatuan->updatedata($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diedit');

        return redirect()->to('Satuan');
    }
    public function deletedata($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
        ];

        $this->Modelsatuan->deletedata($data);
        session()->setFlashdata('pesan', 'Data Berhasil DIhapus');

        return redirect()->to('Satuan');
    }
}
