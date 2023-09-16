<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user() {
        $this->belongsTo(User::class,'user_id');
    }
}
