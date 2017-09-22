@extends('layouts.navbarMenuAdmin')
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
                    <div class="col-xs-12">
                        <div class="table-header">
                            Listing of Staffs fire and resign
                        </div>

                        <!-- div.table-responsive -->

                        <!-- div.dataTables_borderWrap -->
                        <div>
                            <div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="dataTables_length" id="dynamic-table_length"><label>Display <select
                                                        name="dynamic-table_length" aria-controls="dynamic-table"
                                                        class="form-control input-sm">
                                                    <option value="10">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select> records</label></div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div id="dynamic-table_filter" class="dataTables_filter"><label>Search:<input
                                                        type="search" class="form-control input-sm" placeholder=""
                                                        aria-controls="dynamic-table"></label></div>
                                    </div>
                                </div>
                                <table id="dynamic-table"
                                       class="table table-striped table-bordered table-hover dataTable no-footer"
                                       role="grid" aria-describedby="dynamic-table_info">
                                    <thead>
                                    <tr role="row">
                                        <th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                                            No
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1"
                                            colspan="1" aria-label="Domain: activate to sort column ascending">Staff
                                            name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1"
                                            colspan="1" aria-label="Price: activate to sort column ascending">Staff ID
                                        </th>
                                        <th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table"
                                            rowspan="1" colspan="1"
                                            aria-label="Clicks: activate to sort column ascending">Date Join
                                        </th>
                                        <th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table"
                                            rowspan="1" colspan="1"
                                            aria-label="Clicks: activate to sort column ascending">Date Action
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1"
                                            colspan="1" aria-label="">
                                            Date submit
                                        </th>
                                        <th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table"
                                            rowspan="1" colspan="1"
                                            aria-label="Status: activate to sort column ascending">Permit cancellation
                                            date
                                        </th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Reason</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    @isset($listResign)
                                        @foreach($listResign as $resign)
                                            <tr role="row" class="odd">
                                                <td class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace">
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    <a href="#">{!! $resign->STAFF_AccID !!}</a>
                                                </td>
                                                <td>{!! $resign->STAFF_AccID !!}</td>
                                                <td class="hidden-480"></td>
                                                <td class="hidden-480">{!! $resign->action_date !!}</td>
                                                <td>{!! $resign->submit_date !!}</td>

                                                <td class="hidden-480">
                                                    {!! $resign->permit_cancel_date !!}
                                                </td>
                                                <td>
                                                    {!! $resign->reason !!}
                                                </td>
                                                <td>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                    <i class="fa fa-times" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endisset
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="dataTables_info" id="dynamic-table_info" role="status"
                                             aria-live="polite">Showing 1 to 10 of 23 entries
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="dataTables_paginate paging_simple_numbers"
                                             id="dynamic-table_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button previous disabled"
                                                    aria-controls="dynamic-table" tabindex="0"
                                                    id="dynamic-table_previous"><a href="#">Previous</a></li>
                                                <li class="paginate_button active" aria-controls="dynamic-table"
                                                    tabindex="0"><a href="#">1</a></li>
                                                <li class="paginate_button " aria-controls="dynamic-table" tabindex="0">
                                                    <a href="#">2</a></li>
                                                <li class="paginate_button " aria-controls="dynamic-table" tabindex="0">
                                                    <a href="#">3</a></li>
                                                <li class="paginate_button next" aria-controls="dynamic-table"
                                                    tabindex="0" id="dynamic-table_next"><a href="#">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection