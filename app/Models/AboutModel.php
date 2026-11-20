<?php
namespace App\Models;
use CodeIgniter\Model;
class AboutModel extends Model
{
    protected $table            = 'tbl_about'; 
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['judul', 'deskripsi', 'gambar'];
    protected $useTimestamps    = true; 
}