@extends('layouts.master')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="main">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage Teams</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addTeamModal">
                    Add Team
                </button>
            </div>
            <!-- / add .modal -->

            <!-- ... (your existing code) ... -->

            <div class="modal fade" id="addTeamModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Team</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('add-team') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="addTeamName">Team Name</label>
                                    <input type="text" class="form-control" id="addTeamName" name="name"
                                        placeholder="Enter team name">
                                </div>
                                <div class="form-group">
                                    <label for="addTeamCategory">Team Category</label>
                                    <select class="form-control" id="addTeamCategory" name="teamcategoryid">
                                        @foreach($teamCategories as $teamCategory)
                                        <option value="{{ $teamCategory->id }}">{{ $teamCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="addTeamImage">Image</label>
                                    <input type="file" class="form-control-file" id="addTeamImage" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="addTeamDescription">Description</label>
                                    <textarea class="form-control" id="addTeamDescription"
                                        name="description"></textarea>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Team</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                    ClassicEditor
                        .create(document.querySelector('#addTeamDescription'))
                        .catch(error => {
                            console.error(error);
                        });
                </script>
            </div>
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
                        <th>Team Name</th>
                        <th>Team Category</th>
                        <th>Image</th>
                        {{-- <th>Description</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->teamCategory->name }}</td>
                        <td>
                            <img src="{{url('public/uploads')}}/{{ $team->image }}" width="100" alt="ss">
                        </td>
                        {{-- <td>{{ $team->description }}</td> --}}
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-success">Options</button>
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <button type="button" class="btn btn-warning"
                                        data-toggle="modal"
                                        data-target="#editTeamModal{{ $team->id }}">
                                        Edit
                                    </button>
                                    <form action="{{ route('delete-team', $team->id) }}" method="post"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                        <div class="modal fade" id="editTeamModal{{ $team->id }}">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Team</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- ... (your existing modal code) ... -->
                                        <form action="{{ route('update-team', $team->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="editTeamName{{ $team->id }}">Team Name</label>
                                                    <input type="text" class="form-control"
                                                        id="editTeamName{{ $team->id }}"
                                                        name="name"
                                                        value="{{ $team->name }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="editTeamCategory{{ $team->id }}">Team Category</label>
                                                    <select class="form-control" id="editTeamCategory{{ $team->id }}"
                                                        name="teamcategoryid">
                                                        @foreach($teamCategories as $teamCategory)
                                                        <option value="{{ $teamCategory->id }}" {{
                                                            $team->teamcategoryid ==
                                                            $teamCategory->id ? 'selected' : '' }}>
                                                            {{ $teamCategory->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="editTeamImage{{ $team->id }}">Image</label>
                                                    <input type="file" class="form-control-file"
                                                        id="editTeamImage{{ $team->id }}"
                                                        name="image">
                                                </div>
                                                <div class="form-group">
                                                    <label for="editTeamDescription{{ $team->id }}">Description</label>
                                                    <textarea class="form-control"
                                                        id="editTeamDescription{{ $team->id }}"
                                                        name="description">{{ $team->description }}</textarea>
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
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Team Name</th>
                        <th>Team Category</th>
                        <th>Image</th>
                        {{-- <th>Description</th> --}}
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
