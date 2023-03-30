@extends('layout.sidebar')
@section('title')
    <title>Evidence</title>
@endsection
@section('page')
    <div class="container">
        <h1>Evidences</h1>
        <div class="text-end">
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add">
                <span class="mdi mdi-plus"></span> Add
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Add Evidence</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-2">
                            <span>Folder Name</span>
                            <input type="text" class="form-control" placeholder="Folder" name="folder" required>
                        </div>
                        <div class="mb-2">
                            <span>Area Access</span>
                            <input type="text" class="form-control" placeholder="Area" name="area" id="area" required>
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
@endsection
