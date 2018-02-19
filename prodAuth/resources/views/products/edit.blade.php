<!-- edit.blade.php -->

@extends('layouts.app')

<!-- this will add laravel’s default navbar to your page -->

@section('content')

    <!-- here goes your body content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Edit A Product</div>

                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br/>
                        @endif
                        <form method="post" action="{{action('ProductController@update', $id)}}">
                            @csrf
                            <input name="_method" type="hidden" value="PATCH">
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Name:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name"
                                           value="{{$product->name}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-4 col-form-label text-md-right">Price:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="price"
                                           value="{{$product->price}}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Update Product
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection