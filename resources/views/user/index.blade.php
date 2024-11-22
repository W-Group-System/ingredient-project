@extends('layouts.header')
@section('content')
<div class="row">
    <div class="col-md-3 grid-margin">
        <div class="card mb-2">
            <div class="card-body">
                <p class="card-title">Total User</p>
                <div class="d-flex justify-content-between">
                    <div class="mb-4 mt-2">
                        <h3 class="text-primary fs-30 font-weight-medium">
                            {{ count($users) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin">
        <div class="card mb-2">
            <div class="card-body">
                <p class="card-title">Total Active</p>
                <div class="d-flex justify-content-between">
                    <div class="mb-4 mt-2">
                        <h3 class="text-primary fs-30 font-weight-medium">
                            {{ count($users->where('status', 'Active')) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin">
        <div class="card mb-2">
            <div class="card-body">
                <p class="card-title">Total Inactive</p>
                <div class="d-flex justify-content-between">
                    <div class="mb-4 mt-2">
                        <h3 class="text-primary fs-30 font-weight-medium">
                            {{ count($users->where('status', 'Inactive')) }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title d-flex justify-content-between align-items-center">
                Users
                <button type="button" class="btn btn-md btn-outline-primary" id="adduser" data-toggle="modal"
                    data-target="#newUser">New</button>
            </h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover tablewithSearch">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>
                                <button title='Disable' class="btn btn-md btn-rounded btn-info btn-icon"
                                    data-toggle="modal" data-target="#edit{{$user->id}}">
                                    <i class="ti-pencil-alt"></i>
                                </button>

                                @if($user->status == 'Active')
                                <form method="POST" action="{{url('deactivate-user/'.$user->id)}}"
                                    class="d-inline-block" onsubmit="show()">
                                    @csrf
                                    <button type="button" class="btn btn-icon btn-rounded btn-danger deactivate"
                                        title="Deactivate">
                                        <i class="ti-na"></i>
                                    </button>
                                </form>
                                @elseif($user->status != "Deactivate")
                                <form method="POST" action="{{url('activate-user/'.$user->id)}}"
                                    class="d-inline-block" onsubmit="show()">
                                    @csrf
                                    <button type="button" class="btn btn-icon btn-rounded btn-success activate"
                                        title="Activate">
                                        <i class="ti-check"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{$user->role}}</td>
                            <td>
                                @if ($user->status == 'Active')
                                <span class="badge badge-success">
                                    {{$user->status}}
                                </span>
                                @else
                                <span class="badge badge-danger">
                                    {{$user->status}}
                                </span>
                                @endif
                            </td>
                        </tr>

                        @include('user.edit')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@include('user.create')
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('.deactivate').on('click', function() {
            var form = $(this).closest('form');

            Swal.fire({
                title: "Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, deactivate it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                }
            });
        })

        $('.activate').on('click', function() {
            var form = $(this).closest('form');

            Swal.fire({
                title: "Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, activate it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit()
                }
            });
        })
    })
</script>
@endsection