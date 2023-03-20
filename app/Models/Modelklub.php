<?php

namespace App\Models;

use CodeIgniter\Model;

class Modelklub extends Model
{
    protected $table = "klub";
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = ['Nama_klub', 'Kota_klub', 'Main', 'Menang', 'Seri', 'Kalah', 'Goal_Menang', 'Goal_Kalah', 'Point'];

    public function Klasemen()
    {
        return $this->orderBy('Point', 'DESC')->findAll();
    }

    public function dataklub($column, $data)
    {
        return $this->where($column, $data)->first();
    }

    public function dataklasemenpertandingan($data)
    {
        $kluba = $this->dataklub('id', $data['kluba']);
        $klubb = $this->dataklub('id', $data['klubb']);

        $updateKluba = [
            'Main' => $kluba['Main'] + 1,
            'Goal_Menang' => $kluba['Goal_Menang'] + $data['skora'],
            'Goal_Kalah' => $kluba['Goal_Kalah'] + $data['skorb']
        ];
        $updateKlubb = [
            'Main' => $klubb['Main'] + 1,
            'Goal_Menang' => $klubb['Goal_Menang'] + $data['skorb'],
            'Goal_Kalah' => $klubb['Goal_Kalah'] + $data['skora']
        ];

        if ($data['skora'] == $data['skorb']) {
            $updateKluba['Seri'] = $kluba['Seri'] + 1;
            $updateKluba['Point'] = $kluba['Point'] + 1;

            $updateKlubb['Seri'] = $klubb['Seri'] + 1;
            $updateKlubb['Point'] = $klubb['Point'] + 1;
        } elseif ($data['skora'] > $data['skorb']) {
            $updateKluba['Menang'] = $kluba['Menang'] + 1;
            $updateKluba['Point'] = $kluba['Point'] + 3;

            $updateKlubb['Kalah'] = $klubb['Kalah'] + 1;
        } else {
            $updateKluba['Kalah'] = $kluba['Kalah'] + 1;

            $updateKlubb['Menang'] = $klubb['Menang'] + 1;
            $updateKlubb['Point'] = $klubb['Point'] + 3;
        }

        $this->update(['id' => $data['kluba']], $updateKluba);
        $this->update(['id' => $data['klubb']], $updateKlubb);
    }
}
