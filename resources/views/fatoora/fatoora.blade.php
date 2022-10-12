@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if (isset($fatooras) && !empty($fatooras))
                @php
                    $len = count($fatooras);
                    $i = 0;
                @endphp

                <a class="btn btn-primary w-25 mb-5" href="{{ route('fatoora.create') }}" role="button">Add Fatoora</a>

                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">#</th>
                            <th scope="col">Nmae</th>
                            <th scope="col">Controls</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($fatooras as $key => $fatoora)
                            <tr>
                                <th scope="row">{{ $fatoora->id }}</th>
                                <td>{{ $fatoora->name }}</td>
                                <td>
                                    <a href="{{ route('fatoora.edit', $fatoora->id) }}"><i
                                            class="fas fa-edit text-success "></i></a>
                                    <form action="{{ route('fatoora.destroy', $fatoora->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="border border-none" type="submit"><i class="far fa-trash-alt text-danger"></i></a>
                                    </form>
                                </td>
                            </tr>
                            <tr class="table-danger">
                                <th colspan="3"><span style="margin-right: 30px">Products</span>  <button class="btn btn-danger btn-sm show-product" >add product in fatoora</button></th>
                            </tr>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nmae</th>
                                <th scope="col">Mount</th>
                            </tr>

                            @foreach ($fatoora->product as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->pivot->mount }}</td>
                                </tr>
                            @endforeach

                            @if (++$i !== $len)
                                <tr>
                                    <td class="table-dark" colspan="3"></td>
                                </tr>
                                <tr class="table-primary">
                                    <th scope="col">#</th>
                                    <th scope="col">Nmae</th>
                                    <th scope="col">Controls</th>
                                </tr>
                            @endif

                        @endforeach

                    </tbody>
                </table>
            @else
                <div class="text-danger text-center ">no data here</div>
                <a class="btn btn-primary w-25 mt-5" href="{{ route('fatoora.create') }}" role="button">Add Product</a>
            @endif
        </div>
    </div>
    </div>
    <div class="add-product">
        <form  method="post" action="{{route('fatoora.update',$fatoora->id)}}">
            @csrf
            @method('PUT')

            <select class="form-select" aria-label="Default select example">
                <option selected>Products</option>
                @if (isset($products) && !empty($products))
                    @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                @endif
              </select>

              <div class="form-group mt-3">
                <label for="mount">Mount</label>
                <input type="number" step="any" class="form-control" id="mount"  placeholder="price of package" name="mount" required >
              </div>

            <button type="submit" class="btn btn-primary mt-4">Submit</button>
          </form>
    </div>
@endsection
