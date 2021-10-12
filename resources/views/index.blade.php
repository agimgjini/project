<!DOCTYPE html>
<html>
<head>
     <title>Project</title>

     <!-- Meta -->
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <meta charset="utf-8">

     <!-- Datatable CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css"/>

     <!-- jQuery Library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

     <!-- Datatable JS -->
     <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

     <style type="text/css" media="screen">
        #t1 tr:nth-child(odd) {background-color: white;}
        #t1 tr:nth-child(even) {background-color: lightgray;}
     </style>

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Project
            </a>
            <a class="navbar-brand" href="{{ url('/home') }}">
                Customers
            </a>
            <a class="navbar-brand" href="{{ url('/users') }}">
                Users
            </a>
            {{-- <a class="navbar-brand" href="{{ url('/logout') }}">
                logout
            </a> --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <table id='t1' width='80%' border="1" style='border-collapse: collapse;'>
        <thead>
            <tr>
                 <td><b>S.no</b></td>
                 <td><b>Name {{trans('application.surname')}}</b></td>
                 <td><b>Company Name</b></td>
                 <td><b>Telephone</b></td>
                 <td><b>Address</b></td>
                 <td><b>Email</b></td>
                 <td><b>Action</b></td>
            </tr>
         </thead>
     </table>

     <a href="newCustomer"><button class="btn btn-primary">Add New Customer</button></a>
     <a href="file_uplaod"><button class="btn btn-primary">Upload a file</button></a>

     <!-- Script -->
     <script type="text/javascript">
     $(document).ready(function(){

         // DataTable
        $('#t1').DataTable({
             processing: true,
             serverSide: true,
             ajax: "{{route('getCustomers')}}",
             columns: [
                 { data: 'id' },
                 { data: 'name_surename' },
                 { data: 'company' },
                 { data: 'telephone' },
                 { data: 'address' },
                 { data: 'email' },
                 { data: 'action' },
             ]
         });

      });
      </script>
</body>
</html>
