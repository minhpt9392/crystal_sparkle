@extends('backend::layouts.master')

@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>

                    <li>
                        <a href="#">Backend</a>
                    </li>
                    <li class="active">Hello</li>
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

            <div class="page-content">
                <h1>Hello World</h1>
                @permission('role-name')
                <p>
                    This view is loaded from module: {!! config('backend.name') !!}
                </p>
                @endpermission
            </div>
        </div>
    </div>

@stop
