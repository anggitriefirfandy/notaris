<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class input_berkas extends Model
{
    use HasFactory;
    protected $table = 'input_berkas';
    protected $fillable = [
        'uid',
        'nama_pemilik',
        'no_hp',
        'alamat',
        'jenis_berkas',
        'jenis_pemilik',
        'ttd_akta',
        'ttd_desa',
        'konfirmasi_camat',
        'verifikasi_bphtb',
        'daftar_ukur',
        'tanggal_ukur',
        'gambar_ukur',
        'daftar_yasan',
        'letter_c',
        'ktp_penjual',
        'kk_penjual',
        'ktp_pembeli',
        'kk_pembeli',
        'pbb',
        'kwitansi',
        'npwp',
        'efin',
        'konfirmasi_c',
        'mutasi_pbb',
        'plotting_sertifikat',
        'jenis_akta_tanah',
        'dokumen_lain',
        'tanggal_masuk',
        'tanggal_selesai',
        'tanggal_penyerahan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
