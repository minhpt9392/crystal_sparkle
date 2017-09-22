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
            <li class="active">Create</li>
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
            @if(!isset($packageType))
                <h3 class="header smaller lighter blue">Create new package type</h3>
            @else
                <h3 class="header smaller lighter blue">Edit package type</h3>
            @endif
            <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="widget-box">
                <div class="widget-body">
                    <div class="widget-main">
                        <form method="post" @if(!isset($packageType))
                                                action={{url('/admin/package/create-type')}}
                                            @else
                                                action={{url('/admin/package/type/edit')}}
                                            @endif >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            @if(isset($packageType))
                                <input type="hidden" name="id" value="{!! $packageType->id !!}">
                            @endif

                            <div class="widget-body">
                                <div class="widget-main">
                                    <div class="clearfix">

                                        <label class="bolder blue"  for="name">Name: </label>
                                        <div class="control-group">
                                            <input class="form-control" @if(isset($packageType)) value="{!! $packageType->name !!}"
                                                   @elseif((old('name') != null)) value="{!! old('name') !!}" @endif
                                                   required id="name" name="name" placeholder="Name" style="width:100%;">
                                            @if($errors->has('name'))
                                                <p style="color:red">{!! $errors->first('name') !!}</p>
                                            @endif
                                        </div>


                                        <label class="bolder blue"  for="type">Item type:</label>
                                        <div class="control-group">
                                            <select class="form-control" id="type" name="type">
                                                <option @if( (old('type')==1) || ( isset($packageType) && $packageType->type == 1) ) selected @endif
                                                    value="1">Service Quantity</option>
                                                <option @if( (old('type')==2) || ( isset($packageType) && $packageType->type == 2) ) selected @endif
                                                    value="2">Monetary Value</option>
                                            </select>
                                            @if($errors->has('type'))
                                                <p style="color:red">{!! $errors->first('type') !!}</p>
                                            @endif
                                        </div>


                                        <label class="bolder blue"  for="price">Price:</label>
                                        <div class="row">
                                            <div class="col-xs-8 col-sm-11">
                                                <div class="input-group">
                                                    <input class="form-control" @if(isset($packageType)) value="{!! $packageType->price !!}"
                                                           @elseif((old('price') != null)) value="{!! old('price') !!}" @endif
                                                           required style="width:100%" id="price" name="price" type="text" placeholder="5.000">
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
                                                    <input class="form-control" @if(isset($packageType)) value="{!! $packageType->bonus_value !!}"
                                                           @elseif((old('bonus_price') != null)) value="{!! old('bonus_price') !!}" @endif
                                                           required style="width:100%" id="bonus-price" name="bonus_price" type="text" placeholder="5.000">
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
                                                    <input class="form-control" @if(isset($packageType)) value="{!! $packageType->time_period !!}"
                                                           @elseif((old('period') != null)) value="{!! old('period') !!}" @endif
                                                           required style="width:100%" id="period" name="period" type="text">
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
                                                    <input class="form-control" @if(isset($packageType)) value="{!! $packageType->commission !!}"
                                                           @elseif((old('commission') != null)) value="{!! old('commission') !!}" @endif
                                                           required style="width:100%" id="commission" name="commission" type="text" placeholder="5.000">
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
                                                <option @if( (old('range') == 1) || ( isset($packageType) && $packageType->package_range == 1) ) selected @endif value="1">Global</option>
                                                <option @if( (old('range') == 2) || ( isset($packageType) && $packageType->package_range == 2) ) selected @endif value="2">Instance</option>
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