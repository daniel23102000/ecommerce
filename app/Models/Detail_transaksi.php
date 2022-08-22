<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_transaksi extends Model
{
    protected $guarded = ["id"];
    protected $table = "detail_transaksi";
    protected $fillable = [
        'id_header_transaksi', 'post_id', 'jumlah' 
    ];

    static function tambah_detail_transaksi($post_id, $id_header_transaksi, $jumlah){
        Post::create([
            "post_id" => $post_id,
            "id_header_transaksi" => $id_header_transaksi,
            "jumlah" => $jumlah,
        ]);
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function header_transaksi()
    {
        return $this->belongsTo(Header_transaksi::class, 'id_header_transaksi');
    }
}
