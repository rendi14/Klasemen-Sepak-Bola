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
}
