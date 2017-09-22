@extends('backend::layouts.master')
@section('content')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">Room</a>
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
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            @if(!isset($room))
                <h3 class="header smaller lighter blue">Add new Room</h3>
            @else
                <h3 class="header smaller lighter blue">Edit Room Information</h3>
            @endif
                <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="widget-box" style="border: 0">
                <form method="post"

                @if(!isset($room))
                    action={{url('/admin/room/create')}}
                @else
                    action={{url('/admin/room/edit')}}
                @endif

                >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(isset($room))
                        <input type="hidden" name="id" value="{!! $room->id !!}">
                    @endif
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="clearfix">
                                <label class="bolder blue"  for="shop">Shop: </label>
                                <div class="control-group">
                                    <select class="form-control" required id="shop" name="shop">
                                        <option value="">Choose a shop</option>
                                        @if($shops != null)
                                            @foreach($shops as $shop)
                                                <option @if(old('shop')== $shop->id) selected @endif
                                                        @if(isset($room) && $room->shop_id == $shop->id) selected @endif
                                                        value="{!! $shop->id !!}">{!! $shop->business_name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('shop'))
                                        <p style="color:red">{!! $errors->first('shop') !!}</p>
                                    @endif
                                </div>

                                <label class="bolder blue"  for="room-number">Room Number: </label>
                                <div class="control-group">
                                    <input class="form-control" @if(isset($room)) value="{!! $room->number !!}"
                                           @elseif(old('room_number')!=null) value="{!! old('room_number') !!}" @endif required id="room-number" name="room_number" placeholder="Enter Room Number" style="width:100%;">
                                    @if($errors->has('room_number'))
                                        <p style="color:red">{!! $errors->first('room_number') !!}</p>
                                    @endif
                                </div>

                                <label class="bolder blue"  for="room-name">Room Name: </label>
                                <div class="control-group">
                                    <input class="form-control" @if(isset($room)) value="{!! $room->name !!}"
                                           @elseif(old('room_number')!=null) value="{!! old('room_name') !!}" @endif required id="room-name" name="room_name" placeholder="Enter Room Name" style="width:100%;">
                                    @if($errors->has('room_name'))
                                        <p style="color:red">{!! $errors->first('room_name') !!}</p>
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
        <div class="col-sm-3"></div>
    </div>
@endsection