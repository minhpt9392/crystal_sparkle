@extends('layouts.navbarMenuAdmin')
@section('content')
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Refund Package
                    </h4>
                </div>
                <form method="post" action={{url('/admin/refund-package')}}>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="widget-body">
                        <div class="widget-main">

                            <label class="bolder blue"  for="type">Package type</label>
                            <div class="control-group">
                                <select class="form-control" id="type" name="type">
                                    @if(isset($packages))
                                        @foreach($packages as $p)
                                            <option id="package{!! $p->id !!}" value="{!! $p->id !!}">{!! $p->name !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <label class="bolder blue" for="purchase-date">Purchase Date</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control date-picker" style="width:100%" id="purchase-date" name="purchase_date" type="text" data-date-format="dd-mm-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <label class="bolder blue" for="purchase-price">Purchase Price</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control" style="width:100%" id="purchase-price" name="purchase_price" type="text" placeholder="5.000">
                                        <span class="input-group-addon">
                                            <i class="fa fa-usd bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <label class="bolder blue" for="number-section">Number of Sections</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control" style="width:100%" id="number-section" name="number_section" type="text" placeholder="5.000">
                                        <span class="input-group-addon">
                                            <i class="fa fa-hashtag"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <label class="bolder blue"  for="number-section-used">Number of Sections Used</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control" style="width:100%" id="number-section-used" name="number_section_used" type="text" placeholder="5.000">
                                        <span class="input-group-addon">
                                            <i class="fa fa-hashtag"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <label class="bolder blue"  for="refund-amount">Refund amount</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control" style="width:100%" id="refund-amount" name="refund_amount" type="text" placeholder="5.000">
                                        <span class="input-group-addon">
                                            <i class="fa fa-usd"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label class="bolder blue" for="reason">Reason</label>
                                <textarea id="reason" name="reason" class="autosize-transition form-control"></textarea>
                            </div>

                            <label class="bolder blue" for="method">Refund method:</label>
                            <div class="control-group">
                                <select class="form-control" id="method" name="method">
                                    <option value="1">Cash</option>
                                    <option value="2">Check</option>
                                    <option value="2">Bank Transfer</option>
                                </select>
                            </div>
                            <hr>
                            <button class="btn btn-primary">Add</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <script>
        $('#purchase-date').datepicker({
            autoclose: true,
            todayHighlight: true
        })
        //show datepicker when clicking on the icon
            .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        $('#purchase-date').on('change',function() {
            $('#purchase-date').datepicker( 'option', 'dateFormat', 'yy-mm-dd' );
        });
    </script>
@endsection