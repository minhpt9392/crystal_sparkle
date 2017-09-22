@extends('backend::layouts.master')
@section('content')

    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">Packages Type</a>
            </li>
            <li class="active">Register</li>
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
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <h3 class="header smaller lighter blue">Register Sale of Package</h3>
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="widget-box">
                <div class="widget-body">
                    <div class="widget-main">
                        <form method="post" action={{url('/admin/package/register')}}>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="clearfix">

                                        <label class="bolder blue"  for="type">Customer</label>
                                        <div class="control-group">
                                            <select class="form-control" id="customer" required name="customer">
                                                @if(isset($customers))
                                                    @foreach($customers as $c)
                                                        <option @if(old('customer')==$c->id ) selected @endif value="{!! $c->id !!}">{!! $c->name !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('customer'))
                                                <p style="color:red">{!! $errors->first('customer') !!}</p>
                                            @endif
                                        </div>

                                        <label class="bolder blue"  for="type">Package type</label>
                                        <div class="control-group">
                                            <select class="form-control" onchange="getInfoPackage()" required id="type" name="type">
                                                @if(isset($package))
                                                    @foreach($package as $p)
                                                        <option @if(old('type')==$p->id ) selected @endif id="package{!! $p->id !!}" value="{!! $p->id !!}">{!! $p->name !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('type'))
                                                <p style="color:red">{!! $errors->first('type') !!}</p>
                                            @endif
                                        </div>

                                        <label class="bolder blue"  for="shop">Start Date</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control date-picker" required style="width:100%"  value="{!! old('start_date') !!}"
                                                           id="start-date" name="start_date" type="text" placeholder="Start Date" data-date-format="mm-dd-yyyy">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('start_date'))
                                                    <p style="color:red">{!! $errors->first('start_date') !!}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">Expired Date</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" style="width:100%" value="{!! old('expried') !!}"
                                                           id="expried" name="expried" type="text" readonly>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar bigger-110"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="type">Sale Attributed to</label>
                                        <div class="control-group">
                                            <select class="form-control" required id="sale" name="sale">
                                                @if(isset($salers))
                                                    @foreach($salers as $saler)
                                                        <option @if(old('sale')==$saler->id ) selected @endif value="{!! $saler->id !!}">{!! $saler->NICK !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('sale'))
                                                <p style="color:red">{!! $errors->first('sale') !!}</p>
                                            @endif
                                        </div>

                                        <label class="bolder blue"  for="type">Sale Entered by</label>
                                        <div class="control-group">
                                            <select class="form-control" required id="therapist" name="therapist">
                                                @if(isset($therapist))
                                                    @foreach($therapist as $the)
                                                        <option @if(old('therapist')==$the->id ) selected @endif value="{!! $the->id !!}">{!! $the->NICK !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('therapist'))
                                                <p style="color:red">{!! $errors->first('therapist') !!}</p>
                                            @endif
                                        </div>

                                        <label class="bolder blue"  for="price">Cash Paid</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" required style="width:100%"  value="{!! old('cash') !!}"
                                                           id="cash" name="cash" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('cash'))
                                                    <p style="color:red">{!! $errors->first('cash') !!}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">NETS Paid</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" required style="width:100%"  value="{!! old('nets') !!}"
                                                           id="nets" name="nets" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('nets'))
                                                    <p style="color:red">{!! $errors->first('nets') !!}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">Credit Card Paid</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" required style="width:100%" value="{!! old('credit_card') !!}"
                                                           id="credit-card" name="credit_card" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('credit_card'))
                                                    <p style="color:red">{!! $errors->first('credit_card') !!}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">Start Prepaid Value</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" required style="width:100%" value="{!! old('start_prepaid') !!}"
                                                           id="start-prepaid" name="start_prepaid" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('start_prepaid'))
                                                    <p style="color:red">{!! $errors->first('start_prepaid') !!}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">Bonus Value</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" required style="width:100%" value="{!! old('bonus_value') !!}"
                                                           id="bonus-value" name="bonus_value" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('bonus_value'))
                                                    <p style="color:red">{!! $errors->first('bonus_value') !!}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">Balance Bonus Value</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" required style="width:100%"  value="{!! old('balance_bonus_value') !!}"
                                                           id="balance-bonus-value" name="balance_bonus_value" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('balance_bonus_value'))
                                                    <p style="color:red">{!! $errors->first('balance_bonus_value') !!}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <button class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/myjs2.js') }}"></script>
    <script>
        $('#start-date').datepicker({
            autoclose: true,
            todayHighlight: true
        })
        //show datepicker when clicking on the icon
            .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });

        $('#start-date').on('change',function() {
            getTimePeriod();
        });
        $(document).ready(function(){
            getInfoPackage();
        });
    </script>
@endsection