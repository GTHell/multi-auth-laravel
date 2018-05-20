@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as ADMIN!
                        <form action="{{ Route('admin.logout.submit') }}" method="POST">
                            @csrf
                            <button>Logout</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
