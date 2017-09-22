@extends('backend::layouts.master')
@section('content')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">On Going Promotion</a>
            </li>
            @if(!isset($promotion))
                <li class="active">Create</li>
            @else
                <li class="active">Edit</li>
            @endif
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
            @if(!isset($promotion))
                <h3 class="header smaller lighter blue">Add New On Going Promotion</h3>
            @else
                <h3 class="header smaller lighter blue">Edit On Going Promotion</h3>
            @endif
                <div class="clearfix">
                <div class="pull-right tableTools-container"></div>
            </div>
            <div class="widget-box" style="border: 0">
                <form method="post"
                @if(!isset($promotion))
                    action={{url('/admin/on-going-promotion/create')}}
                @else
                    action={{url('/admin/on-going-promotion/edit')}}
                @endif
                >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @if(isset($promotion))
                        <input type="hidden" name="id" value="{!! $promotion->id !!}">
                    @endif
                    <div class="widget-body">
                        <div class="widget-main">
                            <div class="clearfix">
                                <label class="bolder blue"  for="number-expenditure">Number of Expenditures required</label>
                                <div class="control-group">
                                    <select class="form-control" required id="number-expenditure" name="number_expenditure">
                                        <?php
                                            $i = 1;
                                            while($i <= 50)
                                            {
                                                if( isset($promotion) && $promotion->number_expenditure == $i)
                                                {
                                                    echo('<option selected value="'.$i.'">'.$i.'</option>');
                                                }
                                                else
                                                {
                                                    echo('<option value="'.$i.'">'.$i.'</option>');
                                                }
                                                $i++;
                                            }
                                        ?>
                                    </select>
                                    @if($errors->has('number_expenditure'))
                                        <p style="color:red">{!! $errors->first('number_expenditure') !!}</p>
                                    @endif
                                </div>

                                <label class="bolder blue"  for="time-period">Time period to count</label>
                                <div class="control-group">
                                    <select class="form-control" required id="time-period" name="time_period">
                                        <?php
                                        $i = 1;
                                        while($i <= 366)
                                        {
                                            if( isset($promotion) && $promotion->time_period == $i)
                                            {
                                                echo('<option selected value="'.$i.'">'.$i.'</option>');
                                            }
                                            else
                                            {
                                                echo('<option value="'.$i.'">'.$i.'</option>');
                                            }
                                            $i++;
                                        }
                                        ?>
                                    </select>
                                    @if($errors->has('time_period'))
                                        <p style="color:red">{!! $errors->first('time_period') !!}</p>
                                    @endif
                                </div>

                                <label class="bolder blue"  for="free-service">Number of free services given </label>
                                <div class="control-group">
                                    <select class="form-control" required id="free-service" name="free_service">
                                        <?php
                                        $i = 1;
                                        while($i <= 50)
                                        {
                                            if( isset($promotion) && $promotion->free_service == $i)
                                            {
                                                echo('<option selected value="'.$i.'">'.$i.'</option>');
                                            }
                                            else
                                            {
                                                echo('<option value="'.$i.'">'.$i.'</option>');
                                            }
                                            $i++;
                                        }
                                        ?>
                                    </select>
                                    @if($errors->has('free_service'))
                                        <p style="color:red">{!! $errors->first('free_service') !!}</p>
                                    @endif
                                </div>

                                <div class="control-group">
                                    <label class="control-label bolder blue">Expenditures to be considered</label>

                                    <div class="checkbox">
                                        <label>
                                            <input name="type1" value="1" @if( isset($promotion) && ($promotion->discounted == 1) ) checked @endif type="checkbox" class="ace">
                                            <span class="lbl"> Discounted</span>
                                        </label>
                                    </div>

                                    <div class="checkbox">
                                        <label>
                                            <input name="type2" value="1" @if( isset($promotion) && ($promotion->packages == 1) ) checked @endif type="checkbox" class="ace">
                                            <span class="lbl"> Packages</span>
                                        </label>
                                    </div>
                                    @if($errors->has('type'))
                                        <p style="color:red">{!! $errors->first('type') !!}</p>
                                    @endif
                                </div>

                                <label class="bolder blue"  for="start-date">Start date</label>
                                <div class="row">
                                    <div class="col-xs-8 col-sm-11">
                                        <div class="input-group">
                                            <input class="form-control date-picker" style="width:100%" @if( isset($promotion) ) value="{!! $promotion->start_date !!}" @endif
                                                    required id="start-date" name="start_date" type="text" data-date-format="mm-dd-yyyy">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('start_date'))
                                            <p style="color:red">{!! $errors->first('start_date') !!}</p>
                                        @endif
                                    </div>
                                </div>

                                <label class="bolder blue"  for="room-name">End date </label>
                                <div class="row">
                                    <div class="col-xs-8 col-sm-11">
                                        <div class="input-group">
                                            <input class="form-control date-picker" style="width:100%" @if( isset($promotion) )  value="{!! $promotion->end_date !!}" @endif
                                                   required id="end-date" name="end_date" type="text" data-date-format="mm-dd-yyyy">
                                            <span class="input-group-addon">
                                               <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                        @if($errors->has('end_date'))
                                            <p style="color:red">{!! $errors->first('end_date') !!}</p>
                                        @endif
                                    </div>
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

@section('scripts')
    <script>
        $('#start-date').datepicker({
            autoclose: true,
            todayHighlight: true
        })
            .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        $('#end-date').datepicker({
            autoclose: true,
            todayHighlight: true
        })
            .next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
        //validate End date
        $('#end-date').on('change',function() {
            var start = $('#start-date').val();
            var end   = $('#end-date').val();
            if( new Date(end) <= new Date(start))
            {
                alert('You cannot choose End Date smaller than Start Date');
                $('#end-date').val('');
                $('#end-date').focus();
            }
            $('#end-date').datepicker( 'option', 'dateFormat', 'mm-dd-yy' );
        });

        //validate Start date
        $('#start-date').on('change',function() {
            var start = $('#start-date').val();
            var end   = $('#end-date').val();
            if( new Date(end) <= new Date(start))
            {
                alert('You cannot choose Start Date bigger than End Date');
                $('#end-date').val('');
                $('#end-date').focus();
            }
            $('#start-date').datepicker( 'option', 'dateFormat', 'mm-dd-yy' );
        });
    </script>
@endsection