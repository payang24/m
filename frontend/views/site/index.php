<?php

/* @var $this yii\web\View */

$this->title = 'HEALTH-ME';
?>
<script type="text/javascript" src="themes/bucket/html/js/jquery.js"></script>

<div class="row">
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <div class="gauge-canvas">
                        <h4 class="widget-h">Monthly Expense</h4>
                        <canvas width=160 height=100 id="gauge"></canvas>
                    </div>
                    <ul class="gauge-meta clearfix">
                        <li id="gauge-textfield" class="pull-left gauge-value"></li>
                        <li class="pull-right gauge-title">Safe</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <div class="daily-visit">
                        <h4 class="widget-h">Daily Visitors</h4>
                        <div id="daily-visit-chart" style="width:100%; height: 100px; display: block">

                        </div>
                        <ul class="chart-meta clearfix">
                            <li class="pull-left visit-chart-value">3233</li>
                            <li class="pull-right visit-chart-title"><i class="fa fa-arrow-up"></i> 15%</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <h4 class="widget-h">Top Advertise</h4>
                    <div class="sm-pie">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <h4 class="widget-h">Daily Sales</h4>
                    <div class="bar-stats">
                        <ul class="progress-stat-bar clearfix">
                            <li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
                            <li data-percent="90%"><span class="progress-stat-percent"></span></li>
                            <li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
                        </ul>
                        <ul class="bar-legend">
                            <li><span class="bar-legend-pointer pink"></span> New York</li>
                            <li><span class="bar-legend-pointer green"></span> Los Angels</li>
                            <li><span class="bar-legend-pointer yellow-b"></span> Dallas</li>
                        </ul>
                        <div class="daily-sales-info">
                            <span class="sales-count">1200 </span> <span class="sales-label">Products Sold</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <!--earning graph start-->
        <section class="panel">
            <header class="panel-heading">
                Earning Graph <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-cog"></a>
            <a href="javascript:;" class="fa fa-times"></a>
            </span>
            </header>
            <div class="panel-body">

                <div id="graph-area" class="main-chart">
                </div>
                <div class="region-stats">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="region-earning-stats">
                                This year total earning <span>$68,4545,454</span>
                            </div>
                            <ul class="clearfix location-earning-stats">
                                <li class="stat-divider">
                                    <span class="first-city">$734503</span>
                                    Rocky Mt,NC </li>
                                <li class="stat-divider">
                                    <span class="second-city">$734503</span>
                                    Dallas/FW,TX </li>
                                <li>
                                    <span class="third-city">$734503</span>
                                    Millville,NJ </li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <div id="world-map" class="vector-stat">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--earning graph end-->
    </div>
    <div class="col-md-4">
        <!--widget graph start-->
        <section class="panel">
            <div class="panel-body">
                <div class="monthly-stats pink">
                    <div class="clearfix">
                        <h4 class="pull-left"> January 2013</h4>
                        <!-- Nav tabs -->
                        <div class="btn-group pull-right stat-tab">
                            <a href="#line-chart" class="btn stat-btn active" data-toggle="tab"><i class="ico-stats"></i></a>
                            <a href="#bar-chart" class="btn stat-btn" data-toggle="tab"><i class="ico-bars"></i></a>
                        </div>
                    </div>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="line-chart">
                            <div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-min-spot-color="false" data-max-spot-color="false" data-line-color="#ffffff" data-spot-color="#ffffff" data-fill-color="" data-highlight-line-color="#ffffff" data-highlight-spot-color="#e1b8ff" data-spot-radius="3" data-data="[100,200,459,234,600,800,345,987,675,457,765]">
                            </div>
                        </div>
                        <div class="tab-pane" id="bar-chart">
                            <div class="sparkline" data-type="bar" data-resize="true" data-height="75" data-width="90%" data-bar-color="#d4a7f5" data-bar-width="10" data-data="[300,200,500,700,654,987,457,300,876,454,788,300,200,500,700,654,987,457,300,876,454,788]"></div>
                        </div>
                    </div>
                </div>
                <div class="circle-sat">
                    <ul>
                        <li class="left-stat-label"><span class="sell-percent">60%</span><span>Direct Sell</span></li>
                        <li><span class="epie-chart" data-percent="45">
                        <span class="percent"></span>
                        </span></li>
                        <li class="right-stat-label"><span class="sell-percent">40%</span><span>Channel Sell</span></li>
                    </ul>
                </div>
            </div>
        </section>
        <!--widget graph end-->
        <!--widget graph start-->
        <section class="panel">
            <div class="panel-body">
                <ul class="clearfix prospective-spark-bar">
                    <li class="pull-left spark-bar-label">
                        <span class="bar-label-value"> $18887</span>
                        <span>Prospective Label</span>
                    </li>
                    <li class="pull-right">
                        <div class="sparkline" data-type="bar" data-resize="true" data-height="40" data-width="90%" data-bar-color="#f6b0ae" data-bar-width="5" data-data="[300,200,500,700,654,987,457,300,876,454,788,300,200,500,700,654,987,457,300,876,454,788]"></div>
                    </li>
                </ul>
            </div>
        </section>
        <!--widget graph end-->
        <!--widget weather start-->
        <section class="weather-widget clearfix">
            <div class="pull-left weather-icon">
                <canvas id="icon1" width="60" height="60"></canvas>
            </div>
            <div>
                <ul class="weather-info">
                    <li class="weather-city">New York <i class="ico-location"></i></li>
                    <li class="weather-cent"><span>18</span></li>
                    <li class="weather-status">Rainy Day</li>
                </ul>
            </div>
        </section>
        <!--widget weather end-->
    </div>
</div>
<!-- ปฏิทิน -->
<div class="row">
    <div class="col-md-8">
        <div class="event-calendar clearfix">
            <div class="col-lg-7 calendar-block">
                <div class="cal1 ">
                </div>
            </div>
            <div class="col-lg-5 event-list-block">
                <div class="cal-day">
                    <span>Today</span>
                    Friday
                </div>
                <ul class="event-list">
                    <li>Lunch with jhon @ 3:30 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>
                    <li>Coffee meeting with Lisa @ 4:30 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>
                    <li>Skypee conf with patrick @ 5:45 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>
                    <li>Gym @ 7:00 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>
                    <li>Dinner with daniel @ 9:30 <a href="#" class="event-close"><i class="ico-close2"></i></a></li>

                </ul>
                <input type="text" class="form-control evnt-input" placeholder="NOTES">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="profile-nav alt">
            <section class="panel">
                <div class="user-heading alt clock-row terques-bg">
                    <h1>December 14</h1>
                    <p class="text-left">2014, Friday</p>
                    <p class="text-left">7:53 PM</p>
                </div>
                <ul id="clock">
                    <li id="sec"></li>
                    <li id="hour"></li>
                    <li id="min"></li>
                </ul>

                <ul class="clock-category">
                    <li>
                        <a href="#" class="active">
                            <i class="ico-clock2"></i>
                            <span>Clock</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="ico-alarm2 "></i>
                            <span>Alarm</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="ico-stopwatch"></i>
                            <span>Stop watch</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class=" ico-clock2 "></i>
                            <span>Timer</span>
                        </a>
                    </li>
                </ul>

            </section>

        </div>
    </div>
</div>
