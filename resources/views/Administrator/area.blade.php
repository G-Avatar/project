@extends('layout.sidebar')
@section('title')
    <title>Area</title>
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
    </style>
@endsection
@section('page')
    {{-- Adding Modal --}}
    <div class="pt-3 ps-3 pe-3">
        <div class="row">
            <div class="col-8">
                @foreach ($data as $item)
                <button type="button" class="btn btn-design area me-2" value="{{$item['id']}}"><span class="mdi mdi-domain"></span> {{$item['area_name']}}</button>
                @endforeach
            </div>
            <div class="col-4 d-flex align-items-center justify-content-end">
                <div class="dropdown">
                    <button type="button" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false"><span
                            class="mdi mdi-plus"></span> Add</button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#office"><span class="mdi mdi-home-account"></span>
                                Office</button></li>
                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><span
                                    class="mdi mdi-domain"></span>
                                Institute</button></li>
                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#program"><span class="mdi mdi-office-building"></span>
                                Program</button></li>
                        <li><button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#process"><span class="mdi mdi-folder-table"></span>
                                Process</button></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
    </div>

    {{-- Transaction Messages --}}
    <div class="container d-none">
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

    <div class="office-buttons d-none row pt-3 ps-3 pe-3">

    </div>

    <div class="institute-buttons row pt-3 ps-3 pe-3">

    </div>

    <div class="program-buttons row pt-3 ps-3 pe-3">

    </div>

    <div class="process-buttons row pt-3 ps-3 pe-3">

    </div>

    <!-- Modal -->
    {{-- Institute --}}
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
    {{-- Program --}}
    <div class="modal fade" id="program" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Program</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('add-program') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="institute" class="form-label">Institute</label>
                            <select name="institute_id" class="form-control" required>
                                <option value="" disabled selected>Select an Institute</option>
                                @foreach ($data[1]['institutes'] as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['institute_name'] }} - {{ $item['institute_description'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="institute" class="form-label">Program</label>
                            <input type="text" class="form-control" name="program_name" placeholder="Enter program name" required>
                        </div>
                        <div class="mb-3">
                            <label for="institute" class="form-label">Program Full name</label>
                            <input type="text" class="form-control" name="program_description" placeholder="Enter full name" required>
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
    {{-- Process --}}
    <div class="modal fade" id="process" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Process</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('add-process') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="institute" class="form-label">Institute</label>
                            <select name="institute_id" id="institute_id" class="form-control" required>
                                <option value="" disabled selected>Select an Institute</option>
                                @foreach ($data[1]['institutes'] as $item)
                                    <option value="{{ $item['id'] }}">{{ $item['institute_name'] }} - {{ $item['institute_description'] }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Program" class="form-label">Program</label>
                            <select name="program_id" id="program_id" class="form-control">
                                <option value="" disabled selected>Select a Program</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="institute" class="form-label">Process</label>
                            <input type="text" class="form-control" name="process_name" placeholder="Enter process name" required>
                        </div>
                        <div class="mb-3">
                            <label for="institute" class="form-label">Process Full name</label>
                            <input type="text" class="form-control" name="process_description" placeholder="Enter full name" required>
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
    <div class="modal fade" id="office" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Office</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('add-office') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="Office" class="form-label">Office</label>
                            <input type="text" class="form-control" name="office_name" placeholder="Enter office name" required>
                        </div>
                        <div class="mb-3">
                            <label for="institute" class="form-label">Office Full name</label>
                            <input type="text" class="form-control" name="office_description" placeholder="Enter full name" required>
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

    <script>
        const data = {!! json_encode($data) !!};
        var p;
        console.log(data);
        document.addEventListener('DOMContentLoaded', function() {
            $(document).on('click','.area', function (event) {
                event.preventDefault();
                $('.program-buttons').empty();
                $('.process-buttons').empty();
                $('.area').removeClass('active');
                $(this).addClass('active');
                let buttonContainer = $('.institute-buttons');
                const institute = data.find(s => s.id === parseInt($(this).val()));
                $('.institute-buttons').html('');
                if (institute.id != 1) {
                    $('.institute-buttons').html('<h3>Institutes</h3>');
                    for (const key in institute.institutes) {
                        var newButton = $('<button>', {
                            'class': 'btn btn-design institute w-100 editable',
                            'text': institute.institutes[key].institute_name,
                            'value': institute.institutes[key].id
                        });
                        var ul = $('<ul>', {
                            'class': 'dropdown-menu'
                        });
                        var li = $('<li>');
                        var menu = $('<button>', {
                            'class': 'dropdown-item',
                            'text':'Edit',
                            'type':'button'
                        });                        
                        var newCol = $('<div>', {
                            'class': 'col-4'
                        });
                        li.append(menu);
                        ul.append(li);
                        newCol.append(newButton);
                        newCol.append(ul);
                        buttonContainer.append(newCol);
                    }
                }
                else{
                    $('.program-buttons').html('');
                    $('.institute-buttons').html('');
                    $('.institute-buttons').html('<h3>Offices</h3>');
                    for (const key in institute.offices) {
                        var newButton = $('<button>', {
                            'class': 'btn btn-design office w-100 editable',
                            'text': institute.offices[key].office_name,
                            'value': institute.offices[key].id,
                        });
                        var ul = $('<ul>', {
                            'class': 'dropdown-menu'
                        });
                        var li = $('<li>');
                        var menu = $('<button>', {
                            'class': 'dropdown-item',
                            'text':'Edit',
                            'type':'button'
                        });                        
                        var newCol = $('<div>', {
                            'class': 'col-4'
                        });
                        li.append(menu);
                        ul.append(li);
                        newCol.append(newButton);
                        newCol.append(ul);
                        buttonContainer.append(newCol);
                    }
                }
            });
            $(document).on('click','.institute', function () {
                $('.process-buttons').empty();
                $('.institute').removeClass('active');
                $(this).addClass('active');
                let buttonContainer = $('.program-buttons');
                const institute = data[1];
                const program = institute.institutes.find(s => s.id === parseInt($(this).val()));
                p = parseInt($(this).val());
                $('.program-buttons').html('<h3>Programs</h3>');
                for (const key in program.programs) {
                    var newButton = $('<button>', {
                        'class': 'btn btn-design program w-100 editable',
                        'text': program.programs[key].program_name,
                        'value': program.programs[key].id,
                    });
                    
                    var ul = $('<ul>', {
                        'class': 'dropdown-menu'
                    });
                    var li = $('<li>');
                    var menu = $('<button>', {
                        'class': 'dropdown-item',
                        'text':'Edit',
                        'type':'button'
                    });                        
                    var newCol = $('<div>', {
                        'class': 'col-4'
                    });
                    li.append(menu);
                    ul.append(li);
                    newCol.append(newButton);
                    newCol.append(ul);
                    buttonContainer.append(newCol);
                }
            });
            $(document).on('click','.program', function () {
                $('.program').removeClass('active');
                $('.process-buttons').empty();
                $(this).addClass('active');
                let buttonContainer = $('.process-buttons');
                const institute = data[1];
                var program = institute.institutes.find(s => s.id === p);
                program = program.programs.find(s => s.id === parseInt($(this).val()));
                $('.process-buttons').html('<h3>Process</h3>');
                console.log(program);
                for (const key in program.processes) {
                    var newButton = $('<button>', {
                        'class': 'btn btn-design process w-100 editable',
                        'text': program.processes[key].process_name,
                        'value': program.processes[key].id,
                    });
                    var ul = $('<ul>', {
                        'class': 'dropdown-menu'
                    });
                    var li = $('<li>');
                    var menu = $('<button>', {
                        'class': 'dropdown-item',
                        'text':'Edit',
                        'type':'button'
                    });                        
                    var newCol = $('<div>', {
                        'class': 'col-4'
                    });
                    li.append(menu);
                    ul.append(li);
                    newCol.append(newButton);
                    newCol.append(ul);
                    buttonContainer.append(newCol);
                }
            });
            $(document).on('change','#institute_id', function () {
                $('#program_id').empty();
                const institute = data[1];
                const i = institute.institutes.find(s => s.id === parseInt($(this).val()));
                const program = i.programs;
                console.log(program);
                var newOption = $('<option>',{
                    'text':'Select a Program',
                    'value':'',
                    'disabled':'true',
                    'selected':'true'
                });
                $('#program_id').append(newOption);
                for (const key in program) {
                    var newOption = $('<option>',{
                        'text':program[key].program_name+' - '+program[key].program_description,
                        'value':program[key].id
                    });
                    $('#program_id').append(newOption);
                }
            });

            $(document).on('click', function () {
                $('.dropdown-menu').removeClass('show');
            });


            $(document).on('contextmenu','.editable', function (event) {
                event.preventDefault();
                $('.dropdown-menu').removeClass('show');
                $(this).next().addClass('show');
            });
        });
    </script>
@endsection
