@extends('backend::layouts.master')
@section('content')
    <div class="main-content">
        <div class="main-content-inner">
            <div id="content-header">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <i class="ace-icon fa fa-home home-icon"></i>
                            <a href="#">Home</a>
                        </li>
                        <li class="active">Staff</li>
                        <li class="active">Fire/Resign</li>
                    </ul><!-- /.breadcrumb -->

                    <div class="nav-search" id="nav-search">
                        <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input"
                                           id="nav-search-input" autocomplete="off">
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                        </form>
                    </div><!-- /.nav-search -->
                </div>

            </div>
            <div class="page-content">
                <div class="page-header">
                    <h1>Fire/Resign Staff</h1>
                </div>
                <div class="row">
                    <div class="col-xs-5">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Fire/Resign</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main no-padding">
                                    <form method="post" action="/admin/add-resign">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <!-- <legend>Form</legend> -->
                                        <fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="form-field-1"> Fire/Resign </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select type="text" id="form-field-1" name="resign_type"
                                                            class="col-xs-10 col-sm-10">
                                                        <option value="" default>Select fire or resign</option>
                                                        <option value="1">Fire</option>
                                                        <option value="2">Resign</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="form-field-1"> Select staff </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select type="text" id="form-field-1" placeholder="Username"
                                                            name="staff" class="col-xs-10 col-sm-10">
                                                        <option value="" default>Select Staff</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                    </select>
                                                </div>
                                                @if($errors->has('staff'))
                                                    <div class="col-sm-6">
                                                        <p class="text-danger">{!! $errors->first('staff') !!}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="id-date-picker-1"> Action date </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input class="form-control date-picker" name="action_date"
                                                               id="id-date-picker-1" type="text"
                                                               data-date-format="yyyy-mm-dd">
                                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                                    </div>
                                                </div>
                                                @if($errors->has('action_date'))
                                                    <div class="col-sm-6">
                                                        <p class="text-danger">{!! $errors->first('action_date') !!}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="id-date-picker-2"> Permit Cancellation </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input class="form-control date-picker"
                                                               id="id-date-picker-2" type="text" name="permit_cancel_date"
                                                               data-date-format="yyyy-mm-dd">
                                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                                    </div>
                                                </div>
                                                @if($errors->has('permit_cancel_date'))
                                                    <div class="col-sm-6">
                                                        <p class="text-danger">{!! $errors->first('permit_cancel_date') !!}</p>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="id-date-picker-2"> Reason </label>
                                                </div>
                                                <div class="col-sm-7">
                                                    <textarea name="reason" style="width: 100%" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="form-actions center">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>
        $('.date-picker').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        //show datepicker when clicking on the icon


    </script>
@endsection