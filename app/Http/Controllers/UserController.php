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

    public function sortColumn()
    {
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        } else {
            $order = 'perjalanan_models.tanggal';
        }

        if (isset($_GET['sort'])) {
            $sort = $_GET['sort'];
        } else {
            $sort = 'ASC';
        }
        // if ($sort == 'DESC') {
        //     $sort = 'ASC';
        // } else {
        //     $sort = 'DESC';
        // }

        $sort == 'ASC' ? $sort = 'DESC' : $sort = 'ASC';

        $data = DB::table('perjalanan_models')
            ->join('users', 'users.id', '=', 'perjalanan_models.user_id')
            ->select('users.nama', 'users.nik', DB::raw('count(perjalanan_models.user_id) as catatan'))
            ->groupBy('users.id', 'users.nama', 'users.nik')
            ->orderBy($order, $sort)
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
                'nama.required' => 'nama tidak boleh kosong',
                'nik.required' => 'nik tidak boleh kosong'

            ]
        );
        $data = [
            'nama' => $request->nama,
            'role' => 'pengguna',
            'nik' => $request->nik,
            'password' => bcrypt($request->nik)
        ];
        // dd($data);  
        // if ($request->fails()) {
        //     return redirect()->back()->withInput()->withErrors($request);
        // }
        user::create($data);
        return redirect('/')->with('sukses', 'Berhasil Mendaftar!');
    }

    public function login()
    {
        return view('auths.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate(
            [
                'nik' => 'required',
                'nama' => 'required',
                'password' => 'required'

            ],
            [
                'nik.required' => 'tidak boleh kosong',
                'nama.required' => 'tidak boleh kosong',
                'password.required' => 'tidak boleh kosong'

            ]
        );
        if (Auth::attempt($request->only('nama', 'nik', 'password'))) {
            return redirect('/home');
        }
        return redirect()->back()->withInput()->withErrors([
            'nik' => 'nik salah',
            'nama' => 'nama salah',
            'password' => 'password salah'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
