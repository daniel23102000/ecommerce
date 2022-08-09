@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Cart</h1>
</div>
    <div id="cart">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="row mb-2">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Scan Barcode..">
                    </div>
                    <div class="col">
                        <select name="" id="" class="form-control">
                            <option value="">Walking Customer</option>
                        </select>
                    </div>
                </div>
                <div class="user-cart">
                <div class="card" style="height:500px;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th class="text-right">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($carts as $cart)
                    <tr>
                            <td>cart->name</td>
                            <td>
                                <input type="text" class="form-control form-control-sm qty" value="" style="width: 45px; float:left;">
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                        </td>
                            <td class="text-right">$ 2.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            <div class="row">
                <div class="col">Total:</div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col text-right">$ 5.00</div>
            </div>
            @endforeach
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-danger btn-block">Cancel</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
            </div>
            <div class="col-m-6 col-lg-8">
            <div class="mb-2">
                <input type="text" class="form-control" placeholder="Search Product...">
            </div>
            <div class="order-product">
                <div class="item" style="float:left; border:1px solid #ccc; border-radius: 3px; background: #fff; margin: 0 2px 4px 2px"><img src="data:image/jpeg;base64,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" alt="" style="width:200px; height:100px; max-width: 100%;">
            <h5 style="text-align: center; font-size:13px;">Coca Cola</h5> 
        </div>
        <div class="item" style="float:left; border:1px solid #ccc; border-radius: 3px; background: #fff; margin: 0 2px 4px 2px"><img src="data:image/jpeg;base64,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" alt="" style="width:200px; height:100px; max-width: 100%;">
            <h5 style="text-align: center; font-size:13px;">Coca Cola</h5> 
        </div>
            </div>
            </div>
        </div>
    </div>

    <script>
        constructor(props){
            super(props)
            this.state = {
                cart: [],
            }

            this.loadCart = this.load.bind(this);
        }

        componentDidMount() {
            // load user cart
        }

        loadCart(){
            axies.get('admin/cart').then(res => {
                const cart = res.data;
                this.setState({cart})
            })
        }
    </script>

@endsection