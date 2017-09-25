@extends('frontend::layouts.master')
@section('title')
    Login
@endsection
@section('content')

    <div class="page-content">
        <div class="row">
            <div class="col-xs-12 col-md-5 col-md-offset-3">
                <div class="widget-box">
                    <div class="widget-header widget-header-blue widget-header-flat">
                        <h4 class="widget-title lighter">Login</h4>
                    </div>

                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="form-group">
                                <label class="bolder blue control-label col-sm-3 col-md-2" for="display_name">Username</label>
                                <div class="col-sm-9 col-md-6">
                                    <div class="clearfix">
                                        <input class="form-control" id="display_name" name="display_name">
                                        @if($errors->has('display_name'))
                                            <p style="color:red">{!! $errors->first('display_name') !!}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection