<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController{
    protected $komikModel;

    public function __construct(){
        $this->komikModel = new KomikModel();
    }
    
    public function index(){
        $data = [
            "title" => "Daftar Komik",
            "comics" => $this->komikModel->getKomik()
        ];

        return view("komik/index", $data);
    }

    public function detail($slug){
        $data = [
            "title" => "Detail Komik",
            "comic" => $this->komikModel->getKomik($slug)
        ];

        // jika komik tidak ada di tabel
        if(empty($data["comic"])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul Komik " . $slug . " tidak ditemukan");
        }

        return view("komik/detail", $data);
    }

    public function create(){
        // session();
        $data = [
            "title" => "Form Tambah Data Komik",
            "validation" => \Config\Services::validation()
        ];

        return view("komik/create", $data);
    }

    public function save(){
        // validasi iput
        if(!$this->validate([
            "judul" => [
                "rules" => "required|is_unique[komik.judul]",
                "errors" => [
                    "required" => "{field} harus diisi",
                    "is_unique" => "{field} komik sudah terdaftar"
                ]
            ],
            "penulis" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} harus diisi"
                ]
            ],
            "penerbit" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} harus diisi"
                ]
            ],
            "genre" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} harus diisi"
                ]
            ],
            "sinopsis" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} harus diisi"
                ]
            ],
            "sampul" => [
                "rules" => "uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]",
                "errors" => [
                    "uploaded" => "pilih gambar terlebih dahulu",
                    "max_size" => "Ukuran gambar terlalu besar",
                    "is_image" => "Yang anda pilih bukan gambar",
                    "mime_in" => "Yang anda pilih bukan gambar"
                ]
            ]
        ])){
            // $validation = \Config\Services::validation();
            // return redirect()->to("/komik/create")->withInput()->with("validation", $validation);
            return redirect()->to("/komik/create")->withInput();
        }
        
        // Ambil gambar
        $fileSampul = $this->request->getFile("sampul");
        // Generate nama sampul random 
        $namaSampul = $fileSampul->getRandomName();
        // Pindahkan file ke folder img
        $fileSampul->move("img", $namaSampul);

        $slug = url_title($this->request->getVar("judul"), "-", true);

        $this->komikModel->save([
            "judul" => $this->request->getVar("judul"),
            "slug" => $slug,
            "penulis" => $this->request->getVar("penulis"),
            "penerbit" => $this->request->getVar("penerbit"),
            "genre" => $this->request->getVar("genre"),
            "sinopsis" => $this->request->getVar("sinopsis"),
            "sampul" => $namaSampul
        ]);

        session()->setFlashData("pesan", "Data berhasil ditambahkan");

        return redirect()->to("/komik");
    }

    public function delete($id){
        $comic = $this->komikModel->find($id);
        // Hapus gambar
        unlink("img/" . $comic["sampul"]);

        $this->komikModel->delete($id);
        session()->setFlashData("pesan", "Data berhasil dihapus");
        return redirect()->to("/komik");
    }

    public function edit($slug){
        $data = [
            "title" => "Form Ubah Data Komik",
            "validation" => \Config\Services::validation(),
            "comic" => $this->komikModel->getKomik($slug)
        ];

        return view("komik/edit", $data);
    }

    public function update($id){
        // validasi iput
        $oldComic = $this->komikModel->getKomik($this->request->getVar("slug"));

        if($this->request->getVar("judul") == $oldComic["judul"]){
            $titleRules = "required";
        }else{
            $titleRules = "required|is_unique[komik.judul]";
        }

        if(!$this->validate([
            "judul" => [
                "rules" => $titleRules,
                "errors" => [
                    "required" => "{field} harus diisi",
                    "is_unique" => "{field} komik sudah terdaftar"
                ]
            ],
            "penulis" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} harus diisi"
                ]
            ],
            "penerbit" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} harus diisi"
                ]
            ],
            "genre" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} harus diisi"
                ]
            ],
            "sinopsis" => [
                "rules" => "required",
                "errors" => [
                    "required" => "{field} harus diisi"
                ]
            ],
            "sampul" => [
                "rules" => "max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]",
                "errors" => [
                    "max_size" => "Ukuran gambar terlalu besar",
                    "is_image" => "Yang anda pilih bukan gambar",
                    "mime_in" => "Yang anda pilih bukan gambar"
                ]
            ]
        ])){
            return redirect()->to("/komik/edit/" . $this->request->getVar("slug"))->withInput();
        }

        $fileSampul = $this->request->getFile("sampul");
        // Cek gambar, apakah tetap gambar lama
        if($fileSampul->getError() == 4){
            $namaSampul = $this->request->getVar("sampulLama");
        }else{
            // generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan gambar
            $fileSampul->move("img", $namaSampul);
            //hapus file lama
            unlink("img/" . $this->request->getVar("sampulLama"));
        }

        $slug = url_title($this->request->getVar("judul"), "-", true);
        $this->komikModel->save([
            "id" => $id,
            "judul" => $this->request->getVar("judul"),
            "slug" => $slug,
            "penulis" => $this->request->getVar("penulis"),
            "penerbit" => $this->request->getVar("penerbit"),
            "genre" => $this->request->getVar("genre"),
            "sinopsis" => $this->request->getVar("sinopsis"),
            "sampul" => $namaSampul
        ]);

        session()->setFlashData("pesan", "Data berhasil diubah");

        return redirect()->to("/komik");
    }
}