@extends('layouts.navbarMenuAdmin')
@section('content')
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3" style="padding-bottom: 50px">
            <h1>Register Sale of Package</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Register Sale of Package
                    </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <form method="post" action={{url('/admin/register-package')}}>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="clearfix">

                                        <label class="bolder blue"  for="type">Customer</label>
                                        <div class="control-group">
                                            <select class="form-control" id="customer" name="customer">
                                                @if(isset($customers))
                                                    @foreach($customers as $c)
                                                        <option value="{!! $c->id !!}">{!! $c->name !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <label class="bolder blue"  for="type">Package type</label>
                                        <div class="control-group">
                                            <select class="form-control" onchange="getInfoPackage()" id="type" name="type">
                                                @if(isset($package))
                                                    @foreach($package as $p)
                                                        <option id="package{!! $p->id !!}" value="{!! $p->id !!}">{!! $p->name !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <label class="bolder blue"  for="shop">Start Date</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control date-picker" style="width:100%" id="start-date" name="start_date" type="text" placeholder="Start Date" data-date-format="dd-mm-yyyy">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar bigger-110"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">Expired Date</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" style="width:100%" id="expried" name="expried" type="text" readonly>
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar bigger-110"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="type">Sale Attributed to</label>
                                        <div class="control-group">
                                            <select class="form-control" id="saler" name="saler">
                                                @if(isset($salers))
                                                    @foreach($salers as $saler)
                                                        <option value="{!! $saler->id !!}">{!! $saler->NICK !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <label class="bolder blue"  for="type">Sale Entered by</label>
                                        <div class="control-group">
                                            <select class="form-control" id="therapist" name="therapist">
                                                @if(isset($therapist))
                                                    @foreach($therapist as $the)
                                                        <option value="{!! $the->id !!}">{!! $the->NICK !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>

                                        <label class="bolder blue"  for="price">Cash Paid</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" style="width:100%" id="cash" name="cash" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">NETS Paid</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" style="width:100%" id="nets" name="nets" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">Credit Card Paid</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" style="width:100%" id="credit-card" name="credit_card" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">Start Prepaid Value</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" style="width:100%" id="start-prepaid" name="start_prepaid" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>


                                        <label class="bolder blue"  for="price">Bonus Value</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" style="width:100%" id="bonus-value" name="bonus_value" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="price">Balance Bonus Value</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" style="width:100%" id="balance-bonus-value" name="balance_bonus_value" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
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