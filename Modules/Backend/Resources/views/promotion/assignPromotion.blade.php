@extends('backend::layouts.master')
@section('content')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">Promotion</a>
            </li>
            @if(isset($promotion))
                <li class="active">Edit</li>
            @else
                <li class="active">Register</li>
            @endif
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
            @if(isset($promotion))
                <h3 class="header smaller lighter blue">Edit Promotion</h3>
            @else
                <h3 class="header smaller lighter blue">Create Promotion</h3>
            @endif
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="widget-box">
                <div class="widget-body">
                    <div class="widget-main">
                        <form method="post" @if(isset($promotion)) action={{url('/admin/promotion/edit')}} @else  action={{url('/admin/promotion/assign')}} @endif>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(isset($promotion)) <input type="hidden" name="id" value="{!! $promotion->id !!}"> @endif
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="clearfix">

                                        <label class="bolder blue" for="username">Code: </label>
                                        <div class="control-group">
                                            <input class="form-control" id="code" name="code" required placeholder="Code" style="width:100%;" @if(isset($promotion)) value="{!! $promotion->code !!}" @endif>
                                            @if($errors->has('code'))
                                                <p style="color:red">{!! $errors->first('code') !!}</p>
                                            @endif
                                        </div>

                                        <label class="bolder blue" for="shop">Shop: </label>
                                        <div class="control-group">
                                            <select class="form-control" id="shop" name="shop">
                                                @if(isset($shops))
                                                    @foreach($shops as $shop)
                                                        <option @if(old('shop')== $shop->id) selected @endif value="{!! $shop->id !!}" @if( isset($promotion) && ($promotion->shop_id == $shop->id)  ) selected @endif>{!! $shop->business_name !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('shop'))
                                                <p style="color:red">{!! $errors->first('shop') !!}</p>
                                            @endif
                                        </div>

                                        <label class="bolder blue" for="start-date">Start Date: </label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control date-picker" required style="width:100%" id="start-date" name="start_date" type="text" placeholder="Start Date" @if(isset($promotion)) value="{!! $promotion->start_date !!}" @elseif(old('start_date')!= null) value="{!! old('start_date') !!}"  @endif data-date-format="mm-dd-yyyy">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar bigger-110"></i>
                                                    </span>
                                                    @if($errors->has('start_date'))
                                                        <p style="color:red">{!! $errors->first('start_date') !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <label class="bolder blue" for="end-date">End Date: </label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control date-picker" required style="width:100%" id="end-date" name="end_date" type="text" placeholder="End Date" @if(isset($promotion)) value="{!! $promotion->end_date !!}"  @elseif(old('end_date')!= null) value="{!! old('end_date') !!}"  @endif data-date-format="mm-dd-yyyy">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar bigger-110"></i>
                                                    </span>
                                                    @if($errors->has('end_date'))
                                                        <p style="color:red">{!! $errors->first('end_date') !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="bolder blue" for="massage-id">Assign promotion to </label>
                                            <select class="form-control" id="massage-id" name="massage_id">
                                                @if(isset($messages))
                                                    @foreach($messages as $m)
                                                        <option @if(old('massage_id')== $m->id) selected @endif value="{!! $m->id !!}"  @if(isset($promotion)) @if($promotion->item_type == $m->id) selected @endif @endif>{!! $m->name_eng !!}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            @if($errors->has('massage_id'))
                                                <p style="color:red">{!! $errors->first('massage_id') !!}</p>
                                            @endif
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label bolder blue">Discount Type</label>

                                            <div class="radio">
                                                <label>
                                                    <input id="type1" name="discount_type" value="1" required @if(old('discount_type')== 1) checked @endif
                                                                type="radio" @if(isset($promotion) && ($promotion->discount_type == 1) ) checked @endif class="ace" />
                                                    <span class="lbl">Percentage</span>
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input id="type2" name="discount_type" value="2" required @if(old('discount_type')== 2) checked @endif
                                                    type="radio" @if(isset($promotion) && ($promotion->discount_type == 2) )  checked  @endif class="ace" />
                                                    <span class="lbl">Absolute Value</span>
                                                </label>
                                            </div>
                                            @if($errors->has('discount_type'))
                                                <p style="color:red">{!! $errors->first('discount_type') !!}</p>
                                            @endif
                                        </div>

                                        <div id="discount1" @if(old('discount_rate')!= null || (isset($promotion) && ($promotion->discount_type == 1) ) ) style="display: block"
                                                    @elseif( !isset($promotion->discount_rate) )style="display: none"
                                                @endif>
                                            <label class="bolder blue" for="username">Discount Rate: </label>
                                            <div class="input-group">
                                            <span class="input-group-addon" >
                                                <i class="fa fa-percent"></i>
                                            </span>
                                                <input class="form-control" id="discount-rate" name="discount_rate"  placeholder="Discount Rate" @if( isset($promotion) && ($promotion->discount_type == 1) ) value="{!! $promotion->rate !!}" @elseif(old('discount_rate')!= null) value="{!! old('discount_rate') !!}"  @endif style="width:100%;">
                                            </div>
                                            @if($errors->has('discount_rate'))
                                                <p style="color:red">{!! $errors->first('discount_rate') !!}</p>
                                            @endif
                                    </div>

                                    <div id="discount2" @if(old('discount_flat_rate')!= null || (isset($promotion) && ($promotion->discount_type == 2) ) ) style="display: block"
                                            @elseif( !isset($promotion->discount_flat_rate) )style="display: none"
                                            @endif
                                    >
                                        <label class="bolder blue" for="username">Discount Flat Rate: </label>
                                        <div class="input-group">
                                        <span class="input-group-addon" >
                                            <i class="fa fa-usd"></i>
                                        </span>
                                            <input class="form-control" id="discount-flat-rate" name="discount_flat_rate" placeholder="Discount Flat Rate" @if( isset($promotion) && ($promotion->discount_type == 2) ) value="{!! $promotion->rate !!}" @elseif(old('discount_flat_rate')!= null) value="{!! old('discount_flat_rate') !!}"   @endif style="width:100%;">
                                        </div>
                                        @if($errors->has('discount_flat_rate'))
                                            <p style="color:red">{!! $errors->first('discount_flat_rate') !!}</p>
                                        @endif
                                    </div>
                                    <hr>
                                    <button class="btn btn-primary">Save</button>
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
    <script>
        $('#start-date').datepicker({
            autoclose: true,
            todayHighlight: true
        })
        //show datepicker when clicking on the icon
            .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        $('#end-date').datepicker({
            autoclose: true,
            todayHighlight: true
        })
        //show datepicker when clicking on the icon
            .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        //validate End date
        $('#end-date').on('change',function() {
            var start = $('#start-date').val();
            var end   = $('#end-date').val();
            if( new Date(end) <= new Date(start))
            {
                alert('You cannot choose End Date smaller than Start Date');
                $('#end-date').val('');
                $('#end-date').focus();
            }
            $('#end-date').datepicker( 'option', 'dateFormat', 'yy-mm-dd' );
        });

        //validate Start date
        $('#start-date').on('change',function() {
            var start = $('#start-date').val();
            var end   = $('#end-date').val();
            if( new Date(end) <= new Date(start))
            {
                alert('You cannot choose Start Date bigger than End Date');
                $('#end-date').val('');
                $('#end-date').focus();
            }
            $('#start-date').datepicker( 'option', 'dateFormat', 'yy-mm-dd' );
        });

        $('#type1').on('click', function () {
            $('#discount2').hide();
            $('#discount1').show();
            $('#discount-flat-rate').attr('value','');
            $('#discount-rate').prop('required',true);
        });
        $('#type2').on('click', function () {
            $('#discount1').hide();
            $('#discount2').show();
            $('#discount-rate').attr('value','');
            $('#discount-flat-rate').prop('required',true);
        });
    </script>
@endsection