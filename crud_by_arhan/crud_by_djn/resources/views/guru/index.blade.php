@extends('main')

@section('content')

<div class="table-container">
    <a href="{{ route('guru.create') }}" class="btn btn-md btn-custom btn-success mb-3">Tambah data guru</a>

    <!-- Form Pencarian -->
    <form id="searchForm" action="{{ route('guru.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" id="searchInput" name="search" class="form-control" placeholder="Cari nama guru" value="{{ request('search') }}">
        </div>
    </form>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Foto Guru</th>
                <th scope="col">AKSI</th>
            </tr>
        </thead>
        <tbody id="guruTableBody">
            @include('guru.table', ['gurus' => $gurus])
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $gurus->links() !!}
    </div>
</div>

<script>
document.getElementById('searchInput').addEventListener('input', function() {
    let searchQuery = this.value;

    fetch(`{{ route('guru.index') }}?search=${searchQuery}`, {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('guruTableBody').innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});

document.addEventListener('click', function(event) {
    if (event.target.tagName === 'A' && event.target.closest('.pagination')) {
        event.preventDefault();

        fetch(event.target.href, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.text())
        .then(data => {
            document.getElementById('guruTableBody').innerHTML = data;
        })
        .catch(error => console.error('Error:', error));
    }
});
</script>

@endsection
