<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'menu_id',
        'jumlah_porsi',
        'tanggal_pengiriman',
        'total_harga',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
