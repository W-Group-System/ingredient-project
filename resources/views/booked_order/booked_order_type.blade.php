@extends('layouts.app')
@section('content')

<div class="wrapper">
    <div class="content-page">
        <div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                    </div>
                    <h4 class="page-title">Booked orders</h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBookedOrderModal">
            Create Booked Orders
        </button>
        <div class="table-responsive">
        <table id="basic-datatable" class="table table-hover dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th>Booked Order</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookedOrders as $bookedOrder)
                    <tr>
                        <td>{{ $bookedOrder->name }}</td>
                        <td>{{ $bookedOrder->type }}</td>
                        
                        {{-- <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBookedOrderModal{{ $bookedOrder->id }}">Edit</button>
                            <form action="{{ route('roles.destroy', $role) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                    {{-- <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="editRoleModalLabel{{ $role->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editRoleModalLabel{{ $role->id }}">Edit Role</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

    </div>
    <div class="modal fade" id="createBookedOrderModal" tabindex="-1" role="dialog" aria-labelledby="createBookedOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create New Booked Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('booked_orders.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        {{-- <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="" {{ !$bookedOrders->type ? 'selected' : '' }} disabled>Select Role</option>
                                <option value="New Order" {{ !$bookedOrders->type ? 'selected' : '' }}>New Order</option>
                                <option value="Reserved Stocks" {{ !$bookedOrders->type ? 'selected' : '' }}>Reserved Stock</option>
                            </select>
                        </div>      --}}
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="" selected disabled>Select Type</option>
                                <option value="New Order">New Order</option>
                                <option value="Reserved Stocks">Reserved Stock</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>                            
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
