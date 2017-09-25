@extends('frontend::layouts.master')
@section('title')
    Login
@endsection
@section('content')
    <div class="page-content">

        <div class="row">
            <div class="col-md-5 col-md-offset-3">
                <div class="widget-box">
                    <div class="widget-header widget-header-blue widget-header-flat">
                        <h4 class="widget-title lighter">Login</h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <form method="post" action="{{route('role.create')}}"
                                  class="form-horizontal validation-form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label class="bolder control-label col-sm-3 col-md-2"
                                           for="name">Username:</label>
                                    <div class="col-sm-9 col-md-8">
                                        <div class="clearfix">
                                            <input name="username" id="username" class="form-control">
                                            @if($errors->has('username'))
                                                <p style="color:red">{!! $errors->first('username') !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="bolder control-label col-sm-3 col-md-2"
                                           for="name">Password:</label>
                                    <div class="col-sm-9 col-md-8">
                                        <div class="clearfix">
                                            <input name="password" id="password" class="form-control">
                                            @if($errors->has('password'))
                                                <p style="color:red">{!! $errors->first('password') !!}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="bolder blue control-label col-sm-3 col-md-2"
                                           for="name"></label>
                                    <div class="col-sm-9 col-md-8">
                                        <div class="clearfix">
                                            <button type="submit" class="btn btn-primary">Login</button>
                                            <a href="/" type="button" class="btn btn-warning">Forgot Password</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection