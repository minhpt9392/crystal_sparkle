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
            <li class="active">Refund</li>
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
            <h3 class="header smaller lighter blue">Refund Package</h3>
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="widget-box">
                <form method="post" @if(!isset($package)) action={{url('/admin/package/refund')}}
                                    @else action={{url('/admin/package/list-refund/edit')}}
                                    @endif
                >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(isset($package))
                        <input type="hidden" name="id" id="id" value="{!! $package->id !!}">
                    @endif
                    <div class="widget-body">
                        <div class="widget-main">

                            <label class="bolder blue"  for="type">Package type</label>
                            <div class="control-group">
                                <select class="form-control" id="type" name="type">
                                    @if(isset($packages))
                                        @foreach($packages as $p)
                                            <option @if(old('type')==$p->id  || (isset($package) && $package->package_id == $p->id )) selected @endif id="package{!! $p->id !!}" value="{!! $p->id !!}">{!! $p->name !!}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->has('type'))
                                    <p style="color:red">{!! $errors->first('type') !!}</p>
                                @endif
                            </div>

                            <label class="bolder blue" for="purchase-date">Purchase Date</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control date-picker" @if(old('purchase_date') != null) value="{!! old('purchase_date') !!}"
                                               @elseif(isset($package)) value="{!! $package->purchase_date !!}" @endif
                                               required style="width:100%" id="purchase-date" name="purchase_date" type="text" data-date-format="mm-dd-yyyy">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar bigger-110"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('purchase_date'))
                                        <p style="color:red">{!! $errors->first('purchase_date') !!}</p>
                                    @endif
                                </div>
                            </div>

                            <label class="bolder blue" for="purchase-price">Purchase Price</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control" style="width:100%" @if(old('purchase_price') != null) value="{!! old('purchase_date') !!}"
                                               @elseif(isset($package)) value="{!! $package->purchase_price !!}" @endif
                                               required id="purchase-price" name="purchase_price" type="text" placeholder="5.000">
                                        <span class="input-group-addon">
                                            <i class="fa fa-usd bigger-110"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('purchase_price'))
                                        <p style="color:red">{!! $errors->first('purchase_price') !!}</p>
                                    @endif
                                </div>
                            </div>

                            <label class="bolder blue" for="number-section">Number of Sections</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control" style="width:100%"  @if(old('number_section') != null) value="{!! old('number_section') !!}"
                                               @elseif(isset($package)) value="{!! $package->section !!}" @endif
                                               required id="number-section" name="number_section" type="text" placeholder="5.000">
                                        <span class="input-group-addon">
                                            <i class="fa fa-hashtag"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('number_section'))
                                        <p style="color:red">{!! $errors->first('number_section') !!}</p>
                                    @endif
                                </div>
                            </div>

                            <label class="bolder blue"  for="number-section-used">Number of Sections Used</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control" style="width:100%"  @if(old('number_section_used') != null) value="{!! old('number_section_used') !!}"
                                               @elseif(isset($package)) value="{!! $package->section_used !!}" @endif
                                               required id="number-section-used" name="number_section_used" type="text" placeholder="5.000">
                                        <span class="input-group-addon">
                                            <i class="fa fa-hashtag"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('number_section_used'))
                                        <p style="color:red">{!! $errors->first('number_section_used') !!}</p>
                                    @endif
                                </div>
                            </div>

                            <label class="bolder blue"  for="refund-amount">Refund amount</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control" style="width:100%"  @if(old('refund_amount') != null) value="{!! old('refund_amount') !!}"
                                               @elseif(isset($package)) value="{!! $package->refund_amount !!}" @endif
                                               required id="refund-amount" name="refund_amount" type="text" placeholder="5.000">
                                        <span class="input-group-addon">
                                            <i class="fa fa-usd"></i>
                                        </span>
                                    </div>
                                    @if($errors->has('refund_amount'))
                                        <p style="color:red">{!! $errors->first('refund_amount') !!}</p>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <label class="bolder blue" for="reason">Reason</label>
                                <textarea id="reason" required  name="reason" class="autosize-transition form-control"> @if(old('reason') != null) {!! old('reason') !!}
                                    @elseif(isset($package)) {!! $package->reason !!} @endif
                                               </textarea>
                                @if($errors->has('reason'))
                                    <p style="color:red">{!! $errors->first('reason') !!}</p>
                                @endif
                            </div>

                            <label class="bolder blue" for="method">Refund method:</label>
                            <div class="control-group">
                                <select class="form-control" id="method" name="method">
                                    <option @if( old('method')==1 || (isset($package) && $package->method == 1 ) ) selected @endif  value="1">Cash</option>
                                    <option @if( old('method')==2 || (isset($package) && $package->method == 2 ) ) selected @endif  value="2">Check</option>
                                    <option @if( old('method')==3 || (isset($package) && $package->method == 3 ) ) selected @endif  value="3">Bank Transfer</option>
                                </select>
                                @if($errors->has('method'))
                                    <p style="color:red">{!! $errors->first('method') !!}</p>
                                @endif
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
@endsection
@section('scripts')
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