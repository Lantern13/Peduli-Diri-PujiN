<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PerjalananModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    public function index()
    {
        return view('auths.register');
    }

    public function showUser()
    {
        $data = DB::table('perjalanan_models')
            ->join('users', 'users.id', '=', 'perjalanan_models.user_id')
            ->select('users.nama', 'users.nik', DB::raw('count(perjalanan_models.user_id) as catatan'))
            ->groupBy('users.id', 'users.nama', 'users.nik')
            ->paginate(10);

        return view('pages.user', compact('data'));
    }

    public function simpanRegister(Request $request)
    {
        $request->validate(
            [
                'nik' => 'required|unique:users,nik',
                'nama' => 'required'

            ],
            [
                'nik.unique' => 'nik sudah terdaftar',
                'nama.required' => 'nama tidak boleh kosong'

            ]
        );
        $data = [
            'nama' => $request->nama,
            'role' => 'pengguna',
            'nik' => $request->nik,
            'password' => bcrypt($request->nik)
        ];
        // dd($data);  
        // if($request->fails()){
        //     return redirect('/register')->withErrors($request);
        // }else{
        user::create($data);
        return redirect('/');
        // }
    }

    public function login()
    {
        return view('auths.login');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('nama', 'nik', 'password'))) {
            return redirect('/home');
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
