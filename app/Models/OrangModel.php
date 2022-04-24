<?php  

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model{
    protected $table = 'orang';
    protected $useTimestamps = true;
    protected $allowedFields = ["nama", "alamat"];
}