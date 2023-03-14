@extends('layout.sidebar')
@section('title')
    <title>Area</title>
@endsection
@section('css-page')
    <style>
        .area, .institute {
            border: 1px solid #000000 !important;
            font-size: 2em !important;
        }

        .area:hover, .institute:hover {
            color: #ffffff !important;
            background-color: #005b40 !important;
        }
    </style>
@endsection
@section('page')
    <div class="p-3">
        <div class="row">
            <div class="col-8">
                @foreach ($data as $item)
                <button type="button" class="btn area me-2" value="{{$item['id']}}"><span class="mdi mdi-domain"></span> {{$item['area_name']}}</button>
                @endforeach
            </div>
            <div class="col-4 d-flex align-items-center justify-content-end">
                <div class="dropdown">
                    <button type="button" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false"><span
                            class="mdi mdi-plus"></span> Add</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" href="#"><span class="mdi mdi-home-account"></span>
                                Office</button></li>
                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><span
                                    class="mdi mdi-domain"></span>
                                Institute</button></li>
                        <li><button class="dropdown-item" href="#"><span class="mdi mdi-office-building"></span>
                                Section</button></li>
                        <li><button class="dropdown-item" href="#"><span class="mdi mdi-folder-table"></span>
                                Process</button></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <div class="institute-buttons row p-3">

    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Institute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('add-institute') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="institute" class="form-label">Institute</label>
                            <input type="text" class="form-control" name="institute_name" placeholder="Enter institute name" required>
                        </div>
                        <div class="mb-3">
                            <label for="institute" class="form-label">Institute Full name</label>
                            <input type="text" class="form-control" name="institute_description" placeholder="Enter full name" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @vite(['resources/js/jq.js'])
    <script>
        const data = {!! json_encode($data) !!};
        console.log(data);
        document.addEventListener('DOMContentLoaded', function() {
            var buttonContainer = $('.institute-buttons');
            $('.area').click(function (e) { 
                console.log($(this).val());
                const institute = data.find(s => s.id === parseInt($(this).val()));
                // console.log(institute);
                $('.institute-buttons').html('');
                if (institute.id != 1) {
                    $('.institute-buttons').html('<h3>Institutes</h3>');
                    for (const key in institute.institutes) {
                        var newButton = $('<button>', {
                            'class': 'btn institute w-100',
                            'text': institute.institutes[key].institute_name,
                            'value': institute.institutes[key].id,
                        });
                        var newCol = $('<div>', {
                            'class': 'col-4'
                        });
                        newCol.append(newButton);
                        buttonContainer.append(newCol);
                        console.log(institute.institutes[key]);
                    }
                }
            });
        });
    </script>
@endsection
