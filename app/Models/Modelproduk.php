<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelproduk extends Model
{
    public function AllData()
    {
        return $this->db->table('tb_produk')
            ->join('tb_kategori', 'tb_kategori.id_kategori=tb_produk.id_kategori')
            ->join('tb_satuan', 'tb_satuan.id_satuan=tb_produk.id_satuan')
            ->orderBy('id_produk', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function insertdata($data)
    {
        $this->db->table('tb_produk')->insert($data);
    }

    public function updatedata($data)
    {
        $this->db->table('tb_produk')
            ->where('id_produk', $data['id_produk'])
            ->update($data);
    }
    public function deletedata($data)
    {
        $this->db->table('tb_produk')
            ->where('id_produk', $data['id_produk'])
            ->delete($data);
    }
}
