@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <form class="w-50" method="post" action="{{route('fatoora.store')}}">
                @csrf
                <div class="form-group mt-3">

                  <label for="name-product">Name Fatoora</label>
                  <input type="text" class="form-control" id="name-product"  placeholder="Name Product" name="name" required>
                </div>



                <button type="submit" class="btn btn-primary mt-4">Submit</button>
              </form>

        </div>
    </div>
    </div>
@endsection
