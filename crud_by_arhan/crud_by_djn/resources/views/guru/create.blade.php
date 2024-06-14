@extends('main')

@section('content')

<div class="form-container mx-auto p-4 bg-light rounded shadow-sm" style="max-width: 600px; margin-top: 50px;">
    <h2 class="mb-4 text-center">Tambah Data guru</h2>
    <form id="guruForm" action="" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label" style="font-weight: bold; color: #555;">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" style="border-radius: 5px;">
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label" style="font-weight: bold; color: #555;">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" style="border-radius: 5px;">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label" style="font-weight: bold; color: #555;">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" style="border-radius: 5px;">
        </div>
        <div class="mb-3">
            <label for="birth_dath" class="form-label" style="font-weight: bold; color: #555;">birth dath</label>
            <input type="date" class="form-control" id="birth_dath" name="birth_dath" style="border-radius: 5px;">
        </div>
        <div class="mb-3">
            <label for="photo" class="form-label" style="font-weight: bold; color: #555;">Foto Guru</label>
            <input class="form-control" type="file" id="photo" name="photo" style="border-radius: 5px;">
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff; border-radius: 5px; padding: 10px 20px; font-size: 16px; transition: background-color 0.3s;">Submit</button>
    </form>
</div>

@endsection
