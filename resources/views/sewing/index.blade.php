@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>SEWING</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title">
                    <p style="padding-left: 20px; padding-top: 20px;font-weight: bold">SUMMARY</p>
                </div>
               <div class="card-body">
                <table id="summaryTable" class="table table-bordered table-condensed table-hover">
                    <tr style="background-color: aliceblue">
                        <th>Transaction Date</th>
                        <th>Style</th>
                        <th>Total Size</th>
                        <th>Total Output</th>
                        <th>Action</th>
                    </tr>
                    @foreach($data as $dat)
                    <tr>
                        <td>{{ $dat->trnDate }}</td>
                        <td>{{ $dat->styleCode }}</td>
                        <td>{{ $dat->totalSizeName }}</td>
                        <td>{{ $dat->totalQtyOutput }}</td>
                        <td><a class="btn btn-sm btn-primary show-detail" href="#" data-style="{{ $dat->styleCode }}" data-date="{{ $dat->trnDate }}">Show Detail</a></td>
                    </tr>
                    @endforeach
                </table>                
               </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-title">
                    <p style="padding-left: 20px; padding-top: 20px;font-weight: bold">Transaction Detail</p>
                </div>
                <div class="card-body">
                    <table id="outputTableA" class="table table-bordered table-condensed table-hover" style="display: none;">
                        <thead>
                            <tr style="text-align: center; background-color: rgb(152, 202, 245);">
                                <th rowspan="2" colspan="2">Operator</th>
                                <th colspan="12">Size</th>
                                <th rowspan="2" colspan="2">Total Qty</th>
                                <th rowspan="2" colspan="2">Destination</th>
                                <th rowspan="2" colspan="2">Action</th>
                            </tr>
                            <tr style="text-align: center; background-color: rgb(152, 202, 245);">
                                <td colspan="2">XS</td>
                                <td colspan="2">S</td>
                                <td colspan="2">M</td>
                                <td colspan="2">L</td>
                                <td colspan="2">XL</td>
                                <td colspan="2">XXL</td>
                            </tr>
                        </thead>  
                        <tbody id="detailBody">
                            
                        </tbody>
                    </table>
                    <table id="outputTableB" class="table table-bordered table-condensed table-hover" style="display: none;">
                        <thead>
                            <tr style="text-align: center; background-color: rgb(170, 205, 235);">
                                <th rowspan="2" colspan="2">Operator</th>
                                <th colspan="22">Size</th>
                                <th rowspan="2" colspan="2">Total Qty</th>
                                <th rowspan="2" colspan="2">Destination</th>
                                <th rowspan="2" colspan="2">Action</th>
                            </tr>
                            <tr style="text-align: center; background-color: rgb(170, 205, 235);">
                                <td colspan="2">92</td>
                                <td colspan="2">98</td>
                                <td colspan="2">104</td>
                                <td colspan="2">110</td>
                                <td colspan="2">116</td>
                                <td colspan="2">122</td>
                                <td colspan="2">128</td>
                                <td colspan="2">134</td>
                                <td colspan="2">140</td>
                                <td colspan="2">146</td>
                                <td colspan="2">152</td>
                            </tr>
                        </thead>  
                       
                        <tbody id="detailBody">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $(document).ready(function() {
        $('.show-detail').click(function(e) {
            e.preventDefault();

            var styleCode = $(this).data('style');
            var trnDate = $(this).data('date');
            var outputTableA = document.getElementById('outputTableA');
            var outputTableB = document.getElementById('outputTableB');

            if(styleCode === 'BOSSE FANCY OH HOOD S.9'){
                outputTableA.style.display = 'block';
                outputTableB.style.display = 'none';
                $.ajax({
                    url: '{{ url("/sewing/show") }}/' + styleCode + '/' + trnDate,
                    type: 'GET',
                    success: function(response) {
                        $('#outputTableA tbody').empty();
                        
                        response.forEach(function(item) {
                            var row = '<tr>' +
                                '<td colspan="2">' + item.operatorName + '</td>' +
                                '<td colspan="2">' + item.xs + '</td>' +
                                '<td colspan="2">' + item.s + '</td>' +
                                '<td colspan="2">' + item.m + '</td>' +
                                '<td colspan="2">' + item.l + '</td>' +
                                '<td colspan="2">' + item.xl + '</td>' +
                                '<td colspan="2">' + item.xxl + '</td>' +
                                '<td colspan="2">' + item.totalQtyOutput + '</td>' +
                                '<td colspan="2">' + item.destinationCode + '</td>' +
                            '</tr>';
                            $('#outputTableA tbody').append(row);
                        });
                    }
                });
            } else if (styleCode === 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9') {
                outputTableA.style.display = 'none';
                outputTableB.style.display = 'block';
                $.ajax({
                    url: '{{ url("/sewing/show") }}/' + styleCode + '/' + trnDate,
                    type: 'GET',
                    success: function(response) {
                        $('#outputTableB tbody').empty();
                        
                        response.forEach(function(item) {
                            var row = '<tr>' +
                                '<td colspan="2">' + item.operatorName + '</td>' +
                                '<td colspan="2">' + item.a + '</td>' +
                                '<td colspan="2">' + item.b + '</td>' +
                                '<td colspan="2">' + item.c + '</td>' +
                                '<td colspan="2">' + item.d + '</td>' +
                                '<td colspan="2">' + item.e + '</td>' +
                                '<td colspan="2">' + item.f + '</td>' +
                                '<td colspan="2">' + item.g + '</td>' +
                                '<td colspan="2">' + item.h + '</td>' +
                                '<td colspan="2">' + item.i + '</td>' +
                                '<td colspan="2">' + item.j + '</td>' +
                                '<td colspan="2">' + item.k + '</td>' +
                                '<td colspan="2">' + item.totalQtyOutput + '</td>' +
                                '<td colspan="2">' + item.destinationCode + '</td>' +
                            '</tr>';
                            $('#outputTableB tbody').append(row);
                        });
                    }
                });
            }
        });
    });
