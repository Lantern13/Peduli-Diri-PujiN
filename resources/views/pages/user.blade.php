@extends('layouts.master')
@section('headline', 'User Data')
@section('title', 'User Pengguna')
@section('content')

<div class="card-header border-0">
    <h3 class="mb-0">User Table</h3>
</div>
<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col-sm" class="text-center">No
                </th>
                <th scope="col-sm" class="text-center">
                    Catatan Perjalanan
                    <a class="ni ni-bold-up" href="{{url('/sortByUser')}}?sort=ASC&&order=catatan"></a>
                    <a class="ni ni-bold-down" href="{{url('/sortByUser')}}?sort=DESC&&order=catatan"></a>
                </th>
                <th scope="col-sm" class="text-center">
                    Nama
                    <a class="ni ni-bold-up" href="{{url('/sortByUser')}}?sort=ASC&&order=users.nama"></a>
                    <a class="ni ni-bold-down" href="{{url('/sortByUser')}}?sort=DESC&&order=users.nama"></a>
                </th>
                <th scope="col-sm" class="text-center">
                    NIK
                    <a class="ni ni-bold-up" href="{{url('/sortByUser')}}?sort=ASC&&order=users.nik"></a>
                    <a class="ni ni-bold-down" href="{{url('/sortByUser')}}?sort=DESC&&order=users.nik"></a>
                </th>
            </tr>
        </thead>
        <tbody class="list">
            @foreach ($data as $user)
            <tr>
                <td class="text-center">
                    {{ ($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}
                </td>
                <td class="text-center">
                    {{ $user->catatan }}
                </td>
                <td class="text-center">
                    {{ $user->nama }}
                </td>
                <td class="text-center">
                    {{ $user->nik }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{!! $data->appends($_GET)->links() !!}
</div>
@endsection