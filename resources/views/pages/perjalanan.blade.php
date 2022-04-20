@extends('layouts.master')
@section('headline', 'Perjalanan Data')
@section('title', 'Riwayat Perjalanan')
@section('content')

<div class="card-body">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-dark">ID</th>
                <th scope="col">
                    Tanggal
                    <a href="{{url('/sortBy')}}?sort=ASC&&order=perjalanan_models.tanggal">
                        <ion-icon href="{{asset('')}}assets/img/caret-up-outline.svg" name="caret-up-outline"></ion-icon>
                    </a>
                    <a href="{{url('/sortBy')}}?sort=DESC&&order=perjalanan_models.tanggal">
                        <ion-icon href="{{asset('')}}assets/img/caret-down-outline.svg" name="caret-down-outline"></ion-icon>
                    </a>
                </th>
                <th scope="col">
                    Waktu
                    <a href="{{url('/sortBy')}}?sort=ASC&&order=perjalanan_models.waktu">
                        <ion-icon href="{{asset('')}}assets/img/caret-up-outline.svg" name="caret-up-outline"></ion-icon>
                    </a>
                    <a href="{{url('/sortBy')}}?sort=DESC&&order=perjalanan_models.waktu">
                        <ion-icon href="{{asset('')}}assets/img/caret-down-outline.svg" name="caret-down-outline"></ion-icon>
                    </a>
                </th>
                <th scope="col">
                    Lokasi yang dikunjungi
                    <a href="{{url('/sortBy')}}?sort=DESC&&order=perjalanan_models.lokasi">
                        <ion-icon href="{{asset('')}}assets/img/caret-up-outline.svg" name="caret-up-outline"></ion-icon>
                    </a>
                    <a href="{{url('/sortBy')}}?sort=ASC&&order=perjalanan_models.lokasi">
                        <ion-icon href="{{asset('')}}assets/img/caret-down-outline.svg" name="caret-down-outline"></ion-icon>
                    </a>
                </th>
                <th scope="col">
                    Suhu tubuh
                    <a href="{{url('/sortBy')}}?sort=ASC&&order=perjalanan_models.suhu">
                        <ion-icon href="{{asset('')}}assets/img/caret-up-outline.svg" name="caret-up-outline"></ion-icon>
                    </a>
                    <a href="{{url('/sortBy')}}?sort=DESC&&order=perjalanan_models.suhu">
                        <ion-icon href="{{asset('')}}assets/img/caret-down-outline.svg" name="caret-down-outline"></ion-icon>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($data as $perjalanan)
            <tr>
                <th scope="row">{{ ($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}</th>
                <td>{{ $perjalanan->tanggal }}</td>
                <td>{{ $perjalanan->waktu }}</td>
                <td>{{ $perjalanan->lokasi }}</td>
                <td>{{ $perjalanan->suhu }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {!! $data->appends($_GET)->links() !!}
    <div class="card-footer text-right">
        <a href="/form"><button class="btn btn-primary">Add Perjalanan</button></a>

    </div>

</div>
@endsection