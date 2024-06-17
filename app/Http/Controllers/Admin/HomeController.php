<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Library\Structure;
use Validator;

class HomeController extends Controller
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
        return view('admin.home');
    }

    public function password_update(Request $request){
        
        $validator = Validator::make($request->all(), 
            [ 
              'current_password' => 'required|min:6',  
              'password' => 'required|min:6',  
              'confirm_password' => 'required|same:password|min:6',  
            ]);

        if ($validator->fails()) {
            return response()->json($this->structure(false, $validator->errors()->first()), 200);
        }

        try {
            $admin = Admin::findOrFail(Auth::guard('admin')->user()->id);
        } catch (\Exception $e) {
            return response()->json($this->structure(false, 'Something went wrong!'), 200);
        }

        if (!(Hash::check($request->current_password, $admin->password))) {
            return response()->json($this->structure(false, 'Old password is not currect!'), 200);
        }

        $admin->password = Hash::make($request->password);
        $admin->updated_at = date('Y-m-d h:i:s');

        if ($admin->save()) {
            return response()->json($this->structure(true, 'Password has changed Successfully!'), 200);
        }
        return response()->json($this->structure(false, 'Something went wrong!'), 200);
    }
}
