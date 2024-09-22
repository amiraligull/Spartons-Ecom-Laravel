@extends('layouts.master')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
<!-- Content Wrapper. Contains page content -->
        <div class="main" >
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Manage your Coaches</h3>
                </div>


                <div class="card">
                    <div class="card-header">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addModal">
                            Add Coach
                        </button>
                    </div>
                    <!-- / add .modal -->
                  <!-- ... (your existing code) ... -->

<!-- ... (your existing code) ... -->

                                    <div class="modal fade" id="addModal">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Coach</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('store-coach') }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="addName">Full Name</label>
                                                            <input type="text" class="form-control" id="addName" name="name" placeholder="Enter your name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="addDescription">Description</label>
                                                            <textarea class="form-control" id="addDescription" name="description"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="addImage">Image</label>
                                                            <input type="file" class="form-control-file" id="addImage" name="image">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add Coach</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    <script>
                                                            ClassicEditor
                                                                    .create( document.querySelector( '#addDescription' ) )
                                                                    .then( editor => {
                                                                            console.log( editor );
                                                                    } )
                                                                    .catch( error => {
                                                                            console.error( error );
                                                                    } );
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

                                <th>Full-name</th>
                                {{-- <th>Description</th> --}}
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($coaches as $coach)
                            <tr>
                                <td>{{ $coach->name }}</td>
                                {{-- <td>{{ $coach->description }}</td> --}}
                                <td>
                                    <img src="{{url('public/uploads')}}/{{ $coach->image }}" width="100" alt="ss">
                                
                                </td>

                                <td>
                                    <div class="btn-group">

                                        <button type="button" class="btn btn-success">Options</button>
                                        <button type="button" class="btn btn-success dropdown-toggle"
                                            data-toggle="dropdown">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $coach->id }}">
                Edit
            </button>
                                          <form action="{{ route('delete-coach', $coach->id) }}" method="post" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>

                                        </div>
                                    </div>
                                </td>
                                <!-- /.modal -->

                                <div class="modal fade" id="editModal{{ $coach->id }}">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Extra Large Modal</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- ... (your existing modal code) ... -->

<form action="{{ route('update-coach', $coach->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="card-body">
        <div class="form-group">
            <label for="editName{{ $coach->id }}">Full Name</label>
            <input type="text" class="form-control" id="editName{{ $coach->id }}" name="name" value="{{ $coach->name }}">
        </div>
      <div class="form-group">
                                <label for="editDescription{{ $coach->id }}">Description</label>
                                <textarea class="form-control" id="editDescription{{ $coach->id }}" name="description">{{ $coach->description }}</textarea>
                            </div>
        <div class="form-group">
            <label for="editImage{{ $coach->id }}">Image</label>
            <input type="file" class="form-control-file" id="editImage{{ $coach->id }}" name="image">
        </div>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>


<script>
        ClassicEditor
            .create(document.querySelector('#editDescription{{ $coach->id }}'))
            .catch(error => {
                console.error(error);
            });
    </script>

<!-- ... (existing modal code) ... -->

                                            </div>
                                            
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Full Name</th>
                                {{-- <th>Description</th> --}}
                                <th>Image</th>
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
