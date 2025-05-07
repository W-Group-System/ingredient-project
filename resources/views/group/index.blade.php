@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    Ingredient Groups
                    <button type="button" class="btn btn-md btn-outline-primary"  data-toggle="modal" data-target="#NewGroup">New</button>
                </h4>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                             <tr>
                                <th>Action</th>
                                <th>Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                            <tr> 
                                <td style="center">
                                    <a href="{{ url('/ingredients_group/group_setup/' . $group->id) }}" title="View Group">
                                        <button type="button" class="btn btn-primary btn-rounded btn-icon">
                                            <i class="ti-eye"></i>
                                        </button> 
                                    </a>
                                    <button type="button"  class="btn btn-warning  btn-rounded btn-icon"
                                        data-target="#editGroup{{ $group->id }}" data-toggle="modal" title='Edit Group'>
                                        <i class="ti-pencil"></i>
                                    </button>   
                                    @if ($group->status == 1)
                                        <form action="{{ url('/deactivate/' . $group->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-rounded btn-icon" title="Deactivate">
                                                <i class="ti-close"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ url('/activate/' . $group->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-rounded btn-icon" title="Activate">
                                                <i class="ti-check"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                <td>{{ $group->name }}</td>
                                <td>
                                    @if ($group->status)
                                        Active
                                    @else
                                        Inactive
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
    
</script>
@include('group.new_group')
@foreach ($groups as $group)
@include('group.edit_group')
@endforeach
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if ($errors->any())
        Swal.fire({
            icon: 'error',
            title: 'Validation Error!',
            html: `{!! implode('<br>', $errors->all()) !!}`,
            confirmButtonColor: '#d33'
        });
    @endif

    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session("success") }}',
            confirmButtonColor: '#3085d6'
        });
    @endif
</script>
@endsection