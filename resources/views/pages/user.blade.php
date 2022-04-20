@extends('layouts.master')
@section('headline', 'User Data')
@section('title', 'User Pengguna')
@section('content')
<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Catatan Perjalanan</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>

            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($data as $user)
            <tr>
                <th scope="row">{{ ($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}</th>
                <td>{{ $user->catatan }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->nik }}</td>
            </tr>
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
    {!! $data->appends($_GET)->links() !!}
</div>
@endsection