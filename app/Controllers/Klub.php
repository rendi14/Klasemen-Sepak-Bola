<?php

namespace App\Controllers;

use App\Models\Modelklub;

class Klub extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $modelklubsepakbola = new Modelklub();
        $data = [
            'title' => "Klub",
            'klub' => $modelklubsepakbola->findAll(),
        ];
        return view('Main/klub', $data);
    }

    public function tambahklub()
    {
        $modelklubsepakbola = new Modelklub();
        helper(['form']);
        $valid = $this->validate([
            'Nama_klub' => [
                'label' => 'Nama Klub',
                'rules'  => 'required|is_unique[klub.Nama_klub]',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                    'is_unique' => '{field} Telah Tersedia'
                ]
            ],

            'Kota_klub' => [
                'label' => 'Kota Klub',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
        ]);

        if (!$valid) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            session()->setFlashdata('error', 'Gagal Menyimpan Data Klub');
            return redirect()->to(base_url('/klub'));
        } else {
            $session = session();
            $data = array(
                'Nama_klub' => $this->request->getVar('Nama_klub'),
                'Kota_klub' => $this->request->getVar('Kota_klub'),
            );

            $modelklubsepakbola->save($data);
            $session->setFlashdata('success', 'Data Klub Berhasil ditambahkan');
            return redirect()->to('/klub');
        }
    }
}
