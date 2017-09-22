@extends('backend::layouts.master')
@section('scripts')
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
                        <li class="active">Add new</li>
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
                    <h1>Add Staff</h1>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <!-- PAGE CONTENT BEGINS -->

                        <div class="widget-box">
                            <div class="widget-header">
                                <h4 class="widget-title">Add new</h4>
                            </div>
                            <div class="widget-body">
                                <div class="widget-main no-padding">
                                    <form>
                                        <!-- <legend>Form</legend> -->
                                        <fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="first-name"> Staff Name </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="first_name" id="first-name"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="phone-number"> Nick </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="phone_number" id="phone-number"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="phone-number"> Tel </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="phone_number" id="phone-number"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="email"> Email </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="email" id="email"/>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="nric-number"> NRIC/FIN number </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="nric_number" id="nric-number"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="nric-number"> Postal code </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="nric_number" id="nric-number"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="nric-number"> Address </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="nric_number" id="nric-number"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="nric-number"> Nationality </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="nric_number" id="nric-number"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="nric-number"> Singapore PR </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <select class="col-xs-10 col-sm-10">
                                                        <option>Default</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="phone-number"> Gender </label>
                                                </div>
                                                <div class="col-sm-6 mt5">
                                                    <label>
                                                        <input name="form-field-checkbox" type="radio" class="ace">
                                                        <span class="lbl"> Male</span>
                                                    </label>
                                                    <label>
                                                        <input name="form-field-checkbox" id="female" type="radio"
                                                               class="checkbox-inline ace">
                                                        <span class="lbl" for="female"> Female</span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-offset-4 col-sm-6 mt5">
                                                    <label>
                                                        <input name="form-field-checkbox" id="" type="checkbox"
                                                               class="checkbox-inline ace">
                                                        <span class="lbl" for="female"> Singapore PR</span>
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="nric-number"> Termination reason </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="nric_number" id="nric-number"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="nric-number"> Employment permit </label>
                                                </div>
                                                <div class="col-sm-6 mt5">
                                                    <label>
                                                        <input name="form-field-checkbox" id="" type="radio"
                                                               class="checkbox-inline ace">
                                                        <span class="lbl" for="female"> Singaporean </span>
                                                    </label>
                                                    <label>
                                                        <input name="form-field-checkbox" id="" type="radio"
                                                               class="checkbox-inline ace">
                                                        <span class="lbl" for="female">WP </span>
                                                    </label>
                                                    <label>
                                                        <input name="form-field-checkbox" id="" type="radio"
                                                               class="checkbox-inline ace">
                                                        <span class="lbl" for="female"> SP </span>
                                                    </label>
                                                    <label>
                                                        <input name="form-field-checkbox" id="" type="radio"
                                                               class="checkbox-inline ace">
                                                        <span class="lbl" for="female"> LOC </span>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="id-date-picker-1"> Work permit / S-Pass / E-Pass Approval date </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input class="form-control date-picker"
                                                               id="id-date-picker-1" type="text"
                                                               data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="id-date-picker-1"> Permit Issuance date </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input class="form-control date-picker"
                                                               id="id-date-picker-1" type="text"
                                                               data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="id-date-picker-1"> Permit Expiry date </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input class="form-control date-picker"
                                                               id="id-date-picker-1" type="text"
                                                               data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="id-date-picker-1"> Permit Cancellation date </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input class="form-control date-picker"
                                                               id="id-date-picker-1" type="text"
                                                               data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="nric-number"> Passport number </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="text" class="" name="nric_number" id="nric-number"/>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-4">
                                                    <label class="control-label no-padding-right pull-right mt5"
                                                           for="id-date-picker-1"> Passport Expiry </label>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <input class="form-control date-picker"
                                                               id="id-date-picker-1" type="text"
                                                               data-date-format="dd-mm-yyyy">
                                                        <span class="input-group-addon">
																		<i class="fa fa-calendar bigger-110"></i>
																	</span>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                        </fieldset>

                                        <div class="form-actions center">
                                            <button type="button" class="btn btn-sm btn-success">
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
