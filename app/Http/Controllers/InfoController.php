<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer_info;

class InfoController extends Controller
{
    protected $request;

	public function __construct(Request $request)
	{
		$this->request = $request;
	}

    public function index(){

        // Load index view
        return view('customer_info', ['customer_id' => $this->request->id]);
    }

    public function newinfo(){
        if($this->request->method() == 'POST'){
            $alert = request() -> validate([
                'communication_date' => 'required|date',
                'communication_type' => 'required',
                'communication_scope' => 'required',
                'projected_price' => 'required|numeric'
            ]);
            $customer_info = new Customer_info();
            $customer_info->customer_id = $this->request->id;
            $customer_info->communication_date = $this->request->get('communication_date');
            $customer_info->communication_type = $this->request->get('communication_type');
            $customer_info->communication_scope = $this->request->get('communication_scope');
            $customer_info->projected_price = $this->request->get('projected_price');
            $customer_info->invoiced = $this->request->has('invoiced');

            if($customer_info->save()){
                return redirect()->route('customer_info', ['customer_info' => $this->request->id]);
                echo "Your entry was successful";
            };


        };

        return view('newinfo', ['customer_id' => $this->request->customer_id]);
    }

    public function getInfo(){

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
        // if ($columnSortOrder === null) $columnSortOrder = 'asc';

        // Total records
        $totalRecords = Customer_info::select('count(*) as allcount')->count();
        $totalRecordswithFilter = Customer_info::select('count(*) as allcount')->count();

        // Fetch records
        $records = Customer_info::orderBy($columnName,$columnSortOrder)
              //->where('customer_id', '=', $this->request->customers)
              ->select('customer_info.*')
              ->skip($start)
              ->take($rowperpage)
              ->get();

        $data_arr = array();

        foreach($records as $record){
            $id = $record->id;
            $customer_id = $record->customer_id;
            $communication_date = $record->communication_date;
            $communication_type = $record->communication_type;
            $communication_scope = $record->communication_scope;
            $projected_price = $record->projected_price;
            $invoiced = $record->invoiced;

            $data_arr[] = array(
                "id" => $id,
                "customer_id" => $customer_id,
                "communication_date" => $communication_date,
                "communication_type" => $communication_type,
                "communication_scope" => $communication_scope,
                "projected_price" => $projected_price,
                "invoiced" => $invoiced,
                "action" => '<a href="'.route('editinfo', ['customer_info' => $id]).'"><button class="btn btn-primary">Edit</button></a>  <a href="'.route('deleteInfo', ['customer_info' => $id]).' "><button onclick="return confirm()" class="btn btn-danger">Delete</button></a>',
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

     public function editinfo(Customer_info $customer_info){
        if($this->request->method() == 'POST'){
            $alert = request() -> validate([
                'communication_date' => 'required|date',
                'communication_type' => 'required',
                'communication_scope' => 'required',
                'projected_price' => 'required|numeric'
            ]);
            $customer_info->customer_id = $this->request->id;
            $customer_info->communication_date = $this->request->get('communication_date');
            $customer_info->communication_type = $this->request->get('communication_type');
            $customer_info->communication_scope = $this->request->get('communication_scope');
            $customer_info->projected_price = $this->request->get('projected_price');
            $customer_info->invoiced = $this->request->has('invoiced');

            if($customer_info->save()){
                return redirect('customer_info/');
            };


        };

        return view('editinfo', ['customer_info' => $customer_info]);
    }

    public function deleteInfo(Customer_info $customer_info ){
        $customer_info -> delete();
        return redirect('customer_info');
    }

}
