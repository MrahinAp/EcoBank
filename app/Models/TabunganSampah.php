<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TabunganSampah extends Model
{
    protected $table = 'tabungan_sampah';

    protected $fillable = [
        'nama',
        'jenis_sampah',
        'berat_sampah',
        'point',
        'gambar',
    ];
}
