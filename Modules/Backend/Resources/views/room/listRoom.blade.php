@extends('backend::layouts.master')
@section('content')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">Room</a>
            </li>
            <li class="active">List</li>
        </ul><!-- /.breadcrumb -->

        <div class="nav-search" id="nav-search">
            <form class="form-search">
                <span class="input-icon">
                    <input type="text" placeholder="Search ..." class="nav-search-input"
                           id="nav-search-input" autocomplete="off"/>
                    <i class="ace-icon fa fa-search nav-search-icon"></i>
                </span>
            </form>
        </div><!-- /.nav-search -->
    </div>

    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">List Room</h3>
                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>
                    <div class="" style="margin-bottom: 10px">
                        <a href="/admin/room/create" class="btn btn-success">Create</a>
                    </div>

                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Shop</th>
                                    <th>Room number</th>
                                    <th>Room name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($rooms))
                                    <?php $no = 1; ?>
                                    @foreach($rooms as $p)
                                        <tr id="row{!! $p->id !!}" >
                                            <td><?php echo $no ?></td>
                                            <td>{!! $p->shopName !!}</td>
                                            <td>{!! $p->number !!}</td>
                                            <td>{!! $p->name !!}</td>
                                            <td>
                                                <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="green" href="{{url('/admin/room/edit/'.$p->id)}}">
                                                        <i class="ace-icon fa fa-pencil-square-o bigger-130"></i>
                                                    </a>
                                                    <a class="red" onclick="deleteRoom({!! $p->id !!})">
                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="modal-table" class="modal fade" tabindex="-1"></div>
        </div>

        <div class="col-sm-1"></div>
    </div>
    <script src="{{ URL::asset('js/myjs2.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/dataTables.buttons.min.js')}}"></script>
    <script>
        jQuery(function($) {
            //initiate dataTables plugin
            var myTable =
                $('#dynamic-table')
                    .DataTable( {} );
        })
    </script>
@endsection