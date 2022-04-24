<?php

namespace App\Controllers;

class Pages extends BaseController{
    public function index(){
        $data = [
            "title" => "Home | Rahmat Fauzi"
        ];

        return view("pages/home", $data);
    }

    public function about(){
        $data = [
            "title" => "About | Rahmat Fauzi"
        ];

        return view("pages/about", $data);
    }

    public function contact(){
        $data = [
            "title" => "Contact | Rahmat Fauzi",
            "addresses" => [
                [
                    "type" => "Rumah",
                    "addresses" => "Duta Bandara Permai Blok Hs 2 No 9",
                    "city" => "Tangerang"
                ],
                [
                    "type" => "Kantor",
                    "addresses" => "Jl. Pedongkelan No. 35",
                    "city" => "Jakarta Barat"
                ]
            ]
        ];

        return view("pages/contact", $data);
    }
}