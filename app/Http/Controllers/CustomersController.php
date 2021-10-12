<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomersController extends Controller
{
    public function __construct(Request $request)
	{
		$this->request = $request;
	}

    public function index(){

        // Load index view
        return view('index');
    }

    public function newCustomer(){
        if($this->request->method() == 'POST'){
            $alert = request() -> validate([
                'name_surename' => 'required',
                'company' => 'required',
                'telephone' => 'required|numeric|min:10',
                'address' => 'required',
                'email' => 'required|email:rfc,dns'
            ]);

            $customers = new Customers();
            $customers->name_surename = $this->request->get('name_surename');
            $customers->company = $this->request->get('company');
            $customers->telephone = $this->request->get('telephone');
            $customers->address = $this->request->get('address');
            $customers->email = $this->request->get('email');
            $customers->save();
        };

        return view('newCustomer');
    }

    // Fetch records
    public function getCustomers(){

       ## Read value
       $draw = $this->request->get('draw');
       $start = $this->request->get("start");
       $rowperpage = $this->request->get("length"); // Rows display per page

       $columnIndex_arr = $this->request->get('order');
       $columnName_arr = $this->request->get('columns');
       $order_arr = $this->request->get('order');
       $search_arr = $this->request->get('search');

       $columnIndex = $columnIndex_arr[0]['column']; // Column index
       $columnName = $columnName_arr[$columnIndex]['data']; // Column name
       $columnSortOrder = $order_arr[0]['dir']; // asc or desc
       $searchValue = $search_arr['value']; // Search value

       // Total records
       $totalRecords = Customers::select('count(*) as allcount')->count();
       $totalRecordswithFilter = Customers::select('count(*) as allcount')->where('name_surename', 'like', '%' .$searchValue . '%')->count();

       // Fetch records
       $records = Customers::orderBy($columnName,$columnSortOrder)
              ->where('customers.name_surename', 'like', '%' .$searchValue . '%')
             ->select('customers.*')
             ->skip($start)
             ->take($rowperpage)
             ->get();

       $data_arr = array();

       foreach($records as $record){
          $id = $record->id;
          $name_surename = $record->name_surename;
          $company = $record->company;
          $telephone = $record->telephone;
          $address = $record->address;
          $email = $record->email;

          $data_arr[] = array(
              "id" => $id,
              "name_surename" => $name_surename,
              "company" => $company,
              "telephone" => $telephone,
              "address" => $address,
              "email" => $email,
              "action" => '<a href="'.route('editcustomers', ['customers' => $id]).'"><button class="btn btn-primary">Edit</button></a> <a href="customer_info/'.$id.'"><button class="btn btn-primary">View</button></a> <a href="'.route('deleteCustomer', ['customers' => $id], ['customer_info' => $this->request->customer_id]).'"><button class="btn btn-danger">Delete</button></a>'
          );
       }

       $response = array(
          "draw" => intval($draw),
          "iTotalRecords" => $totalRecords,
          "iTotalDisplayRecords" => $totalRecordswithFilter,
          "aaData" => $data_arr
       );



       return response()->json($response);
    }

    public function editcustomers(Customers $customers){
        if($this->request->method() == 'POST'){
            $alert = request() -> validate([
                'name_surename' => 'required',
                'company' => 'required',
                'telephone' => 'required|numeric|min:10',
                'address' => 'required',
                'email' => 'required|email:rfc,dns'
            ]);

            $customers->name_surename = $this->request->get('name_surename');
            $customers->company = $this->request->get('company');
            $customers->telephone = $this->request->get('telephone');
            $customers->address = $this->request->get('address');
            $customers->email = $this->request->get('email');

            if($customers->save()){
                return redirect('home');
            };

        };
        return view('editcustomers', ['customers' => $customers]);
    }

    public function deleteCustomer(Customers $customers ){
        $customers -> delete();
        // $this->request->customer_id -> delete();
        return redirect('/home');
    }
}
