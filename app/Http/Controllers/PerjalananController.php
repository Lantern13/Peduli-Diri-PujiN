<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerjalananModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PerjalananController extends Controller
{
    public function index()
    {
        $data = DB::table('perjalanan_models')
            ->join('users', 'users.id', '=', 'perjalanan_models.user_id')
            ->select('users.nama', 'perjalanan_models.id', 'perjalanan_models.tanggal', 'perjalanan_models.waktu', 'perjalanan_models.lokasi', 'perjalanan_models.suhu')
            ->where('users.nama', '=', auth()->user()->nama)
            ->paginate(10);
        return view('pages.perjalanan', compact('data'));
    }

    public function sortColumn()
    {
        if (isset($_GET['order'])) {
            $order = $_GET['order'];
        } else {
            $order = 'users.nama';
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
            ->select('users.nama', 'perjalanan_models.id', 'perjalanan_models.tanggal', 'perjalanan_models.waktu', 'perjalanan_models.lokasi', 'perjalanan_models.suhu')
            ->where('users.nama', '=', auth()->user()->nama)
            ->orderBy($order, $sort)
            ->paginate(10);


        return view('pages.perjalanan', compact('data'));
    }

    public function form()
    {
        return view('pages.form');
    }

    public function simpanPerjalanan(Request $request)
    {
        $request->validate(
            [
                'tanggal' => 'required|date',
                'waktu' => 'required|time',
                'suhu' => 'required',
                'lokasi' => 'required'


            ],
            [
                'tanggal.required' => 'input data kosong!',
                'waktu.required' => 'input data kosong!',
                'suhu.required' => 'input data kosong!',
                'lokasi.required' => 'input data kosong!',
                'tanggal.date' => 'input data salah!',
                'waktu.time' => 'input data salah!'


            ]
        );
        $user = Auth::id();
        $data = [
            'user_id' => $user,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'suhu' => $request->suhu,
            'lokasi' => $request->lokasi
        ];
        // dd($data);
        PerjalananModel::create($data);
        return redirect('/home')->with('sukses', 'Penyimpanan Berhasil!');
    }

    public function cariPerjalanan(Request $request)
    {
        if (!empty($request->input('lokasi')) && empty($request->input('tanggal')) && empty($request->input('waktu')) && empty($request->input('suhu'))) {
            $cari = $request->lokasi;
            $data = User::join('perjalanan_models', 'perjalanan_models.user_id', '=', 'users.id')
                ->where(function ($query) use ($cari) {
                    $query->where('users.nama', auth()->user()->nama)
                        ->where('perjalanan_models.lokasi', 'LIKE', '%' . $cari . '%');
                })->paginate(10, ['users.nama', 'perjalanan_models.*']);
            if ($data) {
                return view('pages.perjalanan', ['data' => $data])->with('alert', 'data di temukan');
            } else {
                abort(404);
            }
        } else if (empty($request->input('lokasi')) && !empty($request->input('tanggal')) && empty($request->input('waktu')) && empty($request->input('suhu'))) {
            $cari = $request->tanggal;
            $data = User::join('perjalanan_models', 'perjalanan_models.user_id', '=', 'users.id')
                ->where(function ($query) use ($cari) {
                    $query->where('users.nama', auth()->user()->nama)
                        ->where('perjalanan_models.tanggal', 'LIKE', '%' . $cari . '%');
                })->paginate(10, ['users.nama', 'perjalanan_models.*']);
            if ($data) {
                return view('pages.perjalanan', ['data' => $data])->with('alert', 'data di temukan');
            } else {
                abort(404);
            }
        } else if (empty($request->input('lokasi')) && empty($request->input('tanggal')) && !empty($request->input('waktu')) && empty($request->input('suhu'))) {
            $cari = $request->waktu;
            $data = User::join('perjalanan_models', 'perjalanan_models.user_id', '=', 'users.id')
                ->where(function ($query) use ($cari) {
                    $query->where('users.nama', auth()->user()->nama)
                        ->where('perjalanan_models.waktu', 'LIKE', '%' . $cari . '%');
                })->paginate(10, ['users.nama', 'perjalanan_models.*']);
            if ($data) {
                return view('pages.perjalanan', ['data' => $data])->with('alert', 'data di temukan');
            } else {
                abort(404);
            }
        } else if (empty($request->input('lokasi')) && empty($request->input('tanggal')) && empty($request->input('waktu')) && !empty($request->input('suhu'))) {
            $cari = $request->suhu;
            $data = User::join('perjalanan_models', 'perjalanan_models.user_id', '=', 'users.id')
                ->where(function ($query) use ($cari) {
                    $query->where('users.nama', auth()->user()->nama)
                        ->where('perjalanan_models.suhu', 'LIKE', '%' . $cari . '%');
                })->paginate(10, ['users.nama', 'perjalanan_models.*']);
            if ($data) {
                return view('pages.perjalanan', ['data' => $data])->with('alert', 'data di temukan');
            } else {
                abort(404);
            }
        }
        // else if (empty($request->input('lokasi')) && empty($request->input('tanggal')) && empty($request->input('waktu')) && empty($request->input('suhu')) && !empty($request->input('nama'))) {
        //     $cari = $request->suhu;
        //     $data = User::join('perjalanan_models', 'perjalanan_models.id_user', '=', 'users.id')
        //         ->where(function ($query) use ($cari) {
        //             $query->where('users.nama', auth()->user()->nama)
        //                 ->where('users.nama', 'LIKE', '%' . $cari . '%');
        //         })->get(['users.nama', 'perjalanan_models.*']);
        //     if ($data) {
        //         return view('pages.perjalanan', ['data' => $data])->with('alert', 'data di temukan');
        //     } else {
        //         abort(404);
        //     }
        // }
        else {
            $data = DB::table('perjalanan_models')
                ->join('users', 'users.id', '=', 'perjalanan_models.id_user')
                ->select('users.nik', 'perjalanan_models.tanggal', 'perjalanan_models.waktu', 'perjalanan_models.lokasi', 'perjalanan_models.suhu')
                ->where('users.nama', '=', auth()->user()->nama)
                ->paginate(10);
            return view('pages.perjalanan', ['data' => $data]);
        }
    }

    public function delete($id)
    {
        $perjalanan = PerjalananModel::find($id);
        $perjalanan->delete($perjalanan);
        return redirect()->back()->with('sukses', 'Data berhasil dihapus!');
    }
}
