@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if (isset($products) && !empty($products))
            <a class="btn btn-primary w-25 mb-5" href="{{route('product.create')}}" role="button">Add Product</a>
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nmae</th>
                            <th scope="col">Number in package</th>
                            <th scope="col">Price of package</th>
                            <th scope="col">price piece</th>
                            <th scope="col">Control</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->number_in_package }}</td>
                                <td>{{ $product->price_of_package }}</td>
                                <td>{{ $product->price_sell_piece }}</td>
                                <td>
                                     <a href="{{route('product.edit',$product->id)}}" ><i class="fas fa-edit text-success "></i></a>
                                    <form action="{{route('product.destroy', $product->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="border border-none" type="submit"><i class="far fa-trash-alt text-danger"></i></a>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @else

                 <div class="text-danger text-center ">no data here</div>
                 <a class="btn btn-primary w-25 mt-5" href="{{route('product.create')}}" role="button">Add Product</a>
            @endif
        </div>
    </div>
    </div>
@endsection
