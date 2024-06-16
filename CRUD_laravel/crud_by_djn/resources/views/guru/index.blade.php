@extends('main')

@section('content')

<div class="table-container">
    <div class="button-container d-flex justify-content-between mb-3" style="width: 80%;">
        <!-- Informasi Pengguna -->
     
        <!-- Logout Button -->
        <a href="#" class="btn btn-md btn-custom btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <div class="user-info d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle mr-2" viewBox="0 0 16 16">
                <path d="M13.468 12.37C12.758 11.226 11.5 10.5 10 10.5h-4c-1.5 0-2.758.726-3.468 1.87A6.97 6.97 0 0 1 2 8a6.97 6.97 0 0 1 .532-2.37C3.242 5.726 4.5 5 6 5h4c1.5 0 2.758.726 3.468 1.87A6.97 6.97 0 0 1 14 8c0 1.165-.258 2.27-.532 3.37z"/>
                <path fill-rule="evenodd" d="M8 16a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-1.5a6.5 6.5 0 1 1 0-13 6.5 6.5 0 0 1 0 13zm0-8.5a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
            </svg>
            <span class="ml-2">Logged in as: <strong>{{ Auth::user()->name }}</strong></span>
        </div>
        <a href="{{ route('guru.create') }}" class="btn btn-md btn-custom btn-success">Tambah data guru</a>

        <!-- Form Pencarian -->
        <form id="searchForm" action="{{ route('guru.index') }}" method="GET" class="form-inline">
            <div class="input-group">
                <input type="text" id="searchInput" name="search" class="form-control" placeholder="Cari nama guru" value="{{ request('search') }}">
            </div>
        </form>
    </div>

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


@endsection
@section('scripts')
@parent
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

