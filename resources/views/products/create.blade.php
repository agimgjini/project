@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- if validation in the controller fails, show the errors -->
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
        @endif

        <div>

            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                    <!-- Add CSRF Token -->
                    @csrf
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <input type="file" name="file" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <table>
            @foreach ($product as $products)
            <tr>
                <td>
                    <p> {{ $products->name }}: <a href="" download="{{ $products->file_path }}"> {{ $products->file_path }} </a> </p>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection
