<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inputan_model extends Model
{
    use HasFactory;
    protected $table = 'inputans';
    protected $fillable = ['uid', 'input_berkas_id', 'jenis_layanan_id', 'content'];
    public function jenisLayanan()
    {
        return $this->belongsTo(jenis_layanan_model::class);
    }
    public function jenisLayananId()
    {
        return $this->belongsTo(jenis_layanan_model::class, 'jenis_layanan_id');
    }
    public function inputBerkas()
    {
        return $this->belongsTo(input_berkas::class);
    }
    public function getTanggalMasukAttribute($value)
    {
        return Carbon::parse($value)->isoFormat('D MMMM YYYY');
    }
}
