<?php

namespace App\Http\Controllers\Service;

use App\Models\Iot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IotPayment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IotHostingController extends Controller
{
    public function index(){
        $data = [
            'title' => 'Service',
            'subTitle' => 'IOT Hosting',
            'page_id' => null,
            'droplets' => Iot::where('user_id', Auth::user()->id)->get()
        ];
        return view('pages.service.iot_hosting.index',  $data);
    }

    public function paymentSubmit($id, Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'nullable|sometimes|image|mimes:jpeg,bmp,png,jpg,svg',
        ]);
        if ($validator->fails()) {
            return redirect()->route('service.iot-hosting')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }
        $payment =  New IotPayment();
        $payment->iot_id = $id;
        $payment->payment_file =  $request->file('file')->store('user', 'public');
        $payment->save();
        return redirect()->route('service.iot-hosting')->with('success', 'Payment successfuly');
    }

    public function create(){
        $data = [
            'title' => 'Service',
            'subTitle' => 'Create IOT Hosting',
            'page_id' => null,
        ];
        return view('pages.service.iot_hosting.create',  $data);
    }

    public function store(Request $request){

    }
}
