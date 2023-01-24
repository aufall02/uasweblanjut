<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Dashboard extends BaseController
{
    public function index()
    {
        //
            $session = session();
            // echo "Welcome back, ".$session->get('user_name');
            $data = [
                'title' => 'Dashboard',
                'message' =>"Welcome back, ".$session->get('user_name')
            ];
            return view('pages/list',$data);
        
    }
}
