<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Products extends Seeder
{
    public function run()
    {
        //
        $product = [
            [
                'name' => 'Apple',
                'price' => '50000',
                'image' => 'apple.jpg',
                'description' => 'Apel merupakan jenis buah-buahan, atau buah yang dihasilkan dari pohon apel.'
            ],
            [
                'name' => 'Anggur',
                'price' => '45000',
                'image' => 'anggur.jpg',
                'description' => 'Anggur merupakan tanaman buah berupa perdu merambat.'
            ],
            [
                'name' => 'nanas',
                'price' => '25000',
                'image' => 'nanas.jpg',
                'description' => 'Nanas adalah salah satu buah tropis yang banyak disukai karena razanya yang lezat dan dapat disajika'
            ],
        ];

        foreach($product as $data){
            $this->db->table('products')->insert($data);
        }
    }
}
