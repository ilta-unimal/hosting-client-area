<?php

namespace App\Http\Controllers\Client;

use App\Models\Iot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IotAccount;
use App\Models\IotPayment;
use Illuminate\Support\Facades\Validator;

class IotClientController extends Controller
{
    public function pending(){
        $data = [
            'title' => 'Client',
            'subTitle' => 'IOT Hosting',
            'page_id' => null,
            'droplets' => Iot::has('iotPayment')->whereDoesntHave('iotAccount')->get()
        ];
        return view('pages.client.iot_hosting.pending',  $data);
    }

    public function approve($id, Request $request){
        $validator = Validator::make($request->all(), [
            'expired' => 'required',
            'url' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('client.iot-hosting.pending')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }
        $host =  New IotAccount();
        $host->iot_id = $id;
        $host->expired_date =   $request->expired;
        $host->panel_url =   $request->url;
        $host->panel_username =   $request->username;
        $host->panel_password =   $request->password;
        $host->save();
        return redirect()->route('client.iot-hosting.pending')->with('success', 'Iot hosting approved');
    }

    public function active(){
        $data = [
            'title' => 'Client',
            'subTitle' => 'IOT Hosting',
            'page_id' => null,
            'droplets' => Iot::has('iotPayment')->has('iotAccount')->get()
        ];
        return view('pages.client.iot_hosting.active',  $data);
    }

    public function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            'expired' => 'required',
            'url' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->route('client.iot-hosting.active')->with('error', 'Validation Error')->withInput()->withErrors($validator);
        }
        $host = IotAccount::findOrFail($id);
        $host->expired_date =   $request->expired;
        $host->panel_url =   $request->url;
        $host->panel_username =   $request->username;
        $host->panel_password =   $request->password;
        $host->save();
        return redirect()->route('client.iot-hosting.active')->with('success', 'Iot hosting approved');
    }
}
