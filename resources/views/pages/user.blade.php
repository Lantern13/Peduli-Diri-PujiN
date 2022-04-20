@extends('layouts.master')
@section('headline', 'User Data')
@section('title', 'User Pengguna')
@section('content')
<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Catatan Perjalanan</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                    <th class="text-secondary opacity-7"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $user)
                <tr>
                    <td class="align-left">
                        {{ ($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}
                    </td>
                    <td class="align-left">
                        {{ $user->catatan }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $user->nama }}
                    </td>
                    <td class="align-middle text-center">
                        {{ $user->nik }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $data->appends($_GET)->links() !!}
    </div>
</div>
@endsection