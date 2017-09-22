@extends('backend::layouts.master')
@section('content')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">Survey Configuration</li>
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
    <br>
    <br>
    <br>
    <div class="row">
        <div class=" col-sm-offset-4 col-sm-3">
            <h3 class="header smaller lighter blue">Set Survey from On/Off</h3>
            <div class="clearfix">
            </div>
            <div class="widget-box" style="border: 0">
                <form method="post"action={{url('/admin/survey-configuration/set')}} >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="clearfix">
                                <div class="control-group">
                                    <label class="control-label bolder blue">Survey Form</label>

                                    <div class="radio">
                                        <label>
                                            <input id="on" name="status" value="1" @if(isset($status) && $status->value == 1) checked  @endif type="radio" class="ace" />
                                            <span class="lbl"> On</span>
                                        </label>
                                    </div>

                                    <div class="radio">
                                        <label>
                                            <input id="off" name="status" value="2" @if(isset($status) && $status->value == 2) checked  @endif type="radio" class="ace" />
                                            <span class="lbl"> Off</span>
                                        </label>
                                    </div>
                                    @if($errors->has('status'))
                                        <p style="color:red">{!! $errors->first('status') !!}</p>
                                    @endif
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-primary">Set</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection