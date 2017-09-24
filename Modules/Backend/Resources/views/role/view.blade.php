@extends('backend::layouts.master')
@section('title')
    View role
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/backend/role.css') }}">
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
                    <li class="#"><a href="/admin/role">Roles</a></li>
                    <li class="active">View</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        @include('backend::layouts.messages')
                        @if($role->id != 1)
                        <a href="/admin/role/edit/{{$role->id}}" class="btn btn-success">Update</a>
                        <a href="#" class="btn btn-danger delete_role" role_id="{{$role->id}}" role_name="{{$role->display_name}}">Delete</a>
                        @endif
                        <div class="widget-box">
                            <div class="widget-header widget-header-blue widget-header-flat">
                                <h4 class="widget-title lighter">Descriptions</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    @if(!is_null($role))
                                        <table id="simple-table"
                                               class="table table-bordered table-hover table-striped">
                                            <tbody>
                                            <tr>
                                                <td>Id</td>
                                                <td>
                                                    {{$role->id}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>
                                                    {{$role->name}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Display name</td>
                                                <td>
                                                    {{$role->display_name}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Description</td>
                                                <td>
                                                    {{$role->description}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Create at</td>
                                                <td>
                                                    {{$role->created_at}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Update at</td>
                                                <td>
                                                    {{$role->updated_at}}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(count($permissions) > 0)
                <div class="row">
                    <div class="col-xs-12">
                        <div class="widget-box">
                            <div class="widget-header widget-header-blue widget-header-flat">
                                <h4 class="widget-title lighter">Has Permissios</h4>

                            </div>
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="row">

                                            @foreach($permissions as $permission)
                                                <div class="col-md-2">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input name="form-field-checkbox" onclick="return false;"
                                                                   type="checkbox"
                                                                   {{$permission['has'] == 1 ? "checked" : ""}} class="ace"/>
                                                            <span class="lbl"> {{$permission['name']}}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/backend/role/role.js') }}"></script>
@endsection
