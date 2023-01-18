<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductsModel;


class Products extends BaseController
{
    protected $productsModel;


    public function __construct()
    {
        $this->productsModel = new ProductsModel();

    }


    public function index()

    {
        $data = [
            'title' => 'table buah',
            'products' => $this->productsModel->getProduct()
        ];
        return view('pages/list', $data);
    }


    public function create()
    {
        session();
        // Kode untuk menampilkan form tambah data akan dituliskan di sini
        $data = [
            'title' => 'Add Product',
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        return view('pages/form_add',$data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'name' => 'required',
            'price' => 'required|integer',
            // 'image' => 'required',
            'description' => 'required'
        ])){

            return redirect()->to('products/create')->withInput();
        }


        $image = $this->request->getFile('image');
        //pindah file
        if ($image->getError()==4){
            $nameImage = 'default.jpg';
        }else{
            $nameImage = $image->getRandomName();

            $image->move('img', $nameImage);

        }
 
        $this->productsModel->save([
            "name" =>$this->request->getPost('name'),
            "price" =>$this->request->getPost('price'),
            "image" =>$nameImage,
            "description" =>$this->request->getPost('description'),
        ]);

        session()->setFlashdata('pesan', 'berhasil tambah data');

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
        // dd($data);
        
        return view("pages/form_edit", $data);

        
    }

    public function update($id)
    {
   
        $image = $this->request->getFile('image');
        //pindah file
        if ($image->getError()==4){
            $nameImage = 'default.jpg';
        }else{
            $nameImage = $image->getRandomName();

            $image->move('img', $nameImage);

        }

        $this->productsModel->save([
            "product_id" => $id,
            "name" =>$this->request->getPost('name'),
            "price" =>$this->request->getPost('price'),
            "image" =>$nameImage,
            "description" =>$this->request->getPost('description'),
        ]);
       
        session()->setFlashdata('pesan', 'berhasil update data');
        return redirect()->to('/products');
    }


    public function delete($id)
    { 
        
        // Kode untuk menghapus data dari database akan dituliskan di sini


        $this->productsModel->delete($id);
        session()->setFlashdata('pesan', 'berhasil hapus data');
        return redirect()->to('/products');
    }
    
    public function tampilkan(){
        $data = [
            'title' => 'table buah',
            'products' => $this->productsModel->getProduct()
        ];
        // dd($data);
        return view('pages/pricing', $data);
    }
}