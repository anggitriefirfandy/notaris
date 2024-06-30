<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tugas_model extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected $table = 'tugas';
    protected $fillable = [
        'uid',
        'nama',
        'content_tugas',
        'deskripsi',
        'status',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
