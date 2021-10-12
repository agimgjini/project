@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit post</h1>
        <form action="" method="POST">
            @csrf
            <p><b>Name and Surename:</b></p>
            <input type="text" name="name_surename" placeholder="Name and Surename" class="form-control" value="{{$customers->name_surename}}" required>
            <p style="color: red">@error('name_surename') {{$message}} @enderror</p>
            <p><b>Company Name:</b></p>
            <input type="text" name="company" placeholder="Company name" class="form-control" value="{{$customers->company}}" required>
            <p style="color: red">@error('company') {{$message}} @enderror</p>
            <p><b>Telephone:</b></p>
            <input type="number" name="telephone" placeholder="Telephone number" class="form-control" value="{{$customers->telephone}}" required>
            <p style="color: red">@error('telephone') {{$message}} @enderror</p>
            <p><b>Address:</b></p>
            <input type="text" name="address" placeholder="Adress" class="form-control" value="{{$customers->address}}" required>
            <p style="color: red">@error('address') {{$message}} @enderror</p>
            <p><b>Email:</b></p>
            <input type="text" name="email" placeholder="Email" class="form-control" value="{{$customers->email}}" required>
            <p style="color: red">@error('email') {{$message}} @enderror</p>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
