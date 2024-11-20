@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    Roles
                    <button type="button" class="btn btn-md btn-outline-primary" id="addRole" data-toggle="modal" data-target="#newRole">New</button>
                </h4>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                             <tr>
                                <th>Action</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr> 
                                <td style="center">
                                    <button type="button" class="btn btn-icon btn-rounded btn-warning"
                                        data-target="#EditRole{{ $role->id }}" data-toggle="modal" title='edit'>
                                        <i class="ti-pencil-alt"></i>
                                    </button> 
                                    @if($role->is_active == 1)
                                    <form method="POST" action="{{url('deactivate_role/'.$role->id)}}" class="d-inline-block" onsubmit="show()">
                                        @csrf
                                        <button type="button" class="btn btn-icon btn-rounded btn-danger deactivate" title="Deactivate">
                                            <i class="ti-na"></i>
                                        </button>
                                    </form>
                                    @elseif($role->status != "1")
                                    <form method="POST" action="{{url('activate_role/'.$role->id)}}" class="d-inline-block" onsubmit="show()">
                                        @csrf
                                        <button type="button" class="btn btn-icon btn-rounded btn-info activate" title="Activate">
                                            <i class="ti-check"></i>
                                        </button>
                                    </form>
                                    @endif
                                </td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->description }}</td>
                                <td>
                                    @if ($role->is_active == 1)
                                        <div class="badge badge-success">
                                            @if ($role->is_active == 1)
                                                Active
                                            @endif
                                        </div>
                                    @else 
                                        <div class="badge badge-danger">
                                            @if ($role->is_active != 1)
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
@include('role.create')
@foreach ($roles as $role)
@include('role.edit')
@endforeach
@endsection