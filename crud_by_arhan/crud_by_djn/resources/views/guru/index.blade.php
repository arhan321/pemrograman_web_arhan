@extends('main')

@section('content')

<div class="table-container">
    <a href="{{ route('guru.create') }}" class="btn btn-md btn-custom btn-success mb-3">ADD PRODUCT</a>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
           
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">birth dath</th>
                <th scope="col">Foto Guru</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $g)
            <tr>
                <th scope="row">{{ $g->id }}</th>
                <td>{{ $g->first_name }}</td>
                <td>{{ $g->middle_name }}</td>
                <td>{{ $g->last_name }}</td>
                <td>{{ $g->birth_dath }}</td>
                <td><img src="path_to_image" alt="Foto Guru" class="img-thumbnail" width="50"></td>
                <td><a href="" class="btn btn-primary">show</a>
                    <a href="" class="btn btn-success">edit</a>
                    <a href="" class="btn btn-danger">DELETE</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
