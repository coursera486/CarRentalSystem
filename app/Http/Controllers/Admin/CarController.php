<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Library\Structure;
use Validator, DB;

class CarController extends Controller
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
        return view('admin.cars.index');
    }

    public function add_car()
    {
        return view('admin.cars.add_car');
    }

    public function save_car(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'car_make' => 'required',
            'car_model' => 'required',
            'year' => 'required',
            'vin' => 'required',
            'engine_type' => 'required',
            'transmission' => 'required',
            'body_type' => 'required',
            'fuel_type' => 'required',
            'color' => 'required',
            'mileage' => 'required',
            'seating_capacity' => 'required',
            'no_of_doors' => 'required',
            'rent_price' => 'required',
            'availability_status' => 'required',
            'insurance_policy_number' => 'required',
            'insurance_expiry_date' => 'required',
            'registration_number' => 'required',
            'registration_expiry_date' => 'required',
            'air_conditioning' => 'required',
            'bluetooth' => 'required',
            'usb_port' => 'required',
            'heated_seats' => 'required',
            'sunroof' => 'required',
            'description' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json(['status'=> false, 'message' => $validation->errors()->first()]);
        }    

        $data = [
            'car_make' => $request->car_make,
            'car_model' => $request->car_model,
            'year' => $request->year,
            'vin' => $request->vin,
            'engine_type' => $request->engine_type,
            'transmission' => $request->transmission,
            'body_type' => $request->body_type,
            'fuel_type' => $request->fuel_type,
            'color' => $request->color,
            'mileage' => $request->mileage,
            'seating_capacity' => $request->seating_capacity,
            'no_of_doors' => $request->no_of_doors,
            'rent_price' => $request->rent_price,
            'availability_status' => $request->availability_status,
            'insurance_policy_number' => $request->insurance_policy_number,
            'insurance_expiry_date' => $request->insurance_expiry_date,
            'registration_number' => $request->registration_number,
            'registration_expiry_date' => $request->registration_expiry_date,
            'air_conditioning' => $request->air_conditioning,
            'bluetooth' => $request->bluetooth,
            'usb_port' => $request->usb_port,
            'heated_seats' => $request->heated_seats,
            'sunroof' => $request->sunroof,
            'description' => $request->description,
        ];

        if($request->hasfile('main_image'))
        {
            $main_image_file=$request->file('main_image');
            $fileExtension=$main_image_file->getClientOriginalExtension();
            $main_image=time()."_main_image.".$fileExtension;
            $main_image_file->move('uploads/main_image', $main_image);
            $data['main_image'] = $main_image;
        }

        if(isset($request->car_id)){
            $update = DB::table('cars')->where('id', $request->car_id)->update($data);
        }
        else{
            $insert_id = DB::table('cars')->insertGetId($data);
        }

        if(isset($request->images)) {
            foreach($request->images as $key => $image) {
                $fileExtension = $image->getClientOriginalExtension();
                $fileName = time().$key."_image.".$fileExtension;
                $image->move('uploads/images', $fileName);
                $data['image'] = $fileName;
                $car_id = isset($request->car_id) ? $request->car_id : $insert_id;
                DB::table('car_images')->insert([ 'car_id' => $car_id , 'image' => $fileName ]);
            }
        }
        
        if (isset($insert_id) || isset($update)) {
            return response()->json(['status'=> true, 'message' =>'Car Saved Successfully!']);
        }else{
            return response()->json(['status'=> false, 'message' => 'Something went wrong, please try again']);
        }
    }

    public function carDataTable(Request $request)
    {
        if($request->ajax()){

           $query = DB::table('cars')->where('is_deleted','No');

           if(isset($request->state_filter))
           {
            $query->where('state',$request->state_filter);
           }
           $rows = $query->orderBy('id', 'desc')->get();

           return DataTables()->of($rows)->addIndexColumn()
           ->addColumn('id', function($data){
               return $data->id;
               })    
           ->addColumn('car_make', function($data){
               return $data->car_make;
            })   
            ->addColumn('car_model', function($data){
                return $data->car_model;
             })  
             ->addColumn('vin', function($data){
                return $data->vin;
             })  
             ->addColumn('engine_type', function($data){
                return $data->engine_type;
             })  
             ->addColumn('transmission', function($data){
                return $data->transmission;
             })  
             ->addColumn('body_type', function($data){
                return $data->body_type;
             })  
            ->addColumn('status', function($data){
                if($data->is_active=="Yes"){
                        $status = '<span class="text-success">Active</span>';
                    }
                    else{
                        $status = '<span class="text-danger">Inactive</span>';
                    }
                return $status;
            }) 
            ->addColumn('actions', function($data) 
            {
                $buttons = '<div class="ui" style="width: 170px;">';
                $buttons .= '<a href="'.route('admin.car_detail',$data->id).'" data-id="'.$data->id.'" class="btn btn-sm btn-secondary car_details" data-toggle="tooltip" data-placement="top" data-tooltip="View car details" style="padding:.700rem .666rem;" ><i class="bx bx-info-circle"></i></a>';
                $buttons .= ' <a href="'.route('admin.edit_car',$data->id).'" data-id="'.$data->id.'" class="btn btn-sm btn-primary edit_car" data-toggle="tooltip" data-placement="top" data-tooltip="Edit car" style="padding:.700rem .666rem;" ><i class="bx bx-edit"></i></a>';
                if($data->is_active=="Yes")
                {
                    $buttons .= ' <a href="javascript:void(0);" data-id="'.$data->id.'" class="btn btn-sm btn-danger deactivate-car-btn" data-toggle="tooltip" data-placement="top" data-tooltip="Block car" style="padding:.700rem .666rem;" ><i class="bx bx-block"></i></a>';
                }
                else
                {
                    $buttons .= ' <a href="javascript:void(0);" data-id="'.$data->id.'" class="btn btn-sm btn-success activate-car-btn" data-toggle="tooltip" data-placement="top" data-tooltip="Activate car" style="padding:.700rem .666rem;" ><i class="bx bx-check"></i></a>';
                }
                $buttons .= '<a href="javascript:void(0);" data-id="'.$data->id.'" class="btn btn-sm btn-danger car-delt-btn" data-toggle="tooltip" data-placement="top" data-tooltip="Delete car" style="margin-left:5px;padding:.700rem .666rem;" ><i class="bx bx-trash"></i></a>';
                $buttons .= '</div>';
                return $buttons;
            })
           ->rawColumns([ 'id','status','actions'])
           ->make(true);
        }
    }

    public function edit_car(Request $request,$id)
    {
        $data['car'] = DB::table('cars')->where('id',$id)->first();
        return view('admin.cars.add_car')->with($data);
    }

    public function car_detail(Request $request,$id)
    {
        $data['car'] = DB::table('cars')->where('id',$id)->first();
        $data['images'] = DB::table('car_images')->where('car_id',$id)->get();
        return view('admin.cars.car_detail')->with($data);
    }

    public function car_deactivate(Request $request)
    {
        $id = $request->id;
        $data = ['is_active' => "No"];
        $query =  DB::table('cars')->where('id', $id)->update($data);
        if ($query)
        {
            return response()->json(['status'=> true, 'message' => 'Car Deactivated successfully !']);
        }
        else
        {
            return response()->json(['status'=> false, 'message' => 'Something went wrong !',]);
        }
    }

    public function car_activate(Request $request)
    {
        $id = $request->id;
        $data = ['is_active' => "Yes"];
        $query =  DB::table('cars')->where('id', $id)->update($data);
        if ($query>0)
        {
            return response()->json(['status'=> true, 'message' => 'Car Activated successfully !']);
        }
        else
        {
            return response()->json(['status'=> false, 'message' => 'Something went wrong !']);
        }
    }

    public function car_delete(Request $request)
    {
        $id = $request->id;
        $data = ['is_deleted' => "Yes"];
        $query =  DB::table('cars')->where('id', $id)->update($data);
        if ($query)
        {
            return response()->json(['status'=> true, 'message' => 'Car Deleted successfully !']);
        }
        else
        {
            return response()->json(['status'=> false, 'message' => 'Something went wrong !']);
        }
    }

   
}
