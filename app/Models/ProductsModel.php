<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductsModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'product_id';
    protected $allowedFields    = ['name', 'price', 'image', 'description'];
    public $rules               = [
        'name' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'You must choose a name.',
            ],
        ],
        'description' => [
            'rules'  => 'required',
            'errors' => [
                'required' => 'You must choose a description.',
            ],
        ],
    ];

    //menampilkan product berdasarkan id jika ada
    public function getProduct($id = null)
    {

        if ($id == null) {
            return $this->findAll();
        }

        return $this->where(['product_id' => $id])->first();
    }
}
