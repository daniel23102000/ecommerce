<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header_transaksi extends Model
{
    use HasFactory;

    static function tambah_header_transaksi(){
        $transaksi = Post::create([
            "tanggal_transaksi" => date("Y-m-d"),
        ]);
        return $transaksi->id;
    }

    public function detail_transaksi()
    {
        return $this->hasMany(Detail_transaksi::class);
    }
}
