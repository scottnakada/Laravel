<!-- create.blade.php -->

@extends('layouts.app')

<!-- this will add laravel’s default navbar to your page -->

@section('content')

    <!-- here goes your body content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Create A Product</div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div><br />
                        @endif
                        <form method="post" action="{{url('products')}}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Name:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-4 col-form-label text-md-right">Price:</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="price">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Product
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