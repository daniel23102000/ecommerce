<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Header_transaksi;
use Detail_transaksi;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;

class DashboardCartController extends Controller
{
    public function index()
    {
        $carts = Post::where('user_id', auth()->user()->id)->get();
        return view('dashboard.cart.index', compact('carts'));

        // session->forget("carter");
    }

    public function do_tambah_cart($id){
        $carter = session("carter");

        $carts = Post::detail_produk($id);
        $carter["id"] = [
            "title" => $carts->title,
            "price" => $carts->price,
            "jumlah" => 1
        ];

        session(["carter" => $carter]);

        return redirect("dashboard/carter");
    }

    function carter(){
        $carter = session("carter");
        return view('dashboard.cart.cart', compact('carter'));
    }

    function do_hapus_cart($id)
    {
        $carter = session("carter");
        unset($carter[$id]);
        
        session(["carter" => $carter]);
        return redirect("dashboard/carter");
    }

    function do_tambah_transaksi()
    {
        $carter = session("carter");
        $id_transaksi = Header_transaksi::tambah_header_transaksi();
        foreach($carter as $ct => $val)
        {
            $post_id= $ct;
            $jumlah = $val["jumlah"];
            Detail_transaksi::tambah_detail_transaksi($post_id, $id_header_transaksi, $jumlah);
        }
        session->forget("carter");
        return redirect("dashboard/carter");
    }
    
    function sh_cart()
    {
      $d_cart= Cart::join('posts','user_cart.id_product','=','posts.id')->select('cart.id','product_price','name_product','img_product')->where('product_owner', auth()->user()->id)->get();
      return view('dashboard.cart.cart',compact('d_cart'));
    }
}
