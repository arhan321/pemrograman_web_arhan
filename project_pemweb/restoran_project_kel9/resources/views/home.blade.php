@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                
                    <div class="user-info">
                        <p>You are logged in as:</p>
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-roles">
                            Roles:
                            @foreach (Auth::user()->roles as $role)
                                <span class="role">{{ $role->title }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-lg-6 mb-4">
        <div class="card p-4 shadow-sm">
            <div class="card-body">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
    <div class="col-lg-6 mb-4">
        <div class="card p-4 shadow-sm">
            <div class="card-body">
                {!! $chartArea->container() !!}
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card p-4 shadow-sm">
            <div class="card-body">
                {!! $penghasilanbulanini->container() !!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}

<script src="{{ $chartArea->cdn() }}"></script>
{{ $chartArea->script() }}

<script src="{{ $penghasilanbulanini->cdn() }}"></script>
{{ $penghasilanbulanini->script() }}
@parent
@endsection
