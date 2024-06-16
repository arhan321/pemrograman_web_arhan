@extends('main')

@section('content')

<div class="form-container mx-auto p-4 bg-light rounded shadow-sm" style="max-width: 600px; margin-top: 50px;">
    <h2 class="mb-4 text-center">Tambah Data guru</h2>
    <form id="formData" action="{{ route('guru.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="first_name" class="form-label" style="font-weight: bold; color: #555;">First Name</label>
            <input type="text" class="form-control" id="first_name" name="first_name" style="border-radius: 5px;" required>
        </div>
        <div class="mb-3">
            <label for="middle_name" class="form-label" style="font-weight: bold; color: #555;">Middle Name</label>
            <input type="text" class="form-control" id="middle_name" name="middle_name" style="border-radius: 5px;">
        </div>
        <div class="mb-3">
            <label for="last_name" class="form-label" style="font-weight: bold; color: #555;">Last Name</label>
            <input type="text" class="form-control" id="last_name" name="last_name" style="border-radius: 5px;" required>
        </div>
        <div class="mb-3">
            <label for="birth_dath" class="form-label" style="font-weight: bold; color: #555;">Birth Date</label>
            <input type="date" class="form-control" id="birth_dath" name="birth_dath" style="border-radius: 5px;" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label" style="font-weight: bold; color: #555;">Foto Guru</label>
            <input class="form-control" type="file" id="foto" name="foto" style="border-radius: 5px;" required>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #007bff; border-color: #007bff; border-radius: 5px; padding: 10px 20px; font-size: 16px; transition: background-color 0.3s;">Submit</button>
       <a href="{{ route('guru.index') }}"  class="btn btn-primary" style="background-color: #000000; border-color: #fffb00; border-radius: 5px; padding: 10px 20px; font-size: 16px; transition: background-color 0.3s;">back</a>
    </form>
</div>

@endsection
@section('scripts')
@parent
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('formData');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Kirim form data menggunakan AJAX
            const formData = new FormData(form);
            fetch(form.getAttribute('action'), {
                method: 'POST',
                body: formData,
                // Tambahkan ini untuk memastikan respons yang diterima adalah JSON
                headers: {
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Tampilkan sweet alert jika data berhasil disimpan
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    form.reset();
                } else {
                    // Tampilkan sweet alert jika terjadi error
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        });
    });
</script>
@endsection