@extends('layouts.app')

@section('content')
<div class="container">
        <table id='t2' width='100%' border="1" style='border-collapse: collapse;'>
            <thead>
                <tr>
                    <td><b>ID</b></td>
                    <td><b>customer ID</b></td>
                    <td><b>Communication date</b></td>
                    <td><b>Communication type</b></td>
                    <td><b>Communication scope</b></td>
                    <td><b>Projected price</b></td>
                    <td><b>Invoiced</b></td>
                    <td><b>Action</b></td>
                </tr>
             </thead>
        </table>
        <a href="{{route('newinfo', ['customer_id' => $customer_id])}}"><button class="btn btn-primary">Add info</button></a>
    <script type="text/javascript">
        $(document).ready(function(){
            // DataTable
           $('#t2').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{route('getInfo')}}",
                columns: [
                    { data: 'id' },
                    { data: 'customer_id' },
                    { data: 'communication_date' },
                    { data: 'communication_type' },
                    { data: 'communication_scope' },
                    { data: 'projected_price' },
                    { data: 'invoiced' },
                    { data: 'action' },
                ]
            });

        });
    </script>
</div>
@endsection
