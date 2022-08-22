@extends('dashboard.layouts.main')

@section('container')
div class="cart-section mt-150 mb-150">
 <div class="container">
  <div class="row">
  	<div class="col-lg-8 col-md-12">
  	 <div class="cart-table-wrap">
  	   <table class="cart-table">
  	   	 <thead class="cart-table-head">
  	   	 	<tr class="table-head-row">
              <th class="product-remove"></th>
			  <th class="product-image">Product Image</th>
			  <th class="product-name">Name</th>
			  <th class="product-price">Price</th>
			  <th class="product-quantity">Quantity</th>
  	   	 	</tr>
  	   	 </thead>
         <div class="alert_tp">
           
         </div>
  	   	 <tbody>
  	   	 	 @foreach($d_cart as $row)
              <tr class="table-body-row">
                <td class="product-remove">&times;</td>
                <td class="product-image"><img src="{{ asset('images')}}/{{ $row->img_product }}"></td>
                <td class="product-name">{{ $row->name_product }}</td>
                <td class="pr8oduct-price">{{ $row->product_price }}</td>
              <form method="post" id="f_uppro">
                {{ csrf_field() }}
                <td class="product-quantity">
                  <input type="number" id="n_pr_" placeholder="0" value="{{$row->product_price}}">
                </td>
                <td class="product-total">
                  <input type="submit" value="Save" class="btn btn-primary btn-lg active">
                </td>
             </form>
              </tr>
              <input type="hidden" id="id_cart_table" value="{{ $row->id }}">
  	   	 	 @endforeach
  	   	 </tbody>
  	   </table>
  	 </div>
  	</div>
  </div>
 </div>
</div>

@endsection