<?php

namespace App\Controllers;

use \App\Models\OrangModel;

class Orang extends BaseController{
    protected $orangModel;

    public function __construct(){
        $this->orangModel = new OrangModel();
    }
    
    public function index(){
        $data = [
            "title" => "Daftar Orang",
            // "orang" => $this->orangModel->findAll()
            "orang" => $this->orangModel->paginate(10, "orang"),
            "pager" => $this->orangModel->pager
        ];

        return view("orang/index", $data);
    }
}