@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="w-50" method="post" action="{{route('product.update', $product->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group mt-3">

                  <label for="name-product">Name Product</label>
                  <input type="text" class="form-control" id="name-product"  placeholder="Name Product" name="name" required value="{{$product->name}}">
                </div>

                <div class="form-group mt-3">
                    <label for="number_of_package">Number of package</label>
                    <input type="number" step="any" class="form-control" id="number_of_package"  placeholder="number of package" name="number_in_package" required value="{{$product->number_in_package}}">
                  </div>

                  <div class="form-group mt-3">
                    <label for="price_of_package">price of package</label>
                    <input type="number" step="any" class="form-control" id="price_of_package"  placeholder="price of package" name="price_of_package" required value="{{$product->price_of_package}}">
                  </div>

                  <div class="form-group mt-3">
                    <label for="price_of_package">prices sell piece</label>
                    <input type="number" step="any" class="form-control" id="price_of_package"  placeholder="price of package" name="price_sell_piece" required value="{{$product->price_sell_piece}}">
                  </div>

                <button type="submit" class="btn btn-primary mt-4">Update</button>
              </form>

        </div>
    </div>
    </div>
@endsection
