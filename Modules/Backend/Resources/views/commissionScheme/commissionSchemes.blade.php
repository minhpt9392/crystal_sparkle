@extends('backend::layouts.master')
@section('content')

    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li>Admin</li>
            <li class="active">Commission Schemes</li>
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

        <div class="col-sm-offset-1 col-sm-4 col-sm-offset-1">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Base Model 1 - Percentage of Sale item types
                    </h4>
                </div>
                {{--<form method="post" action={{url('/admin/refund-package')}}>--}}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="widget-body" >
                        <div class="widget-main" >

                            <label class="bolder blue" for="set-day">Staff Role </label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="control-group">
                                        <select class="form-control" id="role1" name="role1" onchange="getBaseInfo(1)" style="width:100%">
                                            <option @if( old('method')==1 || (isset($package) && $package->role == 1 ) ) selected @endif  value="1">Manager</option>
                                            <option @if( old('method')==2 || (isset($package) && $package->role == 2 ) ) selected @endif  value="2">Therapist</option>
                                            <option @if( old('method')==3 || (isset($package) && $package->role == 3 ) ) selected @endif  value="3">Reception</option>
                                            <option @if( old('method')==3 || (isset($package) && $package->role == 4 ) ) selected @endif  value="4">Service</option>
                                            <option @if( old('method')==3 || (isset($package) && $package->role == 5 ) ) selected @endif  value="5">Cleaner</option>
                                            <option @if( old('method')==3 || (isset($package) && $package->role == 6 ) ) selected @endif  value="6">Sale</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <label class="bolder blue" for="set-day">Fixed Component </label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="control-group">
                                        <input class="form-control " style="width:100%" id="fixed-component1" name="fixed_component1" type="text">
                                    </div>
                                </div>
                            </div>

                            <label class="bolder blue" for="set-day">Message Items </label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control " style="width:100%" id="massage-item1" name="massage_item1" type="text">
                                        <span class="input-group-addon">
                                            <i class="fa fa-percent bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <label class="bolder blue" for="set-day">Packages Items</label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control " style="width:100%" id="package-item1" name="package_item1" type="text">
                                        <span class="input-group-addon">
                                            <i class="fa fa-percent bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <label class="bolder blue" for="set-day">Product Items </label>
                            <div class="row">
                                <div class="col-xs-8 col-sm-11">
                                    <div class="input-group">
                                        <input class="form-control " style="width:100%" id="product-item1" name="product_item" type="text">
                                        <span class="input-group-addon">
                                            <i class="fa fa-percent bigger-110"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <button class="btn btn-primary" id="button1"  onclick="setBaseModel(1)">Save</button>
                        </div>
                    </div>
                {{--</form>--}}
            </div>
        </div>

        <div class="col-sm-offset-1 col-sm-4 col-sm-offset-1">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Base Model 2 - Fixed Component of Sale item types
                    </h4>
                </div>
                {{--<form method="post" action={{url('/admin/refund-package')}}>--}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="widget-body" >
                    <div class="widget-main" >

                        <label class="bolder blue" for="set-day">Staff Role </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="control-group">
                                    <select class="form-control" id="role2" name="role2" onchange="getBaseInfo(2)" style="width:100%">
                                        <option @if( old('method')==1 || (isset($package) && $package->role == 1 ) ) selected @endif  value="1">Manager</option>
                                        <option @if( old('method')==2 || (isset($package) && $package->role == 2 ) ) selected @endif  value="2">Therapist</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 3 ) ) selected @endif  value="3">Reception</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 4 ) ) selected @endif  value="4">Service</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 5 ) ) selected @endif  value="5">Cleaner</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 6 ) ) selected @endif  value="6">Sale</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Fixed Component </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="control-group">
                                    <input class="form-control " style="width:100%" id="fixed-component2" name="fixed_component2" type="text">
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Message Items </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="massage-item2" name="massage_item2" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-hashtag bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Packages Items</label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="package-item2" name="package_item2" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-hashtag bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Product Items </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="product-item2" name="product_item2" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-hashtag bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary" id="button2"  onclick="setBaseModel(2)">Save</button>
                    </div>
                </div>
                {{--</form>--}}
            </div>
        </div>

    </div>

    <br>
    <br>
    <br>

    <div class="row">

        <div class="col-sm-offset-1 col-sm-4 col-sm-offset-1">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Base Model 3 - Additional Fixed Component
                    </h4>
                </div>
                {{--<form method="post" action={{url('/admin/refund-package')}}>--}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="widget-body" >
                    <div class="widget-main" >

                        <label class="bolder blue" for="set-day">Staff Role </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="control-group">
                                    <select class="form-control" id="role3" name="role3" onchange="getBaseInfo(3)" style="width:100%">
                                        <option @if( old('method')==1 || (isset($package) && $package->role == 1 ) ) selected @endif  value="1">Manager</option>
                                        <option @if( old('method')==2 || (isset($package) && $package->role == 2 ) ) selected @endif  value="2">Therapist</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 3 ) ) selected @endif  value="3">Reception</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 4 ) ) selected @endif  value="4">Service</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 5 ) ) selected @endif  value="5">Cleaner</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 6 ) ) selected @endif  value="6">Sale</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Fixed Component </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="fixed-component3" name="fixed_component3" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-dollar bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Message Items </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="massage-item3" name="massage_item3" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-dollar bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Packages Items</label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="package-item3" name="package_item3" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-dollar bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Product Items </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="product-item3" name="product_item3" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-dollar bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary" id="button3"  onclick="setBaseModel(3)">Save</button>
                    </div>
                </div>
                {{--</form>--}}
            </div>
        </div>

        <div class="col-sm-offset-1 col-sm-4 col-sm-offset-1">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title">
                        Base Model 4 - Additional Fixed Component
                    </h4>
                </div>
                {{--<form method="post" action={{url('/admin/refund-package')}}>--}}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="widget-body" >
                    <div class="widget-main" >

                        <label class="bolder blue" for="set-day">Staff Role </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="control-group">
                                    <select class="form-control" id="role4" name="role4" onchange="getBaseInfo(4)" style="width:100%">
                                        <option @if( old('method')==1 || (isset($package) && $package->role == 1 ) ) selected @endif  value="1">Manager</option>
                                        <option @if( old('method')==2 || (isset($package) && $package->role == 2 ) ) selected @endif  value="2">Therapist</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 3 ) ) selected @endif  value="3">Reception</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 4 ) ) selected @endif  value="4">Service</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 5 ) ) selected @endif  value="5">Cleaner</option>
                                        <option @if( old('method')==3 || (isset($package) && $package->role == 6 ) ) selected @endif  value="6">Sale</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Fixed Component </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="fixed-component4" name="fixed_component4" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-dollar bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Message Items </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="massage-item4" name="massage_item4" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-dollar bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Packages Items</label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="package-item4" name="package_item4" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-dollar bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>

                        <label class="bolder blue" for="set-day">Product Items </label>
                        <div class="row">
                            <div class="col-xs-8 col-sm-11">
                                <div class="input-group">
                                    <input class="form-control " style="width:100%" id="product-item4" name="product_item4" type="text">
                                    <span class="input-group-addon">
                                            <i class="fa fa-dollar bigger-110"></i>
                                        </span>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button class="btn btn-primary" id="button4" onclick="setBaseModel(4)">Save</button>
                    </div>
                </div>
                {{--</form>--}}
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('js/myjs2.js') }}"></script>
    <script>
        $(document).ready(function(){
            getBaseInfo(1);
            getBaseInfo(2);
            getBaseInfo(3);
            getBaseInfo(4);
        });
    </script>
@endsection



