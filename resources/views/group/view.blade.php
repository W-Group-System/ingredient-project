@extends('layouts.header')
@section('content')
<div class="content-wrapper">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-flex justify-content-between align-items-center">
                    {{ $group->name }}
                    <button type="button" class="btn btn-md btn-outline-primary"  data-toggle="modal" data-target="#NewIngredient">New</button>
                </h4>
                <div class="table-responsive" >
                    <table class="table table-striped table-bordered table-hover tablewithSearch" >
                        <thead>
                             <tr>
                                <th>Action</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($group->items as $item)
                            <tr> 
                                <td style="center">
                                    <button type="button" class="btn btn-primary btn-rounded btn-icon">
                                        <i class="ti-eye"></i>
                                        {{-- <a href="{{ url('ingredients_group/group_setup/' . $group->id)}}" title="View Sample Request">{{ $group->name }}</a> --}}

                                    </button> 
                                </td>
                                <td>{{ $item->item_code }}</td>
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
@include('group.new_ingredient')
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