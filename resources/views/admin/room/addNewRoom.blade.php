@extends('layouts.navbarMenuAdmin')
@section('content')
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3" style="padding-bottom: 50px">
            <h1>Add new Room</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="widget-box" style="border: 0">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Add New Room
                    </h4>
                </div>
                <form method="post" action={{url('/admin/add-new-room')}}>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="widget-body" >
                        <div class="widget-main">
                            <div class="clearfix">
                                <label class="bolder blue"  for="shop">Shop: </label>
                                <div class="control-group">
                                    <select class="form-control" required id="shop" name="shop">
                                        <option value="">Choose a shop</option>
                                        @if($shops != null)
                                            @foreach($shops as $shop)
                                                <option @if(old('shop')== $shop->id) selected @endif value="{!! $shop->id !!}">{!! $shop->business_name !!}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @if($errors->has('shop'))
                                        <p style="color:red">{!! $errors->first('shop') !!}</p>
                                    @endif
                                </div>

                                <label class="bolder blue"  for="room-number">Room Number: </label>
                                <div class="control-group">
                                    <input class="form-control" value="{!! old('room_number') !!}" required id="room-number" name="room_number" placeholder="Enter Room Number" style="width:100%;">
                                    @if($errors->has('room_number'))
                                        <p style="color:red">{!! $errors->first('room_number') !!}</p>
                                    @endif
                                </div>

                                <label class="bolder blue"  for="room-name">Room Name: </label>
                                <div class="control-group">
                                    <input class="form-control" value="{!! old('room_name') !!}" required id="room-name" name="room_name" placeholder="Enter Room Name" style="width:100%;">
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