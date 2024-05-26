<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    protected $table = 'staff';
    protected $fillable = [
        'uid',
        'nama',
        'jenis_kelamin',
        'picture',
        'alamat',
        'email',
        'no_hp',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
