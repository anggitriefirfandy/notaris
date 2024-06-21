<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi_model extends Model
{
    use HasFactory;
    protected $table = 'absensi';
    protected $fillable = ['user_id', 'waktu_absensi', 'tanggal_absensi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
