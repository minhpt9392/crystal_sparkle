@extends('layouts.navbarMenuAdmin')
@section('content')
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3" style="padding-bottom: 50px">
            <h1>Add Package</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Create new package type:
                    </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <form method="post" action={{url('/admin/add-package-type')}}>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="clearfix">

                                        <label class="bolder blue"  for="name">Name: </label>
                                        <div class="control-group">
                                            <input class="form-control" value="{!! old('name') !!}" required id="name" name="name" placeholder="Name" style="width:100%;">
                                            @if($errors->has('name'))
                                                <p style="color:red">{!! $errors->first('name') !!}</p>
                                            @endif
                                        </div>


                                        <label class="bolder blue"  for="type">Item type:</label>
                                        <div class="control-group">
                                            <select class="form-control" id="type" name="type">
                                                <option @if(old('type')==1 ) selected @endif value="1">Service Quantity</option>
                                                <option @if(old('type')==2 ) selected @endif value="2">Monetary Value</option>
                                            </select>
                                            @if($errors->has('type'))
                                                <p style="color:red">{!! $errors->first('type') !!}</p>
                                            @endif
                                        </div>


                                        <label class="bolder blue"  for="price">Price:</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control"  value="{!! old('price') !!}" required style="width:100%" id="price" name="price" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('price'))
                                                    <p style="color:red">{!! $errors->first('price') !!}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="bonus-price">Bonus Value:</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control"  value="{!! old('bonus_price') !!}" required style="width:100%" id="bonus-price" name="bonus_price" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('bonus_price'))
                                                    <p style="color:red">{!! $errors->first('bonus_price') !!}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <label class="bolder blue"  for="period">Validity time period(year):</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" value="{!! old('period') !!}" required style="width:100%" id="period" name="period" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        @if($errors->has('period'))
                                            <p style="color:red">{!! $errors->first('period') !!}</p>
                                        @endif

                                        <label class="bolder blue" for="commission">Commission amount:</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" value="{!! old('commission') !!}" required style="width:100%" id="commission" name="commission" type="text" placeholder="5.000">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-usd bigger-110"></i>
                                                    </span>
                                                </div>
                                                @if($errors->has('commission'))
                                                    <p style="color:red">{!! $errors->first('commission') !!}</p>
                                                @endif
                                            </div>
                                        </div>

                                        <label class="bolder blue" for="range">Package range:</label>
                                        <div class="control-group">
                                            <select class="form-control" id="range" name="range">
                                                <option @if( old('range') == 1 ) selected @endif value="1">Global</option>
                                                <option @if( old('range') == 2 ) selected @endif value="2">Instance</option>
                                            </select>
                                        </div>
                                        @if($errors->has('range'))
                                            <p style="color:red">{!! $errors->first('range') !!}</p>
                                        @endif
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