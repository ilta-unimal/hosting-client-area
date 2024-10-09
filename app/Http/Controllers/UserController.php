<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'User',
            'subTitle' => null,
            'page_id' => null,
            'district' => District::all()
        ];
        return view('pages.user.index', $data);
    }

    public function data(Request $request) 
    {
        $search = $request->input('q');
        $query = User::query();

        $query->when($search, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
            });
        });

        $users = $query->with('district','village')->paginate(10);

        return response()->json($users);
    }
}

