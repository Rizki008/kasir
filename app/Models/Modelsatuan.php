<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelsatuan extends Model
{
    public function alldata()
    {
        return $this->db->table('tb_satuan')->get()->getResultArray();
    }

    public function insertdata($data)
    {
        $this->db->table('tb_satuan')->insert($data);
    }

    public function updatedata($data)
    {
        $this->db->table('tb_satuan')
            ->where('id_satuan', $data['id_satuan'])
            ->update($data);
    }
    public function deletedata($data)
    {
        $this->db->table('tb_satuan')
            ->where('id_satuan', $data['id_satuan'])
            ->delete($data);
    }
}
