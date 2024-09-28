@extends('layouts.master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Manage Coupons</h3>
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addCouponModal">
            Add Coupon
        </button>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Discount (%)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->discount }}%</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-success">Options</button>
                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#editCouponModal{{ $coupon->id }}">Edit</button>
                                <form action="{{ route('coupons.destroy', $coupon->id) }}" method="post"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

                <!-- Edit Coupon Modal -->
                <div class="modal fade" id="editCouponModal{{ $coupon->id }}">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Coupon</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('coupons.update', $coupon->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="code">Coupon Code</label>
                                            <input type="text" class="form-control" name="code"
                                                value="{{ $coupon->code }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="discount">Discount (%)</label>
                                            <input type="number" class="form-control" name="discount"
                                                value="{{ $coupon->discount }}">
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
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Code</th>
                    <th>Discount (%)</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<!-- Add Coupon Modal -->
<div class="modal fade" id="addCouponModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Coupon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('coupons.store') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="code">Coupon Code</label>
                            <input type="text" class="form-control" name="code" placeholder="Enter coupon code">
                        </div>
                        <div class="form-group">
                            <label for="discount">Discount (%)</label>
                            <input type="number" class="form-control" name="discount"
                                placeholder="Enter discount percentage">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection