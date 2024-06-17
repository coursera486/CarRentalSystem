<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notification;
use App\Library\Structure;
use Validator;

class NotificationController extends Controller
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
     */
    public function index()
    {
        return view('admin.notifications');
    }

    public function data(Request $request){

        $table = Notification::where('type', 'manual');

        if($request->notify_to && $request->notify_to != 'all')
        {  
            $table = $table->where('user_type', ucfirst($request->notify_to));
        }
        $data = $table->orderBy('id', 'desc')->get();

        return datatables()->of($data)->addColumn('action', function ($data) {
            if ($data->is_active == 'Yes') {
                $button = '<a href="javascript:void()" name="disable" data-value="'.$data->id.'" class="status-btn"><i class="bx bx-block text-danger"></i></a>';
            }else{
                $button = '<a href="javascript:void()" name="enable" data-value="'.$data->id.'" class="status-btn"><i class="bx bx-check text-success"></i></a>';
            }
            return $button;
        })->addColumn('message', function ($data) {
            if ($data->message!=null && $data->message!='') {
                return "<p>$data->message</p>";
            }
            return "-";
        })->addColumn('notify_to', function ($data) {
            return $data->user_type ? ucwords(str_replace('_', ' ', $data->user_type)) : 'All' ;
        })->rawColumns(['action', 'message', 'notify_to'])->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'message' => 'nullable|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json($this->structure(false, $validator->errors()->first()), 200);
        }

        $data = [];
        $notifyTo = $request->notify_to;
        $title = ucfirst($request->title);
        $message = ucfirst($request->message);

        if (in_array("all", $notifyTo))
        {
            $data = ['title' => $title, 'message' => $message, 'type' => 'manual'];
        }
        else
        {
            foreach ($notifyTo as $user_type) {
                if ($user_type!='all') {
                    $data = ['user_type' => strtolower($user_type), 'title' => $title, 'message' => $message, 'type' => 'manual'];
                }
            }
        }
        
        $data['created_at'] = date('Y-m-d H:i:s');

        try {
            Notification::create($data);
            return response()->json($this->structure(true, "Sent successfully."));
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json($this->structure(false, "Something Went Wrong!"));
        }
    }

}
