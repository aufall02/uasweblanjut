<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductsModel;

class Products extends BaseController
{
    protected $productsModel;


    public function __construct()
    {
        //memanggil model dari product
        $this->productsModel = new ProductsModel();
    }


    public function index()

    {
        $data = [
            'title' => 'table buah',
            'products' => $this->productsModel->getProduct()
        ];
        return view('pages/products', $data);
    }


    public function create()
    {
        session();
        // Kode untuk menampilkan form tambah data akan dituliskan di sini
        $data = [
            'title' => 'Add Product',
            'validation' => \Config\Services::validation()
        ];
        return view('pages/form_add', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required'
        ])) {
            //jika validasi gagal maka akan kembali ke menu create
            return redirect()->to('products/create')->withInput();
        }

        $image = $this->request->getFile('image');

        //pindah file
        if ($image->getError() == 4) {
            $nameImage = 'default.jpg';
        } else {
            //generate nama random untuk gambar
            $nameImage = $image->getRandomName();
            //pindah gambar ke folder img
            $image->move('img', $nameImage);
        }
        //simpan data
        $this->productsModel->insert([
            "name" => $this->request->getPost('name'),
            "price" => $this->request->getPost('price'),
            "image" => $nameImage,
            "description" => $this->request->getPost('description'),
        ]);

        session()->setFlashdata('pesan', 'berhasil tambah data');
        //redirect ke menu product
        return redirect()->to('/products');
    }

    public function edit($id = null)
    {
        // Kode untuk menampilkan form edit data akan dituliskan di sini
        $data = [
            'title' => 'Edit Product',
            'validation' => \Config\Services::validation(),
            'product' => $this->productsModel->getProduct($id)
        ];
        return view("pages/form_edit", $data);
    }

    public function update($id)
    {
        //validasi
        if (!$this->validate([
            'name' => 'required',
            'price' => 'required|integer',
            'description' => 'required'
        ])) {
            //jika validasi gagal maka akan kembali ke menu create
            return redirect()->to('products/create')->withInput();
        }

        $image = $this->request->getFile('image');

        //pindah file
        if ($image->getError() == 4) {
            $nameImage = $this->request->getVar('fileLama');
        } else {
            $nameImage = $image->getRandomName();

            $image->move('img', $nameImage);
            //hapus file di folder img
            unlink('img/' . $this->request->getVar('fileLama'));
        }

        $this->productsModel->save([
            "product_id" => $id,
            "name" => $this->request->getPost('name'),
            "price" => $this->request->getPost('price'),
            "image" => $nameImage,
            "description" => $this->request->getPost('description'),
        ]);

        session()->setFlashdata('pesan', 'berhasil update data');
        return redirect()->to('/products');
    }


    public function delete($id)
    {

        $this->productsModel->delete($id);
        session()->setFlashdata('pesan', 'berhasil hapus data');
        return redirect()->to('/products');
    }
}
