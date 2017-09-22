@extends('backend::layouts.master')
@section('content')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li>
                <a href="#">Admin</a>
            </li>
            <li class="active">Operating Hours</li>
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
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
                <h3 class="header smaller lighter blue">Day and Night Settings</h3>
                <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="widget-box" style="border: 0">
                <form method="post" action={{url('/admin/operating-hours/setting')}}>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="clearfix">

                                <label class="bolder blue">Day: </label>
                                <div class="control-group">
                                    <label for="shop">From: </label>
                                    <div class="input-group">
                                        <input class="form-control" value="{!! $curSet->day_from !!}"
                                               required id="day-from" name="day_from" style="width:100%;">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o bigger-110"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('day_from'))
                                        <p style="color:red">{!! $errors->first('day_from') !!}</p>
                                    @endif
                                </div>

                                <div class="control-group">
                                    <label for="day-to">To: </label>
                                    <div class="input-group">
                                        <input class="form-control" value="{!! $curSet->day_to !!}"
                                               required id="day-to" name="day_to" style="width:100%;">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o bigger-110"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('day_to'))
                                        <p style="color:red">{!! $errors->first('day_to') !!}</p>
                                    @endif
                                </div>

                                <hr>
                                <label class="bolder blue">Night: </label>
                                <div class="control-group">
                                    <label for="night-from">From: </label>
                                    <div class="input-group">
                                        <input class="form-control" value="{!! $curSet->night_from !!}"
                                               required id="night-from" name="night_from" style="width:100%;">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o bigger-110"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('night_from'))
                                        <p style="color:red">{!! $errors->first('night_from') !!}</p>
                                    @endif
                                </div>

                                <div class="control-group">
                                    <label for="night-to">To: </label>
                                    <div class="input-group">
                                        <input class="form-control" value="{!! $curSet->night_to !!}"
                                               required id="night-to" name="night_to" style="width:100%;" >
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o bigger-110"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('night_to'))
                                        <p style="color:red">{!! $errors->first('night_to') !!}</p>
                                    @endif
                                </div>

                                <hr>
                                <button type="submit" class="btn btn-primary">Save</button>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4"></div>
    </div>
@endsection

@section('scripts')
    <script>
        function setTimePicker(id)
        {
            $('#'+id).timepicker({
                timeFormat: 'HH:mm:ss',
                minuteStep: 15,
                showSeconds: true,
                showMeridian: false,
                disableFocus: true,
                icons: {
                    up: 'fa fa-chevron-up',
                    down: 'fa fa-chevron-down'
                }
            }).on('focus', function() {
                $('#'+id).timepicker('showWidget');
            }).next().on(ace.click_event, function(){
                $(this).prev().focus();
            });
        }
        $(document).ready(function(){
            setTimePicker('day-from');
            setTimePicker('day-to');
            setTimePicker('night-from');
            setTimePicker('night-to');
        });
    </script>
@endsection
