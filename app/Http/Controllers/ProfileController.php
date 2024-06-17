<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['user'] = DB::table('users')->where('id',auth()->user()->id)->first();
        return view('user.profile')->with($data);
    }

    public function save_profile(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required',
            'state' => 'required',
            'city' => 'required',
            'pincode' => 'required',
            'dob' => 'required',
            'age' => 'required',
            'driving_license' => 'required',
            'aadhar' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json(['status'=> false, 'message' => $validation->errors()->first()]);
        }

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'pincode' => $request->pincode,
            'dob' => $request->dob,
            'age' => $request->age,
            'driving_license' => $request->driving_license,
            'aadhar' => $request->aadhar,
            'about' => $request->about,
        ];

        if($request->hasfile('image'))
        {
            $image_file=$request->file('image');
            $fileExtension=$image_file->getClientOriginalExtension();
            $image=time()."_image.".$fileExtension;
            $image_file->move('uploads/profile', $image);
            $data['image'] = $image;
        }

        $update = DB::table('users')->where('id', auth()->user()->id)->update($data);

        if (isset($update)) {
            return response()->json(['status'=> true, 'message' =>'Profile updated Successfully!']);
        }else{
            return response()->json(['status'=> false, 'message' => 'Something went wrong, please try again']);
        }
    }
}
