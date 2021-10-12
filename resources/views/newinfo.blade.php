@extends('layouts.app')

@section('content')
<div class="container">
        <form action="{{route('newinfo')}}" method="POST">
            @csrf
                <input type="hidden" name="id" value="{{$customer_id}}">
                <p><b>Communication Date:</b></p>
                <input id="communication_date" type="date pickers" name="communication_date" class="form-control" value="{{Request::old('communication_date')}}" required>
                <p style="color: red">@error('communication_date') {{$message}} @enderror</p>
                <p><b>Communication Type:</b></p>
                <input type="text" name="communication_type" class="form-control" value="{{Request::old('communication_type')}}" required>
                <p style="color: red">@error('communication_type') {{$message}} @enderror</p>
                <p><b>Communication Scope:</b></p>
                <input type="text" name="communication_scope" class="form-control" value="{{Request::old('communication_scope')}}" required>
                <p style="color: red">@error('communication_scope') {{$message}} @enderror</p>
                <p><b>Projected Price:</b></p>
                <input type="number" name="projected_price" class="form-control" value="{{Request::old('projected_price')}}" required>
                <p style="color: red">@error('projected_price') {{$message}} @enderror</p>
                <div>
                    <label for="invoiced"><b>Invoiced:</b></label>
                    <input type="checkbox" id="invoiced" name="invoiced">
                </div>
            <button class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection
