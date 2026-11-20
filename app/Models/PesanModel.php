<?php
namespace App\Models;
use CodeIgniter\Model;
class PesanModel extends Model
{
    protected $table = 'tbl_pesan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'subject', 'pesan'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
}