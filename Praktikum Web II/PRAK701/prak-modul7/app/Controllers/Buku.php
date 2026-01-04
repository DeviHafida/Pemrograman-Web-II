<?php

namespace App\Controllers;

class Buku extends BaseController
{
    protected $db;
    protected $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('buku');
    }

    public function index()
    {
        $data['bukus'] = $this->builder->get()->getResultArray();
        return view('daftarbuku', $data);
    }

    public function create()
    {
        return view('formbuku');
    }

    public function store()
    {
        if (!$this->validate([
            'judul_buku' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]',
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->builder->insert([
            'judul_buku' => $this->request->getPost('judul_buku'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ]);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil ditambahkan');
    }

    public function edit($id_buku)
    {
        $data['buku'] = $this->builder->where('id_buku', $id_buku)->get()->getRowArray();

        if (!$data['buku']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data buku tidak ditemukan');
        }

        return view('formbuku', $data);
    }

    public function update($id_buku)
    {
        if (!$this->validate([
            'judul_buku' => 'required|string',
            'penulis' => 'required|string',
            'penerbit' => 'required|string',
            'tahun_terbit' => 'required|integer|greater_than[1800]|less_than[2024]',
        ])) {
            $data['buku'] = $this->builder->where('id_buku', $id_buku)->get()->getRowArray();
            return view('formbuku', [
                'validation' => $this->validator,
                'buku' => $data['buku']
            ]);
        }

        $this->builder->where('id_buku', $id_buku)->update([
            'judul_buku' => $this->request->getPost('judul_buku'),
            'penulis' => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'tahun_terbit' => $this->request->getPost('tahun_terbit'),
        ]);

        return redirect()->to('/buku')->with('success', 'Data buku berhasil diupdate');
    }

    public function delete($id_buku)
    {
        $this->builder->where('id_buku', $id_buku)->delete();
        return redirect()->to('/buku')->with('success', 'Data buku berhasil dihapus');
    }
}
