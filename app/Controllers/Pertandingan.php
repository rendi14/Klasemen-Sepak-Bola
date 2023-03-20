<?php

namespace App\Controllers;

use App\Models\Modelklub;
use App\Models\Modelpertandingan;

class Pertandingan extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        $modelklubsepakbola = new Modelklub();
        $modelpertandingansepakbola = new Modelpertandingan();
        $data = [
            'title' => "Klub",
            'klub' => $modelklubsepakbola->findAll(),
            'pertandingan' =>  $modelpertandingansepakbola->getAll(),
        ];
        return view('Main/Pertandingan', $data);
    }

    public function tambahpertandingan()
    {
        $modelklubsepakbola = new Modelklub();
        $modelpertandingansepakbola = new Modelpertandingan();
        helper(['form']);
        $valid = $this->validate([
            'klubasatu' => [
                'label' => 'Klub A',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],

            'klubbsatu' => [
                'label' => 'Klub B',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],

            'skora' => [
                'label' => 'Skor Klub A',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],

            'skorb' => [
                'label' => 'Skor Klub B',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
        ]);

        if (!$valid) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            session()->setFlashdata('error', 'Gagal Menyimpan Pertandingan');
            return redirect()->to(base_url('/Pertandingan'));
        } else {
            $session = session();
            $data = [
                'kluba' => $this->request->getVar('klubasatu'),
                'klubb' => $this->request->getVar('klubbsatu'),
                'skora' => $this->request->getVar('skora'),
                'skorb' => $this->request->getVar('skorb'),
            ];
            $kluba = $data['kluba'];
            $klubb = $data['klubb'];
            $where = "(kluba = $kluba AND klubb = $klubb) OR (kluba = $kluba AND klubb = $klubb)";
            $isExist = $modelpertandingansepakbola->where($where)->first();

            if ($isExist) {
                session()->setFlashdata('error', 'Data pertandingan ini sudah tersedia');
                return redirect()->to('/Pertandingan')->withInput();
            }

            $modelpertandingansepakbola->save($data);
            $modelklubsepakbola->dataklasemenpertandingan($data);

            $session->setFlashdata('success', 'Data pertandingan berhasil ditambahkan');
            return redirect()->to('/Pertandingan');
        }
    }

    public function simpanbanyak()
    {
        $modelklubsepakbola = new Modelklub();
        $modelpertandingansepakbola = new Modelpertandingan();
        $session = session();
        helper(['form']);
        $valid = $this->validate([
            'kluba' => [
                'label' => 'Klub A',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],

            'klubb' => [
                'label' => 'Klub B',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],

            'skora' => [
                'label' => 'Skor Klub A',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],

            'skorb' => [
                'label' => 'Skor Klub B',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi',
                ]
            ],
        ]);

        if (!$valid) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            session()->setFlashdata('error', 'Gagal Menyimpan Pertandingan');
            return redirect()->to(base_url('/Pertandingan'));
        } else {
            $kluba = $this->request->getVar('kluba');
            $klubb = $this->request->getVar('klubb');
            $skora = $this->request->getVar('skora');
            $skorb = $this->request->getVar('skorb');

            $jumlahdata = count($kluba);

            for ($i = 0; $i < $jumlahdata; $i++) {
                $data[$i] = [
                    'kluba' => $kluba[$i],
                    'klubb' => $klubb[$i],
                    'skora' => $skora[$i],
                    'skorb' => $skorb[$i],
                ];

                $a =  $modelklubsepakbola->where("id", $kluba[$i])->first();
                $b =  $modelklubsepakbola->where("id", $klubb[$i])->first();
                $datas['kluba'] = $a['id'];
                $datas['klubb'] = $b['id'];

                $datas['skora'] = $skora[$i];
                $datas['skorb'] = $skorb[$i];
                $modelklubsepakbola->dataklasemenpertandingan($datas);
            }

            $kluba = $datas['kluba'];
            $klubb = $datas['klubb'];
            $where = "(kluba = $kluba AND klubb = $klubb) OR (kluba = $kluba AND klubb = $klubb)";
            $isExist = $modelpertandingansepakbola->where($where)->first();

            if ($isExist) {
                session()->setFlashdata('error', 'Data pertandingan ini sudah tersedia');
                return redirect()->to('/Pertandingan')->withInput();
            } else {
                $modelklubsepakbola->dataklasemenpertandingan($datas);
            }


            $modelpertandingansepakbola->insertBatch($data);
            $session->setFlashdata('success', 'Data pertandingan berhasil ditambahkan');
            return redirect()->to('/Pertandingan');
        }
    }
}
