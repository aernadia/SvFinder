@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-light">Admin Dashboard</div>

                <nav class="nav">
                    <a class="nav-link1" button type="button" href="{{ url('/admin/blogs') }}">Lecturer</a></button>
                    <a class="nav-link2" button type="button" href="{{ url('/admin/studs') }}">Student</a></button>
                </nav>
                {{-- <nav class="nav">
                    <a class="nav-link2" button type="button" href="{{ url('/admin/studs') }}">Student</a></button>
                </nav> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

