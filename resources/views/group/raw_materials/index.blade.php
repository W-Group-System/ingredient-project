@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    Other Raw Materials
                    <button type="button" class="btn btn-md btn-outline-primary"  data-toggle="modal" data-target="#NewMaterial">New</button>
                </h4>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                             <tr>
                                <th>Action</th>
                                <th>Raw Material</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($raw_materials as $raw_material)
                            <tr> 
                                <td style="center">
                                    <button type="button"  class="btn btn-warning  btn-rounded btn-icon"
                                        data-target="#editRawMaterial{{ $raw_material->id }}" data-toggle="modal" title='Edit rawMaterial'>
                                        <i class="ti-pencil"></i>
                                    </button>   
                                    <button type="button" class="btn btn-danger  btn-rounded btn-icon" onclick="confirmDelete({{ $raw_material->id }},)" title='Delete'>
                                        <i class="ti-trash"></i>
                                    </button> 
                                </td>
                                <td>{{ $raw_material->item_code }}</td>
                                <td>
                                    {{ $raw_material->description }}
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

@include('group.raw_materials.new_material')
@foreach ($raw_materials as $raw_material)
@include('group.raw_materials.edit')
@endforeach
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                url = '{{ url('delete_material') }}/' + id;

            $.ajax({
                url: url,
                method: 'DELETE',
                data: {
                    '_token': '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire(
                        'Deleted!',
                        'The record has been deleted.',
                        'success'
                    ).then(() => {
                        location.reload();
                    });
                },
                error: function() {
                    Swal.fire(
                        'Error!',
                        'Something went wrong.',
                        'error'
                    );
                }
            });
        }
        });
    }
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