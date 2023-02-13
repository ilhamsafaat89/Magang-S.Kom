<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;
    protected $fillable = ['nidn', 'nama', 'jenis_kelamin', 'alamat', 'ttl'];

    public function mahasiswa(){
        return $this->hasMany(Mahasiswa::class);
    }
}
