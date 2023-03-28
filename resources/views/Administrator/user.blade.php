@extends('layout.sidebar')
@section('title')
    <title>All Roles</title>
@endsection
@section('css-page')
    <style>
        .btn-design {
            border: 1px solid #000000 !important;
            font-size: 1em !important;
        }

        .btn-design:hover{
            color: #ffffff !important;
            background-color: #005b40 !important;
        }

        .row .col-4 .active{
            color: #ffffff !important;
            background-color: #005b40 !important;
        }

        .row .col-8 .active{
            color: #ffffff !important;
            background-color: #005b40 !important;
        }

        .maxed{
            min-height: 16rem;
            max-height: 16rem;
        }
    </style>
@endsection
@section('page')
    <div class="container">
    <h1><a href="{{ route('admin-role-page') }}" class="btn btn-outline-success rounded-circle"><span class="mdi mdi-arrow-left"></span></a> {{ $data->role_name }}</h1>
    <div class="row g-3">
            @foreach ($data['users'] as $user)
                <div class="col-4">
                    <div class="card">
                        <img src="{{ Storage::url($user->img) }}" class="card-img-top maxed" alt="User Image">
                        <div class="card-body">
                            <h4 class="text-center">
                                {{ Str::limit($user->firstname . ' ' . ($user->middlename ? strtoupper(substr($user->middlename, 0, 1)) . '. ' : '') . $user->surname . ' ' . ($user->suffix ? $user->suffix : ''), 26, '...') }}
                            </h4>
                            <hr>
                            <div class="text-center">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Disable</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
