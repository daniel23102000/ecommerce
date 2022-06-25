<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//ctrl+shift+p

class Post 
{
    static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Daniel Raul Rurubua",
            "body" => "Sajak lira adalah bentuk puisi yang mengekspresikan perasaan 
            emosional dan personal. Pada masa kuno, sajak jenis ini diiringi dengan 
            lantunan dari alat musik Lira, karena itulah disebut sajak lira. 
            Sajak lira tidak harus berima dan pada masa kini tidak selalu diiringi oleh musik."
        ],
        [
        
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Peter Parker",
            "body" => "Sajak lira adalah bentuk puisi yang mengekspresikan perasaan 
            emosional dan personal. Pada masa kuno, sajak jenis ini diiringi dengan 
            lantunan dari alat musik Lira, karena itulah disebut sajak lira. 
            Sajak lira tidak harus berima dan pada masa kini tidak selalu diiringi oleh musik."
        ]
        ];

    public static function all()
        {
            return collect(self::$blog_posts);
        }

    public static function find($slug)
        {
            $posts = static::all();
            return $posts->firstWhere('slug', $slug);
        }
}
