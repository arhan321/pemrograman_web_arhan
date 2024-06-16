@extends('main')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col text-center">
            <h1 class="display-4">Edit Data Guru</h1>
            <p class="lead">Silakan perbarui data guru di bawah ini.</p>
            <a href="{{ route('guru.index') }}" class="btn btn-primary btn-lg">Kembali ke Daftar Guru</a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-8 offset-md-2">
            <div class="card h-100">
                <div class="card-body">
                    <form action="{{ route('guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="first_name" class="form-label" style="font-weight: bold; color: #555;">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $guru->first_name }}" style="border-radius: 5px;" required>
                        </div>
                        <div class="mb-3">
                            <label for="middle_name" class="form-label" style="font-weight: bold; color: #555;">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" value="{{ $guru->middle_name }}" style="border-radius: 5px;">
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label" style="font-weight: bold; color: #555;">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $guru->last_name }}" style="border-radius: 5px;" required>
                        </div>
                        <div class="mb-3">
                            <label for="birth_dath" class="form-label" style="font-weight: bold; color: #555;">Birth Date</label>
                            <input type="date" class="form-control" id="birth_dath" name="birth_dath" value="{{ $guru->birth_dath }}" style="border-radius: 5px;" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label" style="font-weight: bold; color: #555;">Foto Guru</label>
                            <input class="form-control" type="file" id="foto" name="foto" style="border-radius: 5px;">
                            <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff; border-radius: 5px; padding: 10px 20px; font-size: 16px; transition: background-color 0.3s;">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
