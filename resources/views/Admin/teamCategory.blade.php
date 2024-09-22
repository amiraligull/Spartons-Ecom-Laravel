@extends('layouts.master')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="main">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Team Categories</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addTeamCategoryModal">
                    Add Team Category
                </button>
            </div>
            <!-- / add .modal -->

            <!-- ... (your existing code) ... -->

            <div class="modal fade" id="addTeamCategoryModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Team Category</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" method="post">

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="addTeamCategoryName">Category Name</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Enter category name">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Team Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                ClassicEditor
                    .create(document.querySelector('#addTeamCategoryName'))
                    .catch(error => {
                        console.error(error);
                    });
            </script>
        </div>
        <!-- / add .modal -->

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif

        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>name</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success">Options</button>
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#editTeamCategoryModal">
                                        Edit
                                    </button>
                                    <form action="" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <div class="modal fade" id="editTeamCategoryModal">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Team Category</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- ... (your existing modal code) ... -->
                                        <form action="" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="editTeamCategoryName">Category
                                                        Name</label>
                                                    <input type="text" class="form-control" name="name" value="name">
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- Content Header (Page header) -->
@endsection