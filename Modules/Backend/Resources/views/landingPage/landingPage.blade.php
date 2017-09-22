@extends('backend::layouts.master')
@section('content')
    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="#">Home</a>
            </li>
            <li class="active">Landing Page</li>
        </ul>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-3" style="padding-bottom: 50px">
            <h1>Landing Page</h1>
        </div>
    </div>
    <div class="row" style="padding-bottom: 50px">
        <div class="col-sm-1"></div>
        <div class="col-sm-10 infobox-container">

            <div class="widget-box">

                <div class="widget-header widget-header-flat widget-header-small">
                    <h5 class="widget-title">
                        <i class="ace-icon fa fa-signal"></i>
                        Traffic Sources
                    </h5>
                </div>

                <div class="widget-body">
                    <div class="myinfobox myinfobox-orange2">
                        <div class="myinfobox-chart">
                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224">
                                <canvas width="44" height="33" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas>
                            </span>
                        </div>

                        <div class="myinfobox-data">
                            <span class="myinfobox-data-number">6,251</span>
                            <div class="myinfobox-content">Customer</div>
                        </div>
                    </div>
                    <div class="myinfobox myinfobox-orange2">
                        <div class="myinfobox-chart">
                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224">
                                <canvas width="44" height="33" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas>
                            </span>
                        </div>

                        <div class="myinfobox-data">
                            <span class="myinfobox-data-number">6,251</span>
                            <div class="myinfobox-content">New Users</div>
                        </div>
                    </div>
                    <div class="myinfobox myinfobox-orange2">
                        <div class="myinfobox-chart">
                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224">
                                <canvas width="44" height="33" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas>
                            </span>
                        </div>

                        <div class="myinfobox-data">
                            <span class="myinfobox-data-number">6,251</span>
                            <div class="myinfobox-content">Massage sent</div>
                        </div>
                    </div>
                    <div class="myinfobox myinfobox-orange2">
                        <div class="myinfobox-chart">
                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224">
                                <canvas width="44" height="33" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas>
                            </span>
                        </div>

                        <div class="myinfobox-data">
                            <span class="myinfobox-data-number">6,251</span>
                            <div class="myinfobox-content">Mail sent</div>
                        </div>
                    </div>
                    <div class="myinfobox myinfobox-orange2">
                        <div class="myinfobox-chart">
                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224">
                                <canvas width="44" height="33" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas>
                            </span>
                        </div>

                        <div class="myinfobox-data">
                            <span class="myinfobox-data-number">6,251</span>
                            <div class="myinfobox-content">Record</div>
                        </div>
                    </div>
                    <div class="myinfobox myinfobox-orange2">
                        <div class="myinfobox-chart">
                            <span class="sparkline" data-values="196,128,202,177,154,94,100,170,224">
                                <canvas width="44" height="33" style="display: inline-block; width: 44px; height: 33px; vertical-align: top;"></canvas>
                            </span>
                        </div>

                        <div class="myinfobox-data">
                            <span class="myinfobox-data-number">6,251</span>
                            <div class="myinfobox-content">Active Users</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="widget-box">
                <div class="widget-header widget-header-flat">
                    <h4 class="widget-title lighter">
                        <i class="ace-icon fa fa-signal"></i>
                        Site analytics
                    </h4>

                    <div class="widget-toolbar">
                        <a href="#" data-action="collapse">
                            <i class="ace-icon fa fa-chevron-up"></i>
                        </a>
                    </div>
                </div>

                <div class="widget-body">
                    <div class="widget-main padding-4">
                        <div id="sales-charts" style="width: 100%; height: 220px; padding: 0px; position: relative;"><canvas class="flot-base" width="494" height="220" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 494px; height: 220px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 55px; top: 203px; left: 30px; text-align: center;">0.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 55px; top: 203px; left: 102px; text-align: center;">1.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 55px; top: 203px; left: 174px; text-align: center;">2.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 55px; top: 203px; left: 247px; text-align: center;">3.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 55px; top: 203px; left: 319px; text-align: center;">4.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 55px; top: 203px; left: 392px; text-align: center;">5.0</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 55px; top: 203px; left: 464px; text-align: center;">6.0</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 190px; left: 1px; text-align: right;">-2.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 166px; left: 1px; text-align: right;">-1.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 143px; left: 1px; text-align: right;">-1.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 119px; left: 1px; text-align: right;">-0.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 95px; left: 4px; text-align: right;">0.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 71px; left: 4px; text-align: right;">0.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 48px; left: 4px; text-align: right;">1.000</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 24px; left: 4px; text-align: right;">1.500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 4px; text-align: right;">2.000</div></div></div><canvas class="flot-overlay" width="494" height="220" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 494px; height: 220px;"></canvas><div class="legend"><div style="position: absolute; width: 62px; height: 66px; top: 13px; right: 13px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;right:13px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(237,194,64);overflow:hidden"></div></div></td><td class="legendLabel">Domains</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(175,216,248);overflow:hidden"></div></div></td><td class="legendLabel">Hosting</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px"><div style="width:4px;height:0;border:5px solid rgb(203,75,75);overflow:hidden"></div></div></td><td class="legendLabel">Services</td></tr></tbody></table></div></div>
                    </div><!-- /.widget-main -->
                </div><!-- /.widget-body -->
            </div>
        </div>
    </div>
    <script>
        var d1 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d1.push([i, Math.sin(i)]);
        }

        var d2 = [];
        for (var i = 0; i < Math.PI * 2; i += 0.5) {
            d2.push([i, Math.cos(i)]);
        }

        var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'300px'});
        $.plot("#sales-charts", [
            { label: "active therapist", data: d1 },
            { label: "active customer", data: d2 },
        ], {
            hoverable: true,
            shadowSize: 0,
            series: {
                lines: { show: true },
                points: { show: true }
            },
            xaxis: {
                tickLength: 0
            },
            yaxis: {
                ticks: 10,
                min: -2,
                max: 2,
                tickDecimals: 3
            },
            grid: {
                backgroundColor: { colors: [ "#fff", "#fff" ] },
                borderWidth: 1,
                borderColor:'#555'
            }
        });
        $('.sparkline').each(function(){
            var $box = $(this).closest('.infobox');
            var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
            $(this).sparkline('html',
                {
                    tagValuesAttribute:'data-values',
                    type: 'bar',
                    barColor: barColor ,
                    chartRangeMin:$(this).data('min') || 0
                });
        });
    </script>
@endsection