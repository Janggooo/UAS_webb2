<?php
namespace App\Controllers;

//memanggil model
use App\Models\VcdModel;
use App\Models\GenreModel;

class Vcd extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->VcdModel = new VcdModel();
        $this->GenreModel = new GenreModel();
    }

    public function list()
    {
        //select data from table buku
        $list = $this->VcdModel->select('vcd.id, vcd.judul, genre.nama AS genre_nama, vcd.harga')->join('genre','vcd.genre_id = genre_id')->orderBy('genre.nama, judul')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('vcd_list', $output);
    }

    public function insert()
    {
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_genre = $this->GenreModel->orderBy('nama')->findAll();

        $output = [
            'data_genre' => $data_genre,
        ];

        return view('vcd_insert', $output);
    }

    public function insert_save()
    {
        $genre_id = $this->request->getVar('genre_id');
        $judul = $this->request->getVar('judul');
        $harga = $this->request->getVar('harga');

        //insert data ke table buku
        $this->VcdModel->insert([
            'genre_id' => $genre_id,
            'judul' => $judul,
            'harga' => $harga,
        ]);

        return redirect()->to('vcd');
    }

    public function update($id)
    {
        //select data kategori yang dipilih (filter by id)
        $data =  $this->VcdModel->where('id', $id)->first();
        
        //select data from table kategori (untuk data di selectbox/dropdown)
        $data_genre = $this->GenreModel->orderBy('nama')->findAll();

        $output = [
            'data' => $data,
            'data_genre' => $data_genre,
        ];

        return view('vcd_update', $output);
    }

    public function update_save($id)
    {
        $genre_id = $this->request->getVar('genre_id');
        $judul = $this->request->getVar('judul');
        $harga = $this->request->getVar('harga');

        //update data ke table buku filter by id
        $this->VcdModel->update($id, [
            'genre_id' => $genre_id,
            'judul' => $judul,
            'harga' => $harga,
        ]);

        return redirect()->to('vcd/');
    }

    public function delete($id)
    {   
        //delete data table buku filter by id
        $this->VcdModel->delete($id);
        return redirect()->to('vcd');
    }
}