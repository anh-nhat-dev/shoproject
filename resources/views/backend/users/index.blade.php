@extends('layouts.backend.master')

@section('title', 'List User')

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">List User </h4>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li class="active">List User</li>
    </ol>
</div>
@stop

@section('content')
<div class="col-sm-12">
    <div class="panel panel-default block1">
        <div class="panel-heading">
            <a href="{{route('admin.user.add')}}" class="btn btn-success" id="unblockbtn1"><i class="icon-plus"></i> Create</a>
        </div>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                        <thead class="text-center">
                            <tr>
                                <th>ID</th>
                                <th>Fullname</th>
                                <th>Thumbnail</th>
                                <th>Email</th>
                                <th>Create</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @each('backend.users.components.item-table', $users, 'user')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@stop

@section('script')
<script src="../plugins/bower_components/datatables/jquery.dataTables.min.js"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    })
</script>
@stop

@section('style')
<link href="../plugins/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
@stop