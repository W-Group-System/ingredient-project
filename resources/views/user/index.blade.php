@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    Users
                    <button type="button" class="btn btn-md btn-outline-primary" id="adduser" data-toggle="modal" data-target="#newUser">New</button>
                </h4>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                             <tr>
                                <th>Action</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Company</th>
                                <th>user</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr> 
                                <td style="center">
                                    <button type="button" class="btn btn-md btn-warning"
                                        data-target="#Edituser{{ $user->id }}" data-toggle="modal" title='edit'>
                                        <i class="ti-eye"></i>
                                    </button> 
                                    @if($user->is_active == 1)
                                    <form method="POST" action="{{url('deactivate_user/'.$user->id)}}" class="d-inline-block">
                                        @csrf
                                        <button type="button" class="btn btn-md btn-danger deactivate" title="Deactivate">
                                            <i class="ti-na"></i>
                                        </button>
                                    </form>
                                    @elseif($user->status != "1")
                                    <form method="POST" action="{{url('activate_user/'.$user->id)}}" class="d-inline-block">
                                        @csrf
                                        <button type="button" class="btn btn-md btn-info activate" title="Activate">
                                            <i class="ti-check"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->company_id }}</td>
                                <td>
                                    @if ($user->is_active == 1)
                                        <div class="badge badge-success">
                                            @if ($user->is_active == 1)
                                                Active
                                            @endif
                                        </div>
                                    @else 
                                        <div class="badge badge-danger">
                                            @if ($user->is_active != 1)
                                                Inactive
                                            @endif
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        @if (session('success'))
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        @endif

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
@include('user.create')
{{-- @foreach ($users as $user)
@include('user.edit')
@endforeach --}}
@endsection