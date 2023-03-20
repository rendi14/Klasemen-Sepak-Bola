<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelpertandingan extends Model
{
    protected $table = "pertandingan";
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['kluba', 'klubb', 'skora', 'skorb'];

    public function getAll()
    {
        return $this->select('pertandingan.skora, pertandingan.skorb, klub1.Nama_klub as kluba, klub2.Nama_klub as klubb')->join('klub klub1', 'pertandingan.kluba = klub1.id')->join('klub klub2', 'pertandingan.klubb = klub2.id')->findAll();
    }
}
