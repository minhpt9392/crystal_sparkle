@extends('backend::layouts.master')
@section('content')

    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li class="active">Payment Schemes</li>
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
        <div class="col-sm-offset-1 col-sm-3">
            <div class="widget-box" style="border: 0">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Monthly
                    </h4>
                </div>
                {{--<form method="post" action={{url('/admin/refund-package')}}>--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="widget-body" >
                        <div class="widget-main" >

                            <label class="bolder blue" for="set-day">Day of payment</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control date-picker" style="width:100%" id="set-day" name="set_day" type="text" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" onclick="setPaymentMonthly()">Set day</button>
                        </div>
                    </div>
                {{--</form>--}}
            </div>
        </div>

        <div class="col-sm-3">
            <div class="widget-box" style="border: 0">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Bi-Monthly
                    </h4>
                </div>
                {{--<form method="post" action={{url('/admin/refund-package')}}>--}}
                    <div class="widget-body" >
                        <div class="widget-main">

                            <label class="bolder blue" for="set-day-2-1">Day of payment 1</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control date-picker" style="width:100%" id="set-day-2-1" name="set_day_2_1" type="text" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <label class="bolder blue" for="set-day-2-2">Day of payment 2</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control date-picker" style="width:100%" id="set-day-2-2" name="set_day_2_2" type="text" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" onclick="setPaymentBiMonthly()">Set day</button>
                        </div>
                    </div>
                {{--</form>--}}
            </div>
        </div>

        <div class="col-sm-3">
            <div class="widget-box" style="border: 0">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Tri-Monthly
                    </h4>
                </div>
                {{--<form method="post" action={{url('/admin/refund-package')}}>--}}
                    <div class="widget-body" >
                        <div class="widget-main">

                            <label class="bolder blue" for="set-day-3-1">Day of payment 1</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control date-picker" style="width:100%" id="set-day-3-1" name="set_day_3_1" type="text" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <label class="bolder blue" for="set-day-3-2">Day of payment 2</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control date-picker" style="width:100%" id="set-day-3-2" name="set_day_3_2" type="text" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <label class="bolder blue" for="set-day-3-3">Day of payment 3</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control date-picker" style="width:100%" id="set-day-3-3" name="set_day_3_3" type="text" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" onclick="setPaymentTriMonthly()">Set day</button>
                        </div>
                    </div>
                {{--</form>--}}
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('js/myjs2.js') }}"></script>
    <script>
        function setdatepicker(id)
        {
            $('#'+id).datepicker({
                autoclose: true,
                todayHighlight: true
            })
            //show datepicker when clicking on the icon
                .next().on(ace.click_event, function(){
                $(this).prev().focus();
            });
            $('#'+id).on('change',function() {
                $('#'+id).datepicker( 'option', 'dateFormat', 'yy-mm-dd' );
            });
        }
        $(document).ready(function(){
            setdatepicker('set-day');
            setdatepicker('set-day-2-1');
            setdatepicker('set-day-2-2');
            setdatepicker('set-day-3-1');
            setdatepicker('set-day-3-2');
            setdatepicker('set-day-3-3');
        });
    </script>
@endsection

