@extends('layout.app')
@section('css')
    <style>
        .sidebar {
            background-color: #005b40;
            min-width: 15px;
            max-width: 20rem;
            color: #ffffff;
        }

        .sidebar-img {
            width: 70px;
        }

        .sidebar-h {
            max-height: 100vh;
        }

        .side-link {
            font-size: 2rem !important;
            text-decoration: none !important;
            color: #ffffff !important;
            border: none !important;
            background-color: #005b40 !important;
            outline: none !important;
            border-radius: 0 !important;
        }

        .side-link:hover {
            color: #005b40 !important;
            background-color: #eef1f4 !important;
            border: none !important;
            outline: none !important;
        }

        .side-link:focus {
            outline: none !important;
            border: none !important;
        }

        .accordion-item {
            outline: none !important;
            border: none !important;
        }

        .accordion-button:focus {
            box-shadow: none !important;
        }

        .accordion {
            border: none !important;
            background: none !important;
            color: none !important;
        }

        .side-link:active {
            outline: none !important;
            border: none !important;
        }

        .activated {
            color: #005b40 !important;
            background-color: #eef1f4 !important;
            border: none !important;
        }

        .avatar {
            width: 30px;
        }

        hr {
            color: #37a87f;
        }

        .ac {
            background-color: #37a87f !important;
        }

        .font{
            font-size: 30px;
        }

        .remove-design:focus{
            outline: none !important;
            border: none !important;
        }
    </style>
@endsection
@section('content')
    <div class="d-flex h-100 sidebar-h">
        <div class="sidebar">
            @if (auth()->user()->role->role_name == 'Administrator')
                @include('layout.admin')
            @endif
        </div>
        <div class="overflow-auto w-100">
            <nav class="navbar navbar-expand-lg border-bottom border-dark ac" style="max-width:100%">
                <div class="container-fluid">
                    <span class="navbar-brand text-white">Office of the Director for Quality Assurance
                        ({{ auth()->user()->role->role_name }})</span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown dropstart">
                                <button class="nav-link btn mt-2 remove-design me-1" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    @if (auth()->user()->img)
                                        <img src="{{ asset('/storage/profiles/' . auth()->user()->img) }}"
                                            class="rounded-circle avatar" alt="your image">
                                    @else
                                        <span class="mdi mdi-account rounded-circle avatar"></span>
                                    @endif
                                </button>
                                {{-- <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul> --}}
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('logout') }}" class="nav-link"><span class="mdi mdi-power font text-white"></span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('page')
        </div>
    </div>
    @vite(['resources/js/sidebar.js'])
@endsection
