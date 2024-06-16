@extends('main')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h1 class="display-4">Detail Guru</h1>
            <p class="lead">Berikut adalah detail guru yang terdaftar dalam sistem kami.</p>
            <a href="{{ route('guru.index') }}" class="btn btn-primary btn-lg">Kembali ke Daftar Guru</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card h-100">
                <div class="card-body">
                  
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $gurus->id }}</td>
                        </tr>
                        <tr>
                            <th>First Name</th>
                            <td>{{ $gurus->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Middle Name</th>
                            <td>{{ $gurus->middle_name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $gurus->last_name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Lahir</th>
                            <td>{{ $gurus->birth_dath }}</td>
                        </tr>
                        <tr>
                            <th>foto</th>
                        <td class="text-center">
                            <a href="{{ asset('/storage/guru/'.$gurus->foto) }}" target="_blank">
                                <img src="{{ asset('/storage/guru/'.$gurus->foto) }}" class="rounded" style="width: 150px">
                            </a>
                        </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
