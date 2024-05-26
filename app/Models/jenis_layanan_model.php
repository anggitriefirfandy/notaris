<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_layanan_model extends Model
{
    use HasFactory;

    protected $table = 'jenis_layanans';

    protected $fillable = ['uid', 'jenis_layanan', 'isi_inputan'];

    public function inputans()
    {
        return $this->hasMany(inputan_model::class);
    }

    public function hasilInputans()
    {
        return $this->hasMany(hasil_inputan_model::class);
    }
}
