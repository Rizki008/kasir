<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelproduk;
use App\Models\ModelKategori;
use App\Models\Modelsatuan;


class Produk extends BaseController
{

    public function __construct()
    {
        $this->Modelproduk = new Modelproduk();
        $this->ModelKategori = new ModelKategori();
        $this->Modelsatuan = new Modelsatuan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Produk',
            'menu' => 'masterdata',
            'submenu' => 'produk',
            'page' => 'v_produk',
            'produk' => $this->Modelproduk->AllData(),
            'kategori' => $this->ModelKategori->alldata(),
            'satuan' => $this->Modelsatuan->alldata(),
        ];
        return view('v_template', $data);
    }
    public function insertdata()
    {
        if ($this->validate([
            'kode_produk' => [
                'label' => 'Kode Produk /Barcode',
                'rules' => 'is_unique[tb_produk.kode_produk]',
                'errors' => ['is_unique' => '{field} Sudah ada, Masukan kode lain!!!',]
            ],
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => ['required' => '{field} Belum Dipilih',]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => ['required' => '{field} Belum Dipilih',]
            ],
        ])) {
            $hargabeli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $data = [
                'kode_produk' => $this->request->getPost('kode_produk'),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_jual' => $hargajual,
                'harga_beli' => $hargabeli,
                'stok' => $this->request->getPost('stok'),
            ];
            $this->Modelproduk->insertdata($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to('produk');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Produk'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function updatedata($id_produk)
    {
        if ($this->validate([
            // 'k 
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => ['required' => '{field} Belum Dipilih',]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => ['required' => '{field} Belum Dipilih',]
            ],
        ])) {
            $hargabeli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $data = [
                'id_produk' => $id_produk,
                // 'kode_produk' => $this->request->getPost('kode_produk'),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_jual' => $hargajual,
                'harga_beli' => $hargabeli,
                'stok' => $this->request->getPost('stok'),
            ];
            $this->Modelproduk->updatedata($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diubah!!!');

            return redirect()->to('produk');
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Produk'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function deletedata($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,
        ];

        $this->Modelproduk->deletedata($data);
        session()->setFlashdata('pesan', 'Data Berhasil DIhapus');

        return redirect()->to('Produk');
    }
}