</script> --}}

{{-- <script>
    $(document).ready(function() {
        $('.show-detail').click(function(e) {
            e.preventDefault();

            var styleCode = $(this).data('style');
            var trnDate = $(this).data('date');
            var outputTableA = document.getElementById('outputTableA');
            var outputTableB = document.getElementById('outputTableB');

            if(styleCode === 'BOSSE FANCY OH HOOD S.9'){
                outputTableA.style.display = 'block';
                outputTableB.style.display = 'none';
                $.ajax({
                    url: '{{ url("/sewing/show") }}/' + styleCode + '/' + trnDate,
                    type: 'GET',
                    success: function(response) {
                        $('#outputTableA tbody').empty();
                        
                        response.forEach(function(item) {
                            var row = '<tr>' +
                                '<td colspan="2">' + item.operatorName + '</td>' +
                                '<td colspan="2"><span class="editable" data-field="xs">' + item.xs + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="s">' + item.s + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="m">' + item.m + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="l">' + item.l + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="xl">' + item.xl + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="xxl">' + item.xxl + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="totalQtyOutput">' + item.totalQtyOutput + '</span></td>' +
                                '<td colspan="2">' + item.destinationCode + '</td>' +
                                '<td colspan="2"><button class="btn btn-sm btn-primary edit-row">Edit</button></td>' +
                            '</tr>';
                            $('#outputTableA tbody').append(row);
                        });

                        $('.edit-row').click(function() {
                            var $row = $(this).closest('tr');
                            $row.find('.editable').each(function() {
                                var $span = $(this);
                                var value = $span.text();
                                var field = $span.data('field');
                                var $input = $('<input>', {
                                    type: 'text',
                                    value: value,
                                    class: 'form-control edit-input',
                                    'data-field': field
                                });
                                $span.replaceWith($input);
                            });

                            $(this).replaceWith('<button class="btn btn-sm btn-success save-row">Save</button>');

                            $('.save-row').click(function() {
                                var $row = $(this).closest('tr');
                                var data = {};
                                $row.find('.edit-input').each(function() {
                                    var $input = $(this);
                                    var value = $input.val();
                                    var field = $input.data('field');
                                    data[field] = value;
                                    var $span = $('<span>', {
                                        text: value,
                                        class: 'editable',
                                        'data-field': field
                                    });
                                    $input.replaceWith($span);
                                });

                                $.ajax({
                                    url: '{{ url("/sewing/update") }}',
                                    type: 'POST',
                                    data: data,
                                    success: function(response) {
                                        alert('Data has been updated');
                                    },
                                    error: function(response) {
                                        alert('Error updating data');
                                    }
                                });

                                $(this).replaceWith('<button class="btn btn-sm btn-primary edit-row">Edit</button>');
                            });
                        });
                    }
                });
            } else if (styleCode === 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9') {
                outputTableA.style.display = 'none';
                outputTableB.style.display = 'block';
                $.ajax({
                    url: '{{ url("/sewing/show") }}/' + styleCode + '/' + trnDate,
                    type: 'GET',
                    success: function(response) {
                        $('#outputTableB tbody').empty();
                        
                        response.forEach(function(item) {
                            var row = '<tr>' +
                                '<td colspan="2">' + item.operatorName + '</td>' +
                                '<td colspan="2"><span class="editable" data-field="a">' + item.a + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="b">' + item.b + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="c">' + item.c + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="d">' + item.d + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="e">' + item.e + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="f">' + item.f + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="g">' + item.g + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="h">' + item.h + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="i">' + item.i + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="j">' + item.j + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="k">' + item.k + '</span></td>' +
                                
                                '<td colspan="2">' + item.totalQtyOutput + '</td>' +
                                '<td colspan="2">' + item.destinationCode + '</td>' +
                                '<td colspan="2"><button class="btn btn-sm btn-primary edit-row">Edit</button></td>' +
                            '</tr>';
                            $('#outputTableB tbody').append(row);
                        });

                        $('.edit-row').click(function() {
                            var $row = $(this).closest('tr');
                            $row.find('.editable').each(function() {
                                var $span = $(this);
                                var value = $span.text();
                                var field = $span.data('field');
                                var $input = $('<input>', {
                                    type: 'text',
                                    value: value,
                                    class: 'form-control edit-input',
                                    'data-field': field
                                });
                                $span.replaceWith($input);
                            });

                            $(this).replaceWith('<button class="btn btn-sm btn-success save-row">Save</button>');

                            $('.save-row').click(function() {
                                var $row = $(this).closest('tr');
                                var data = {};
                                $row.find('.edit-input').each(function() {
                                    var $input = $(this);
                                    var value = $input.val();
                                    var field = $input.data('field');
                                    data[field] = value;
                                    var $span = $('<span>', {
                                        text: value,
                                        class: 'editable',
                                        'data-field': field
                                    });
                                    $input.replaceWith($span);
                                });

                                $.ajax({
                                    url: '{{ url("/sewing/update") }}',
                                    type: 'POST',
                                    data: data,
                                    success: function(response) {
                                        alert('Data has been updated');
                                    },
                                    error: function(response) {                                        
                                        alert('Error updating data');
                                    }
                                });

                                $(this).replaceWith('<button class="btn btn-sm btn-primary edit-row">Edit</button>');
                            });
                        });
                    }
                });
            }
        });
    });
</script> --}}

