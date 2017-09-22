@extends('layouts.navbarMenuAdmin')
@section('content')
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3" style="padding-bottom: 50px">
            @if(isset($promotion))
                <h1>Edit Promotion</h1>
            @else
                <h1>Assign Promotion</h1>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="widget-box">
                <div class="widget-header">
                    @if(isset($promotion))
                        <h4 class="widget-title">
                            Edit Promotion
                        </h4>
                    @else
                        <h4 class="widget-title">
                            Assign Promotion
                        </h4>
                    @endif
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <form method="post" @if(isset($promotion)) action={{url('/admin/edit-promotion')}} @else  action={{url('/admin/assign-promotion')}} @endif>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(isset($promotion)) <input type="hidden" name="id" value="{!! $promotion->id !!}"> @endif
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="clearfix">

                                        <label class="bolder blue" for="username">Code: </label>
                                        <div class="control-group">
                                            <input class="form-control" value="{!! old('code') !!}" id="code" name="code" required placeholder="Code" style="width:100%;" @if(isset($promotion)) value="{!! $promotion->code !!} @endif">
                                            @if($errors->has('code'))
                                                <p style="color:red">{!! $errors->first('code') !!}</p>
                                            @endif
                                        </div>

                                        <label class="bolder blue" for="shop">Shop: </label>
                                        <div class="control-group">
                                            <select class="form-control" id="shop" name="shop">
                                                @if(isset($shops))
                                                    @foreach($shops as $shop)
                                                        <option @if(old('shop')== $shop->id) selected @endif value="{!! $shop->id !!}" @if(isset($promotion)) @if($promotion->shop_id == $shop->id) selected @endif @endif>{!! $shop->business_name !!}</option>
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
                                                    <input class="form-control date-picker" value="{!! old('start_date') !!}" required style="width:100%" id="start-date" name="start_date" type="text" placeholder="Start Date" @if(isset($promotion)) value="{!! $promotion->start_date !!}" @endif data-date-format="dd-mm-yyyy">
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
                                                    <input class="form-control date-picker" value="{!! old('end_date') !!}"  required style="width:100%" id="end-date" name="end_date" type="text" placeholder="End Date" @if(isset($promotion)) value="{!! $promotion->end_date !!}" @endif data-date-format="dd-mm-yyyy">
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
                                                                type="radio" @if(isset($promotion)) @if($promotion->discount_type == 1) checked @endif @endif class="ace" />
                                                    <span class="lbl">Percentage</span>
                                                </label>
                                            </div>

                                            <div class="radio">
                                                <label>
                                                    <input id="type2" name="discount_type" value="2" required @if(old('discount_type')== 2) checked @endif
                                                    type="radio" @if(isset($promotion)) @if($promotion->discount_type == 2) checked @endif @endif class="ace" />
                                                    <span class="lbl">Absolute Value</span>
                                                </label>
                                            </div>
                                            @if($errors->has('discount_type'))
                                                <p style="color:red">{!! $errors->first('discount_type') !!}</p>
                                            @endif
                                        </div>

                                        <div id="discount1" @if( (isset($promotion) && $promotion->discount_type == 2 )
                                                            || ( !isset($promotion) ) ) style="display: none" @endif
                                                            @if($errors->has('discount_rate')) style="display: block" @endif>
                                            <label class="bolder blue" for="username">Discount Rate: </label>
                                            <div class="input-group">
                                            <span class="input-group-addon" >
                                                <i class="fa fa-percent"></i>
                                            </span>
                                                <input class="form-control" value="{!! old('discount_rate') !!}"  id="discount-rate" name="discount_rate"  placeholder="Discount Rate" @if(isset($promotion))  @if($promotion->discount_type == 1) value="{!! $promotion->rate !!}" @endif @endif style="width:100%;">
                                            </div>
                                            @if($errors->has('discount_rate'))
                                                <p style="color:red">{!! $errors->first('discount_rate') !!}</p>
                                            @endif
                                        </div>

                                        <div id="discount2" @if( (isset($promotion) && $promotion->discount_type == 1 )
                                                            || ( !isset($promotion) ) ) style="display: none" @endif
                                                            @if($errors->has('discount_flat_rate')) style="display: block" @endif>
                                            <label class="bolder blue" for="username">Discount Flat Rate: </label>
                                            <div class="input-group">
                                            <span class="input-group-addon" >
                                                <i class="fa fa-usd"></i>
                                            </span>
                                                <input class="form-control" value="{!! old('discount_flat_rate') !!}"  id="discount-flat-rate" name="discount_flat_rate" placeholder="Discount Flat Rate" @if(isset($promotion)) @if($promotion->discount_type == 2) value="{!! $promotion->rate !!}" @endif  @endif style="width:100%;">
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
    <script src="{{asset('js/myjs2.js')}}"></script>
    <script type="text/javascript">
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
            var end = $('#end-date').val();
            if( new Date(end) <= new Date(start))
            {
                alert('You cannot choose End Date smaller than Start Date');
                var date = $('#start-date').datepicker('getDate');
                date.setTime(date.getTime() + (1000*60*60*24));
                $('#end-date').datepicker("setDate", date);
            }
            $('#end-date').datepicker( 'option', 'dateFormat', 'yy-mm-dd' );
        });

        //validate Start date
        $('#start-date').on('change',function() {
            var start = $('#start-date').val();
            var end = $('#end-date').val();
            if( new Date(end) <= new Date(start))
            {
                alert('You cannot choose Start Date bigger than End Date');
                var date = $('#start-date').datepicker('getDate');
                date.setTime(date.getTime() + (1000*60*60*24));
                $('#end-date').datepicker("setDate", date);
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