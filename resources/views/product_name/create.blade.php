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
                            <h4 class="page-title">Inventory</h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('product_name.store') }}" method="POST" id="productNameForm">
                                    @csrf
                                    <div class="table-responsive">
                                    <table class="table" id="product_name_table">
                                        <tr>
                                            <th>Product Type</th>
                                            <th>Product Name</th>
                                            <th>Actions</th>
                                        </tr>
                                        <tr class="create_product_name_form">
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control product-code" name="type[]">
                                                        <option value="" selected disabled>Select Product Type</option>
                                                        <option value="0">Pure Carrageenan</option>
                                                        <option value="1">Non-Pure Carrageenan</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" class="form-control product_name" name="product_name[]">
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger remove-row">Remove</button>
                                            </td>
                                        </tr>
                                    </table>
                                    </div>
                                    <button type="button" class="btn btn-primary addRow" id="addRow">Add Row</button>
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    $('select').select2();

    function initializeSelect2OnRow(row) {
        row.find('select').select2();
    }

    $('#addRow').click(function() {
        var newRow = $('.create_product_name_form').first().clone();

        newRow.find('input').val('');

        newRow.find('select')
            .removeClass('select2-hidden-accessible')
            .next('.select2-container')
            .remove();

        $('#product_name_table').append(newRow); 

        newRow.find('.remove-row').removeAttr('hidden');

        initializeSelect2OnRow(newRow);

        newRow.find('.remove-row').click(function() {
            $(this).closest('tr').remove();
        });
    });
});


</script>
@endsection
