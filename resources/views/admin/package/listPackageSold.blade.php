@extends('layouts.navbarMenuAdmin')
@section('content')
    <div class="row">
        <div class="col-sm-offset-1 col-sm-6" style="padding-bottom: 50px">
            <h1>Search/View Packages Sold</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-1 col-sm-10">
            <div class="row">
                <div class="col-xs-12">
                    <h3 class="header smaller lighter blue">List Packages</h3>
                    <div class="clearfix">
                        <div class="pull-right tableTools-container"></div>
                    </div>
                    <div>
                        <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Package Type</th>
                                    <th>Start Date</th>
                                    <th>Expiry Date</th>
                                    <th>Sale attributed to</th>
                                    <th>Sale entered by</th>
                                    <th>Shop utilised</th>
                                    <th>Date utilised</th>
                                    <th>Quantity utilised</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($listPackage))
                                    @foreach($listPackage as $p)
                                        <tr>
                                            <td>{!! $p->customerName !!}</td>
                                            <td>{!! $p->packageName !!}</td>
                                            <td>{!! $p->start_date !!}</td>
                                            <td>{!! $p->end_date !!}</td>
                                            <td>{!! $p->saler !!}</td>
                                            <td>{!! $p->therapist !!}</td>
                                            <td>Default</td>
                                            <td>Default</td>
                                            <td>Default</td>
                                            <td>
                                                <div class="hidden-sm hidden-xs action-buttons">
                                                    <a class="green" href="{{url('/admin/edit-promotion/'.$p->id)}}">
                                                        <i class="ace-icon fa fa-search bigger-130"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="modal-table" class="modal fade" tabindex="-1"></div>
        </div>

    </div>
    <script src="{{ URL::asset('js/myjs2.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/dataTables.buttons.min.js')}}"></script>
    <script>
        jQuery(function($) {
            var myTable = $('#dynamic-table').DataTable();
        });
    </script>
@endsection