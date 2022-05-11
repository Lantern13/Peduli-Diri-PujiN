@extends('layouts.master')
@section('headline','Add Perjalanan')
@section('title','Register Form')
@section('content')
<form action="/simpanPerjalanan" method="POST" class="">
    {{ csrf_field() }}
    <div class="card-body">
        <div class="form-row">
            <!-- {{-- <div class="form-group col-md-2">
                <label for="inputZip">ID User</label>
                <input type="text" class="form-control" id="inputZip"  placeholder="user_id" name="user_id">
            </div> --}} -->
            <div class="form-group col-md-4">
                <label for="inputCity" class="form-control-label">Tanggal</label>
                <input type="date" class="form-control" id="inputCity" name="tanggal">
                @if ($errors->has('tanggal'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>Warning!</strong> {{ $errors->first('tanggal') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="form-group col-md-4">
                <label for="inputState" class="form-control-label">Jam</label>
                <input type="time" class="form-control" id="inputCity" name="waktu">
                @if ($errors->has('waktu'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>Warning!</strong> {{ $errors->first('waktu') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="inputAddress" class="form-control-label">Lokasi yang dikunjungi</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="Lokasi" name="lokasi">
            @if ($errors->has('lokasi'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>Warning!</strong> {{ $errors->first('lokasi') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label for="inputZip" class="form-control-label">Suhu</label>
            <input type="number" class="form-control" id="inputZip" placeholder="Suhu" name="suhu">
            @if ($errors->has('suhu'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <span class="alert-text"><strong>Warning!</strong> {{ $errors->first('suhu') }}</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary">Submit</button>
    </div>
    </div>
</form>

@endsection