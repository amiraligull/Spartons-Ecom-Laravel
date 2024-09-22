@extends('layouts.master')
@section('content')
<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="main">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Manage your Pages</h3>
        </div>

        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addModal">
                    Add Page
                </button>
            </div>
            <!-- / add .modal -->

            <!-- ... (your existing code) ... -->

            <div class="modal fade" id="addModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Page</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('add-page') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="addTitle">Title</label>
                                    <input type="text" class="form-control" id="addTitle" name="title" placeholder="Enter page title">
                                </div>
                                <div class="form-group">
                                    <label for="addDescription">Description</label>
                                    <textarea class="form-control" id="addPage" name="description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="addImage">Image</label>
                                    <input type="file" class="form-control-file" id="addImage" name="image">
                                </div>
                                <div class="form-group">
                                    <label for="addPageType">Page Type</label>
                                    <select name="page_type"  class="form-control">
                                        <option disabled selected>Select</option>
                                        <option value="About">About</option>
                                        <option value="Program">Program Details</option>

                                    </select>

                                    {{-- <input type="text" class="form-control" id="addPageType" name="page_type" placeholder="Enter page type"> --}}
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Add Page</button>
                            </div>
                        </form>
                    </div>
                </div>

                <script>
                                                            ClassicEditor
                                                                    .create( document.querySelector( '#addPage' ) )
                                                                    .then( editor => {
                                                                            console.log( editor );
                                                                    } )
                                                                    .catch( error => {
                                                                            console.error( error );
                                                                    } );
                                                    </script>
            </div>

            <!-- ... (existing code) ... -->

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

            <!-- ... (existing code) ... -->

        </div>
        <!-- / add .modal -->

        <!-- ... (existing code) ... -->
<!-- /.card-header -->
<div class="card-body">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Title</th>
                {{-- <th>Description</th> --}}
                <th>Image</th>
                <th>Page Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($pages as $page)
            <tr>
                <td>{{ $page->title }}</td>
                {{-- <td>{{ $page->description }}</td> --}}
                <td>
                    <img src="{{ url('public/uploads') }}/{{ $page->image }}" width="100" alt="ss">
                </td>
                <td>{{ $page->page_type }}</td>
                <td>
                    <div class="btn-group">
                        <button type="button" class="btn btn-success">Options</button>
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu" role="menu">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal{{ $page->id }}">
                                Edit
                            </button>
                            <form action="{{ route('delete-page', $page->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>

                <!-- /.modal -->
                <div class="modal fade" id="editModal{{ $page->id }}">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Page</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- ... (your existing modal code) ... -->

                                <form action="{{ route('update-page', $page->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="editTitle{{ $page->id }}">Title</label>
                                            <input type="text" class="form-control" id="editTitle{{ $page->id }}" name="title" value="{{ $page->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="editDescription{{ $page->id }}">Description</label>
                                            <textarea class="form-control" id="editDescription{{ $page->id }}" name="description">{{ $page->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="editImage{{ $page->id }}">Image</label>
                                            <input type="file" class="form-control-file" id="editImage{{ $page->id }}" name="image">
                                        </div>
                                       

                                        <div class="form-group">
    <label for="editPageType{{ $page->id }}">Page Type</label>
    <select name="page_type" class="form-control" id="editPageType{{ $page->id }}">
        <option disabled>Select</option>
        <option value="About" {{ $page->page_type === 'About' ? 'selected' : '' }}>About</option>
        <option value="Program" {{ $page->page_type === 'Program' ? 'selected' : '' }}>Program Details</option>
        <!-- Add more options as needed -->
    </select>
</div>

                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>

                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#editDescription{{ $page->id }}'))
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
                <th>Title</th>
                {{-- <th>Description</th> --}}
                <th>Image</th>
                <th>Page Type</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
<!-- /.card-body -->

<!-- ... (existing code) ... -->

@endsection