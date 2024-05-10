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
                            <h4 class="page-title">USERS</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                                        Create User
                                    </button>
                                </h4>
                                <div class="table-responsive">
                                    <table id="basic-datatable" class="table table-hover dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">Edit</button>
                                                    @if($user->is_active)
                                                        <form action="{{ route('users.disable', $user) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-warning">Disable</button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('users.activate', $user) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn btn-success">Activate</button>
                                                        </form>
                                                    @endif
                                                </td>                                                
                                                
                                            </tr>
                                            <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editUserModalLabel{{ $user->id }}">Edit User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
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
