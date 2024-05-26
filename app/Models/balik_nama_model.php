<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balik_nama_model extends Model
{
    use HasFactory;
    protected $table = 'balik_nama';
    protected $fillable = [
        'uid',
        'input_berkas_id',
        'pembuatan_akta',
        'ttd_akta',
        'mutasi_pbb',
        'verifikasi_pajak',
        'plotting_validasi',
        'tanggal_pembayaran_bphtb',
        'nominal_pembayaran_bphtb',
        'tanggal_pembayaran_pph',
        'nominal_pembayaran_pph',
        'cek_sertifikat',
        'znt',
        'tanggal_daftar',
        'no_berkas',
        'tanggal_selesai',

    ];
    public function inputBerkas()
    {
        return $this->belongsTo(input_berkas::class);
    }
}
