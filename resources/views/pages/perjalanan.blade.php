@extends('layouts.master')
@section('headline', 'Perjalanan Data')
@section('title', 'Riwayat Perjalanan')
@section('content')
<div class="card-header border-0">
    <h3 class="mb-0">Perjalanan Table</h3>
</div>
@if (Session::has('sukses'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
    <span class="alert-text"><strong>Success!</strong>{{ Session::get('sukses') }}</span>
    <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="table-responsive">

    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col" class="text-center">ID</th>
                <th scope="col" class="text-center" data-sort="tanggal">
                    Tanggal
                    <a class="ni ni-bold-up" href="{{url('/sortBy')}}?sort=ASC&&order=perjalanan_models.tanggal"></a>
                    <a class="ni ni-bold-down" href="{{url('/sortBy')}}?sort=DESC&&order=perjalanan_models.tanggal"></a>
                </th>
                <th scope="col" class="text-center" data-sort="waktu">
                    Waktu
                    <a class="ni ni-bold-up" href="{{url('/sortBy')}}?sort=ASC&&order=perjalanan_models.waktu"></a>
                    <a class="ni ni-bold-down" href="{{url('/sortBy')}}?sort=DESC&&order=perjalanan_models.waktu"></a>
                </th>
                <th scope="col" class="text-center" data-sort="lokasi">
                    Lokasi yang dikunjungi
                    <a class="ni ni-bold-up" href="{{url('/sortBy')}}?sort=ASC&&order=perjalanan_models.lokasi"></a>
                    <a class="ni ni-bold-down" href="{{url('/sortBy')}}?sort=DESC&&order=perjalanan_models.lokasi"></a>
                </th>
                <th scope="col" class="text-center" data-sort="suhu">
                    Suhu tubuh
                    <a class="ni ni-bold-up" href="{{url('/sortBy')}}?sort=ASC&&order=perjalanan_models.suhu"></a>
                    <a class="ni ni-bold-down" href="{{url('/sortBy')}}?sort=DESC&&order=perjalanan_models.suhu"></a>
                </th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody class="list">
            <?php $no = 1; ?>
            @foreach ($data as $perjalanan)
            <tr>
                <th scope="row" class="text-center">
                    {{ ($data->currentPage() - 1)  * $data->links()->paginator->perPage() + $loop->iteration }}
                </th>
                <td class="text-center">{{ $perjalanan->tanggal }}</td>
                <td class="text-center">{{ $perjalanan->waktu }}</td>
                <td class="text-center">{{ $perjalanan->lokasi }}</td>
                <td class="text-center">{{ $perjalanan->suhu }}</td>
                <td class="text-center">
                    <a href="/home/{{$perjalanan->id}}/delete" class="ni ni-fat-remove btn btn-danger btn-sm" onclick="return confirm('Anda yakin mau menghapus data ?')"></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
{!! $data->appends($_GET)->links() !!}
<div class="card-footer text-right">
    <a href="/form"><button class="btn btn-primary">Add Perjalanan</button></a>
</div>
@endsection