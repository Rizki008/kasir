<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function AllData()
    {
        return $this->db->table('tb_user')->get()->getResultArray();
    }

    public function insertdata($data)
    {
        $this->db->table('tb_user')->insert($data);
    }

    public function updatedata($data)
    {
        $this->db->table('tb_user')
            ->where('id_user', $data['id_user'])
            ->update($data);
    }

    public function deletedata($data)
    {
        $this->db->table('tb_user')
            ->where('id_user', $data['id_user'])
            ->delete($data);
    }
}
