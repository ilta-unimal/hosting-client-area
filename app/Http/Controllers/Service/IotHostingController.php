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

    public function create(){
        $data = [
            'title' => 'Service',
            'subTitle' => 'Create IOT Hosting',
            'page_id' => null,
        ];
        return view('pages.service.iot_hosting.create',  $data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'domain' => [
                'required', // Pastikan domain diisi
                'alpha_num', // Hanya boleh huruf dan angka
                'unique:iots,domain', // Harus unik di tabel 'iot', kolom 'domain'
            ],
        ]);
        if ($validator->fails()) {
            return redirect()->route('service.iot-hosting.create')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }
        $host =  New Iot();
        $host->user_id = Auth::user()->id;
        $host->domain =   $request->domain;
        $host->save();
        return redirect()->route('service.iot-hosting.payment', $host->id)->with('success', 'Iot hosting droplet created successfully');
    }

    public function payment($id){
        $data = [
            'title' => 'Service',
            'subTitle' => 'Payment',
            'page_id' => null,
            'droplet' => Iot::where('id', $id)->where('user_id', Auth::user()->id)->whereDoesntHave('iotPayment')->firstOrFail()
        ];
        return view('pages.service.iot_hosting.payment',  $data);
    }

    public function paymentStore($id, Request $request){
        $droplet = Iot::where('id', $id)->where('user_id', Auth::user()->id)->whereDoesntHave('iotPayment')->firstOrFail();
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,bmp,png,jpg,svg',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }
        $payment =  New IotPayment();
        $payment->iot_id = $id;
        $payment->payment_file =  $request->file('file')->store('payment', 'public');
        $payment->save();
        return redirect()->route('service.iot-hosting')->with('success', 'Payment successfuly')->with('payment', $droplet->domain);
    }
}
