<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Library\Structure;
use App\Models\User;

class UserController extends Controller
{
    use Structure;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.users');
    }

    /**
     * Show data in datatable.
     */
    public function data(Request $request){

        $query = User::query();

        if ($request->status && $request->status != 'All') {
            $query->where("is_active", $request->status);
        }

        $data = $query->orderBy('id', 'desc')->get();
        return datatables()->of($data)->addColumn('action', function ($data) {

            $button = '<div class="btn-group">';
            if ($data->is_active == 'Yes') {
                $button .= '<a href="javascript:void()" name="disable" data-value="'.$data->id.'" class="status-btn btn btn-sm btn-danger"><i class="bx bx-block"></i></a>';
            }else{
                $button .= '<a href="javascript:void()" name="enable" data-value="'.$data->id.'" class="status-btn btn btn-sm btn-success"><i class="bx bx-check"></i></a>';
            }
            $button .= '</div>';

            return $button;
        })->addColumn('status', function ($data) {
            if ($data->is_active == 'Yes') {
                return '<span class="badge badge-light-info">Active</span>';
            }
            return '<span class="badge badge-light-danger">In-Active</span>';
        })->rawColumns(['action', 'status', 'name'])->make(true);
    }

    public function status(Request $request){

        if ($request->status == 'delete') {
           $data = ['deleted_at' => date('Y-m-d H:i:s')];
        } else {
          if ($request->status == 'enable') {
            $data = ['is_active'=>'Yes', 'updated_at' => date('Y-m-d H:i:s')];
          }
          else{
             $data = ['is_active'=>'No', 'updated_at' => date('Y-m-d H:i:s')];
          }
        }
        $response = User::where('id', $request->id)->update($data);

        if ($response > 0) {
            if ($request->status == 'delete') {
              return response()->json($this->structure(true, "Deleted Succesfully."), 200);
            }
            return response()->json($this->structure(true, "Status Updated Succesfully"), 200);
        }
        return response()->json($this->structure(false, "Somthing went wrong, try again!"), 200);
    }
}
