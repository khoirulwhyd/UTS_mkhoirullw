<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Buku as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model; //Model Eloquent
class Buku extends Model //Definisi Model
{
protected $table="buku"; // Eloquent akan membuat model mahasiswa
public $timestamps= false;
protected $primaryKey = 'ID_Buku'; // Memanggil isi DB Dengan primarykey
/**
* The attributes that are mass assignable.
* 
*@var array
*/
protected $fillable = [
    'ID_Buku',
    'Judul',
    'Kategori',
    'Penerbit',
    'Pengarang',
    'Jumlah',
    'Status',
    ];
};