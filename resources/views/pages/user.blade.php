@extends('layouts.master')
@section('headline', 'User Data')
@section('title', 'User')
@section('content')
<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Catatan Perjalanan</th>
                <th scope="col">Nama</th>
                <th scope="col">NIK</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($data as $user)
            <tr>
                <th scope="row">{{ $no }}</th>
                <td>{{ $user->catatan }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->nik }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection