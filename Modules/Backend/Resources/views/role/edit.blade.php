@extends('backend::layouts.master')
@section('title')
    Edit role
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
                    <li><a href="/admin/role">Roles</a></li>
                    <li class="active">Edit</li>
                </ul><!-- /.breadcrumb -->
            </div>

            <div class="page-content">
                <form method="post" action="{{route('role.edit')}}" class="form-horizontal validation-form">
                    <div class="widget-box">
                        <div class="widget-header widget-header-blue widget-header-flat">
                            <h4 class="widget-title lighter">Descriptions</h4>
                        </div>

                        <div class="widget-body">
                            <div class="widget-main">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $role->id }}">
                                <div class="form-group">
                                    <label class="bolder blue control-label col-sm-3 col-md-1"
                                           for="name">Name:</label>
                                    <div class="col-sm-9 col-md-4">
                                        <div class="clearfix">
                                            <input name="name" id="name" readonly class="form-control" value="{!! $role->name !!}">
                                            @if($errors->has('name'))
                                                <p style="color:red">{!! $errors->first('name') !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="bolder blue control-label col-sm-3 col-md-1" for="display_name">Display
                                        name</label>
                                    <div class="col-sm-9 col-md-4">
                                        <div class="clearfix">
                                            <input class="form-control" id="display_name" name="display_name" value="{!! $role->display_name !!}">
                                            @if($errors->has('display_name'))
                                                <p style="color:red">{!! $errors->first('display_name') !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="bolder blue control-label col-sm-3 col-md-1" for="description">Description</label>
                                    <div class="col-sm-9 col-md-4">
                                        <div class="clearfix">
                                            <textarea class="form-control" id="description" name="description"
                                                      rows="4">{!! $role->description !!}</textarea>
                                            @if($errors->has('description'))
                                                <p style="color:red">{!! $errors->first('description') !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @if(count($permissions) > 0)
                    <div class="widget-box">
                        <div class="widget-header widget-header-blue widget-header-flat">
                            <h4 class="widget-title lighter">Has Permissios</h4>

                        </div>
                        <div class="widget-body">
                            <div class="widget-main">
                                <div class="row">
                                    @foreach($permissions as $key => $permission)
                                        <div class="col-md-2">
                                            <div class="checkbox">
                                                <label>
                                                    <input name="permission[{{$permission['id']}}]" type="checkbox"
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
                    @endif
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('assets/js/backend/role/role-vailidate.js') }}"></script>
    <script src="{{ asset('assets/js/backend/role/role.js') }}"></script>
@endsection
