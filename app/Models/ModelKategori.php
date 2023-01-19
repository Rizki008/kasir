<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    public function alldata()
    {
        return $this->db->table('tb_kategori')->get()->getResultArray();
    }

    public function insertdata($data)
    {
        $this->db->table('tb_kategori')->insert($data);
    }

    public function updatedata($data)
    {
        $this->db->table('tb_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->update($data);
    }
    public function deletedata($data)
    {
        $this->db->table('tb_kategori')
            ->where('id_kategori', $data['id_kategori'])
            ->delete($data);
    }
}
