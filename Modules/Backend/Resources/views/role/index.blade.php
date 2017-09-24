@extends('backend::layouts.master')
@section('title')
    Roles
@endsection
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="/admin">Home</a>
                    </li>
                    <li class="active">Roles</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="widget-box">
                                    <div class="widget-header widget-header-blue widget-header-flat">
                                        <h4 class="widget-title lighter">Role lists</h4>

                                        {{--<div class="widget-toolbar">--}}
                                            {{--<a href="#" title="Create role">--}}
                                                {{--<i class="ace-icon fa fa-plus"></i>--}}
                                            {{--</a>--}}
                                        {{--</div>--}}
                                    </div>

                                    <div class="widget-body">
                                        @include('backend::layouts.messages')
                                        <div class="btn-create">
                                            <a href="/admin/role/create" class="btn btn-success">Create</a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="widget-main widget-pagination">
                                            <div class="row widget-display">
                                                <div class="col-md-12 col-xs-12">
                                                    <div class="col-md-6 col-xs-10">
                                                        <label class="text-sm">
                                                            Show
                                                        </label>
                                                        <label>
                                                            <select id="show-records" class="form-control input-sm">
                                                                <option value="10">10</option>
                                                                <option value="25">25</option>
                                                                <option value="50">50</option>
                                                                <option value="100">100</option>
                                                            </select>
                                                        </label>
                                                        <label class="text-sm">
                                                            records
                                                        </label>
                                                    </div>
                                                    <div class="col-md-6 col-xs-2">
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

                                                </div>
                                            </div>
                                            @if(count($roles) > 0)
                                            <table id="roles-table" class="table table-bordered table-hover table-striped results-table">
                                                <thead class="thead-inverse">
                                                <tr>
                                                    <th class="order-number"></th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th class="item-action item-action-3"></th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($roles as $key => $role)
                                                    <tr>
                                                        <input type="hidden" name="role_id" value="{{$role->id}}">
                                                        <td class="text-center">{{$key+1}}</td>
                                                        <td>
                                                            {{$role->display_name}}
                                                        </td>
                                                        <td class="text-overflow">{{$role->description}}</td>
                                                        <td>
                                                            <div class="hidden-sm hidden-xs btn-group">
                                                                @if($key != 0)
                                                                    <a class="btn btn-xs btn-success" href="/admin/role/view/{{$role->id}}" title="Role detail">
                                                                        <i class="ace-icon fa fa-check bigger-120"></i>
                                                                    </a>
                                                                    <a class="btn btn-xs btn-info" href="/admin/role/edit/{{$role->id}}" title="Role edit">
                                                                        <i class="ace-icon fa fa-pencil bigger-120"></i>
                                                                    </a>

                                                                    <a class="btn btn-xs btn-danger delete_role" href="#" title="Role delete" role_id="{{$role->id}}" role_name="{{$role->display_name}}">
                                                                        <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                    </a>
                                                                @endif
                                                            </div>

                                                            <div class="hidden-md hidden-lg">
                                                                <div class="inline pos-rel">
                                                                    <button class="btn btn-minier btn-primary dropdown-toggle"
                                                                            data-toggle="dropdown" data-position="auto">
                                                                        <i class="ace-icon fa fa-cog icon-only bigger-110"></i>
                                                                    </button>

                                                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                        <li>
                                                                            <a href="/admin/role/view/{{$role->id}}" class="tooltip-info"
                                                                               data-rel="tooltip" title="View">
                                                                                <span class="blue">
                                                                                    <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="/admin/role/edit/{{$role->id}}" class="tooltip-success"
                                                                               data-rel="tooltip" title="Edit">
                                                                                <span class="green">
                                                                                    <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>

                                                                        <li>
                                                                            <a href="#" class="tooltip-error"
                                                                               data-rel="tooltip" title="Delete">
                                                                                <span class="red">
                                                                                    <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table>
                                                @else
                                                <div class="no-records no-record-index">No records</div>
                                            @endif
                                            <div class="row widget-page">
                                                <div class="col-md-6 col-xs-12">
                                                    @include('backend::pagination.index',['current_page' => 1,'total_page' => $pages])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.span -->
                        </div><!-- /.row -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
    </div>
    <input type="hidden" id="url-ajax" value="/admin/role/pagination/">
@stop

@section('scripts')
    <script src="{{ asset('assets/js/backend/common/pagination-search.js') }}"></script>
    <script src="{{ asset('assets/js/backend/role/role.js') }}"></script>
@endsection