<script>
    $(document).ready(function() {
        $('.show-detail').click(function(e) {
            e.preventDefault();

            var styleCode = $(this).data('style');
            var trnDate = $(this).data('date');
            var outputTableA = document.getElementById('outputTableA');
            var outputTableB = document.getElementById('outputTableB');

            if(styleCode === 'BOSSE FANCY OH HOOD S.9'){
                outputTableA.style.display = 'block';
                outputTableB.style.display = 'none';
                $.ajax({
                    url: '{{ url("/sewing/show") }}/' + styleCode + '/' + trnDate,
                    type: 'GET',
                    success: function(response) {
                        $('#outputTableA tbody').empty();
                        
                        response.forEach(function(item) {
                            var ttl = parseInt(item.xs)+parseInt(item.s)+parseInt(item.m)+parseInt(item.l)+parseInt(item.xl)+parseInt(item.xxl);
                            var row = '<tr>' +
                                '<td colspan="2">' + item.operatorName + '</td>' +
                                '<td colspan="2"><span class="editable" data-field="xs">' + item.xs + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="s">' + item.s + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="m">' + item.m + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="l">' + item.l + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="xl">' + item.xl + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="xxl">' + item.xxl + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="totalQtyOutput">' + ttl + '</span></td>' +
                                '<td colspan="2">' + item.destinationCode + '</td>' +
                                '<td colspan="2"><button class="btn btn-sm btn-primary edit-row">Edit</button></td>' +
                            '</tr>';
                            $('#outputTableA tbody').append(row);
                        });

                        $('.edit-row').click(function() {
                            var $row = $(this).closest('tr');
                            $row.find('.editable').each(function() {
                                var $span = $(this);
                                var value = $span.text();
                                var field = $span.data('field');
                                var $input = $('<input>', {
                                    type: 'text',
                                    value: value,
                                    class: 'form-control edit-input',
                                    'data-field': field
                                });
                                $span.replaceWith($input);
                            });

                            $(this).replaceWith('<button class="btn btn-sm btn-success save-row">Save</button>');

                            $('.save-row').click(function() {
                                var $row = $(this).closest('tr');
                                var data = {
                                    styleCode: styleCode,
                                    trnDate: trnDate
                                };
                                $row.find('.edit-input').each(function() {
                                    var $input = $(this);
                                    var value = $input.val();
                                    var field = $input.data('field');
                                    data[field] = value;
                                    var $span = $('<span>', {
                                        text: value,
                                        class: 'editable',
                                        'data-field': field
                                    });
                                    $input.replaceWith($span);
                                });

                                $.ajax({
                                    url: '{{ url("/sewing/update") }}/' + styleCode + '/' + trnDate,
                                    type: 'POST',
                                    data: data,
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        alert('Data has been updated');
                                    },
                                    error: function(response) {
                                        alert('Error updating data');
                                    }
                                });

                                $(this).replaceWith('<button class="btn btn-sm btn-primary edit-row">Edit</button>');
                            });
                        });
                    }
                });
            } else if (styleCode === 'FOOTBALL SETS EUROCUP CW N (ARGENTINA) S.9') {
                outputTableA.style.display = 'none';
                outputTableB.style.display = 'block';
                $.ajax({
                    url: '{{ url("/sewing/show") }}/' + styleCode + '/' + trnDate,
                    type: 'GET',
                    success: function(response) {
                        $('#outputTableB tbody').empty();
                        
                        response.forEach(function(item) {
                            var row = '<tr>' +
                                '<td colspan="2">' + item.operatorName + '</td>' +
                                '<td colspan="2"><span class="editable" data-field="a">' + item.a + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="b">' + item.b + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="c">' + item.c + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="d">' + item.d + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="e">' + item.e + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="f">' + item.f + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="g">' + item.g + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="h">' + item.h + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="i">' + item.i + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="j">' + item.j + '</span></td>' +
                                '<td colspan="2"><span class="editable" data-field="k">' + item.k + '</span></td>' +
                                '<td colspan="2">' + item.totalQtyOutput + '</td>' +
                                '<td colspan="2">' + item.destinationCode + '</td>' +
                                '<td colspan="2"><button class="btn btn-sm btn-primary edit-row">Edit</button></td>' +
                            '</tr>';
                            $('#outputTableB tbody').append(row);
                        });

                        $('.edit-row').click(function() {
                            var $row = $(this).closest('tr');
                            $row.find('.editable').each(function() {
                                var $span = $(this);
                                var value = $span.text();
                                var field = $span.data('field');
                                var $input = $('<input>', {
                                    type: 'text',
                                    value: value,
                                    class: 'form-control edit-input',
                                    'data-field': field
                                });
                                $span.replaceWith($input);
                            });

                            $(this).replaceWith('<button class="btn btn-sm btn-success save-row">Save</button>');

                            $('.save-row').click(function() {
                                var $row = $(this).closest('tr');
                                var data = {
                                    styleCode: styleCode,
                                    trnDate: trnDate
                                };
                                $row.find('.edit-input').each(function() {
                                    var $input = $(this);
                                    var value = $input.val();
                                    var field = $input.data('field');
                                    data[field] = value;
                                    var $span = $('<span>', {
                                        text: value,
                                        class: 'editable',
                                        'data-field': field
                                    });
                                    $input.replaceWith($span);
                                });

                                $.ajax({
                                    url: '{{ url("/sewing/update") }}/' + styleCode + '/' + trnDate,
                                    type: 'POST',
                                    data: data,
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        alert('Data has been updated');
                                    },
                                    error: function(response) {
                                        alert('Error updating data');
                                    }
                                });

                                $(this).replaceWith('<button class="btn btn-sm btn-primary edit-row">Edit</button>');
                            });
                        });
                    }
                });
            }
        });
    });
</script>


@endsection
