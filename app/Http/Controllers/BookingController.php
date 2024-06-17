<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data['user'] = DB::table('users')->where('id', auth()->user()->id)->first();
        return view('user.my_bookings')->with($data);
    }

    public function new_booking()
    {
        $data['cars'] = DB::table('cars')->where('is_active', 'Yes')->where('is_deleted', 'No')->get();
        $data['user'] = DB::table('users')->where('id', auth()->user()->id)->first();
        return view('user.new_booking')->with($data);
    }

    public function car_book($id)
    {
        $data['car'] = DB::table('cars')->where('id', $id)->first();
        $data['images'] = DB::table('car_images')->where('car_id', $id)->get();
        $data['user'] = DB::table('users')->where('id', auth()->user()->id)->first();
        return view('user.car_book')->with($data);
    }

    public function get_price(Request $request)
    {
        $rent_price = DB::table('cars')->where('id', $request->car_id)->value('rent_price');

        $pickupDateTime = Carbon::parse($request->pickup_date . ' ' . $request->pickup_time);
        $dropDateTime = Carbon::parse($request->drop_date . ' ' . $request->drop_time);
        if ($dropDateTime->lte($pickupDateTime)) {
            return response()->json(['status' => false, 'message' => 'Drop date time should be more than pickup date time']);
        }
        $hourDifference = $pickupDateTime->diffInHours($dropDateTime);
        $price = $hourDifference * $rent_price;
        return response()->json(['status' => true, 'price' => $price, 'hours' => $hourDifference]);
    }

    public function add_booking(Request $request)
    {
        // if (DB::table('bookings')->where('user_id', auth()->user()->id)->where('car_id', $request->car_id)->exists()) {
        //     return response()->json(['status' => false, 'message' => 'You have already booked this car']);
        // }
        $pickupDateTime = Carbon::parse($request->pickup_date . ' ' . $request->pickup_time);
        $dropDateTime = Carbon::parse($request->drop_date . ' ' . $request->drop_time);
        if ($dropDateTime->lte($pickupDateTime)) {
            return response()->json(['status' => false, 'message' => 'Drop date time should be more than pickup date time']);
        }

        $validation = Validator::make($request->all(), [
            'pickup_date' => 'required',
            'pickup_time' => 'required',
            'drop_date' => 'required',
            'drop_time' => 'required',
            'hours' => 'required',
            'rent_price' => 'required',
            'person_number' => 'required',
        ]);
        if ($validation->fails()) {
            return response()->json(['status' => false, 'message' => $validation->errors()->first()]);
        }

        $seating_capacity = DB::table('cars')->where('id', $request->car_id)->value('seating_capacity');
        if ($seating_capacity < $request->person_number) {
            return response()->json(['status' => false, 'message' => 'The seating capacity of car is ' . $seating_capacity]);
        }

        $data = [
            'pickup_date' => $request->pickup_date,
            'pickup_time' => $request->pickup_time,
            'drop_date' => $request->drop_date,
            'drop_time' => $request->drop_time,
            'hours' => $request->hours,
            'rent_price' => $request->rent_price,
            'person_number' => $request->person_number,
        ];

        if (isset($request->booking_id)) {
            $update = DB::table('bookings')->where('booking_id', $request->booking_id)->update($data);
        } else {
            $data['user_id'] = auth()->user()->id;
            $data['car_id'] = $request->car_id;
            $data['booking_id'] = 'BK' . rand(10000, 99999);
            $insert = DB::table('bookings')->insert($data);
        }

        if (isset($insert) || isset($update)) {
            return response()->json(['status' => true, 'message' => 'Car Booked Successfully!']);
        } else {
            return response()->json(['status' => false, 'message' => 'Something went wrong, please try again']);
        }
    }

    public function bookingDataTable(Request $request)
    {
        if ($request->ajax()) {

            $rows = DB::table('bookings')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();

            return DataTables()->of($rows)->addIndexColumn()
                ->addColumn('id', function ($data) {
                    return $data->id;
                })
                ->addColumn('booking_id', function ($data) {
                    return $data->booking_id;
                })
                ->addColumn('car', function ($data) {
                    $car = DB::table('cars')->where('id', $data->car_id)->value('car_make');
                    return $car;
                })
                ->addColumn('pickup_date_time', function ($data) {
                    $pickupDateTime = Carbon::parse($data->pickup_date . ' ' . $data->pickup_time);
                    return $pickupDateTime->format('d-M-Y h:i A');
                })
                ->addColumn('drop_date_time', function ($data) {
                    $dropDateTime = Carbon::parse($data->drop_date . ' ' . $data->drop_time);
                    return $dropDateTime->format('d-M-Y h:i A');
                })
                ->addColumn('hours', function ($data) {
                    return $data->hours;
                })
                ->addColumn('rent_price', function ($data) {
                    return $data->rent_price;
                })
                ->addColumn('total_amount', function ($data) {
                    return $data->total_amount;
                })
                ->addColumn('payment_status', function ($data) {
                    return $data->payment_status;
                })
                ->addColumn('booking_status', function ($data) {
                    if ($data->status == "Yes") {
                        $status = '<span class="text-success">Active</span>';
                    } else {
                        $status = '<span class="text-danger">Inactive</span>';
                    }
                    return $status;
                })
                ->addColumn('actions', function ($data) {
                    $buttons = '<div class="ui" style="width: 100px;">';
                    $buttons .= '<a href="javascript:void(0);" data-value="' . $data->id . '" class="btn btn-sm btn-secondary booking_details" data-toggle="tooltip" data-placement="top" data-tooltip="View car details" style="padding:.500rem .666rem;" ><i class="bx bx-info-circle" style="font-size:16px;"></i></a>';
                    $buttons .= ' <a href="javascript:void(0);" data-value="' . $data->id . '" class="btn btn-sm btn-primary edit_booking" data-toggle="tooltip" data-placement="top" data-tooltip="Edit car" style="padding:.500rem .666rem;" ><i class="bx bx-edit" style="font-size:16px;"></i></a>';

                    $buttons .= '</div>';
                    return $buttons;
                })
                ->rawColumns(['id', 'booking_status', 'actions'])
                ->make(true);
        }
    }

    public function get_booking_detail(Request $request)
    {
        $data = DB::table('bookings')->where('bookings.id', $request->id)->leftJoin('cars', 'cars.id', 'bookings.car_id')->select('cars.*','bookings.*','bookings.rent_price as booking_rent_price')->first();
        return response()->json($data);
    }
}
