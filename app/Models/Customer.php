<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kantor',
        'alamat',
        'kontak',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
