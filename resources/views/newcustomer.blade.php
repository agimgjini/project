@extends('layouts.app')

@section('content')
<div class="container">
        <form action="" method="POST">
            @csrf
            <input type="text" name="name_surename" placeholder="Name and Surename" class="form-control" value="{{Request::old('name_surename')}}" required>
            <p style="color: red">@error('name_surename') {{$message}} @enderror</p>
            <input type="text" name="company" placeholder="Company name" class="form-control" value="{{Request::old('company')}}" required>
            <p style="color: red">@error('company') {{$message}} @enderror</p>
            <input type="tel" name="telephone" placeholder="Telephone number" class="form-control" value="{{Request::old('telephone')}}" required>
            <p style="color: red">@error('telephone') {{$message}} @enderror</p>
            <input type="text" name="address" placeholder="Adress" class="form-control" value="{{Request::old('address')}}" required>
            <p style="color: red">@error('address') {{$message}} @enderror</p>
            <input type="email" name="email" placeholder="Email" class="form-control" value="{{Request::old('email')}}" required>
            <p style="color: red">@error('email') {{$message}} @enderror</p>
            <button class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection
