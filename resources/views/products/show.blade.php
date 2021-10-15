@extends('layouts.app')

@section('content')
<div class="container">
        @foreach ($products as $product)
        <tr>
            <td>
                <p> {{ $product->name }}: <a href="" download="{{ $product->file_path }}"> {{ $product->file_path }} </a> </p>
            </td>
        </tr>
        @endforeach
</div>
@endsection
