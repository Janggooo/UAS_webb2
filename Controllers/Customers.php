<?php
namespace App\Controllers;

//memanggil model
use App\Models\CustomersModel;

class Customers extends BaseController
{
    public function __construct()
    {
        //load model untuk digunakan
        $this->CustomersModel = new CustomersModel();
    }

    public function list()
    {
        //select data from table kategori
        $list = $this->CustomersModel->select('id, nama')->orderBy('nama')->findAll();

        $output = [
            'list' => $list,
        ];

        return view('customers_list', $output);
    }

    // public function insert()
    // {
    //     return view('genre_insert');
    // }

    // public function insert_save()
    // {
    //     $nama = $this->request->getVar('nama');

    //     //insert data ke table kategori
    //     $this->GenreModel->insert([
    //         'nama' => $nama,
    //     ]);

    //     return redirect()->to('genre');
    // }

    // public function update($id)
    // {
    //     //select data kategori yang dipilih (filter by id)
    //     $data =  $this->GenreModel->where('id', $id)->first();
        
    //     $output = [
    //         'data' => $data,
    //     ];

    //     return view('genre_update', $output);
    // }

    // public function update_save($id)
    // {
    //     $nama = $this->request->getVar('nama');

    //     //update data ke table kategori filter by id
    //     $this->GenreModel->update($id, [
    //         'nama' => $nama,
    //     ]);

    //     return redirect()->to('genre/');
    // }

    // public function delete($id)
    // {   
    //     //delete data table kategori filter by id
    //     $this->GenreModel->delete($id);
    //     return redirect()->to('genre');
    // }
}