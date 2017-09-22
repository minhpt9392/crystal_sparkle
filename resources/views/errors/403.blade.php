@extends('backend::layouts.master')
@section('title')
    Errors 403
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->

            <div class="error-container">
                <div class="well">
                    <h1 class="grey lighter smaller">
                        <span class="blue bigger-125">
                            <i class="ace-icon fa fa-sitemap"></i>
                            403
                        </span>
                        Access Denied
                    </h1>

                    <hr/>
                    <div>


                        <div class="space"></div>
                        <h4 class="smaller">You do not have permission to view this page</h4>


                    </div>

                    <hr/>
                    <div class="space"></div>

                    <div class="center">
                        <a href="/admin" class="btn btn-grey">
                            <i class="ace-icon fa fa-arrow-left"></i>
                            Go Back
                        </a>

                        <a href="/admin" class="btn btn-primary">
                            <i class="ace-icon fa fa-tachometer"></i>
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <!-- PAGE CONTENT ENDS -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection