@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Cart</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Create new post</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">Barcode</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Status</th>
              <th scope="col">Created At</th>
              <th scope="col">Updated At</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            @foreach($carts as $cart)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $cart->title }}</td>
              <td>{{ $cart->category->name }}</td>
              <td>{{ $cart->barcode }}</td>
              <td>{{ $cart->price }}</td>
              <td>{{ $cart->quantity }}</td>
              <td>{{ $cart->status }}</td>
              <td>{{ $cart->created_at }}</td>
              <td>{{ $cart->updated_at }}</td>
              <td>
              <a  href="/dashboard/carter/" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                <!-- <a href="{{url('/dashboard/carter/tambah/'.$cart->id)}}">Tambah ke Cart</a> -->
                 <input type="hidden" id="seller_user"  value="{{ $cart->user_id }}">
                <input type="hidden" id="id_product"   value="{{  $cart->id }}">
                <input type="hidden" id="price_pro_t"  value="{{ $cart->price_product }}">
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection