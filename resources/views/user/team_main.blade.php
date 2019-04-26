{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Deepesh Patel--}}
{{--* Date: 02-02-2019--}}
{{--* Time: 07:06--}}
{{--*/--}}

@extends('layouts.frontLayout.front_design')

@section('style')

@endsection


@section('content')

    <!-- TOP AREA -->
    <div class="top-area show-onload">
        {{--bg-holder start--}}
        <div class="bg-holder full">
            <div class="bg-mask bg-mask-white"></div>
            <div class="bg-parallax" style="background-image:url({{ asset('img/1024x487.png')}});"></div>
            {{--bG-content start--}}
            <div class="bg-content">
                <div class="container">

                    <h3 class="booking-title">Let's help our customers today</h3>
                    <form class="booking-item-dates-change bg-white mb30">
                        <!--  need to add charts for KPIs  -->
                        <div class="easypiechart" data-percent="75" data-line-width="16" data-loop="false"
                             data-size="188">
                            <span class="h2" style="margin-left:10px;margin-top:10px;display:inline-block">75</span>%
                        </div>

                    </form>
                    <div class="row">
                        <div class="col-md-3">
                            <aside class='bg-white padding-default'>
                                <h3>Filters:</h3>
                                <ul class="list booking-filters-list">
                                    <li>
                                        <div class="checkbox">
                                            <label>
                                                <input class="i-check" type="checkbox"/>New<span
                                                        class="pull-right">14</span></label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input class="i-check" type="checkbox"/>Quoted<span
                                                        class="pull-right">2</span></label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input class="i-check" type="checkbox"/>Paid<span
                                                        class="pull-right">54</span></label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input class="i-check" type="checkbox"/>Booked<span
                                                        class="pull-right">54</span></label>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input class="i-check" type="checkbox"/>Timeline<span
                                                        class="pull-right">213</span></label>
                                        </div>
                                        <hr>
                                    </li>
                                    <!--<li>
                                        <h5 class="booking-filters-title">Price </h5>
                                        <input type="text" id="price-slider">
                                    </li>-->
                                    <li>
                                        <h5 class="booking-filters-title">Profile</h5> <br>
                                        <h5 class="booking-filters-title">Account</h5> <br>
                                        <h5 class="booking-filters-title">Banking</h5> <br>
                                    </li>

                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-9">

                            <ul class="booking-list">
                                <li>
                                    <div class="booking-item-container bg-white">
                                        <div class="booking-item">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <div class="booking-item-airline-logo">

                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="booking-item-flight-details">

                                                        <h5>Ref: 8E88U4WD USERNAME</h5>


                                                    </div>
                                                </div>
                                                <div class="col-md-2">

                                                </div>
                                                <div class="col-md-3"><span>NEW</span>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="booking-item-details">
                                            <div class="row">
                                                <!-- Panel 1, first column, customer inputs from quote page, team cannot change -->
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p style ="font-size: medium;">Date</p>
                                                            <p style ="font-size: medium;">1st July 2019</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p style ="font-size: medium;">Passengers</p>
                                                            <p style ="font-size: medium;">2A, 2C, 1F</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p style ="font-size: medium;">Notes</p>
                                                            <p style ="font-size: medium;">Found this in Holiday catalogue</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div id="popup-gallery">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <a class="hover-img popup-gallery-image"
                                                                           href="img/800x600.png"
                                                                           data-effect="mfp-zoom-out">
                                                                            <img src="img/800x600.png"
                                                                                 alt="Image Alternative text"
                                                                                 title="Gaviota en el Top"/><i
                                                                                    class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                                                        </a>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p style ="font-size: medium;">price</p>
                                                            <p style ="font-size: medium;">cuustomer Price</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--  This goes in 2nd column. This contains fields for Team to input-->

                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Our price</label>
                                                            <input class="form-control" placeholder="whole dollars"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Noteline</label>
                                                            <input class="form-control" placeholder="Noteline"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Reference</label>
                                                            <input class="form-control" placeholder="Holding reference"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Booked</label>
                                                            <input class="form-control" placeholder="Booking reference"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  This is the end of Panel 1, put HR and load Panel 2 etc -->
                                            <hr>
                                            <!-- Panel 2, first column, customer inputs from quote page, team cannot change -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p style ="font-size: medium;">Date</p>
                                                            <p style ="font-size: medium;">1st July 2019</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p style ="font-size: medium;">Passengers</p>
                                                            <p style ="font-size: medium;">2A, 2C, 1F</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p style ="font-size: medium;">Notes</p>
                                                            <p style ="font-size: medium;">Found this in Holiday catalogue</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div id="popup-gallery">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <a class="hover-img popup-gallery-image"
                                                                           href="img/800x600.png"
                                                                           data-effect="mfp-zoom-out">
                                                                            <img src="img/800x600.png"
                                                                                 alt="Image Alternative text"
                                                                                 title="Gaviota en el Top"/><i
                                                                                    class="fa fa-plus round box-icon-small hover-icon i round"></i>
                                                                        </a>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <p style ="font-size: medium;">price</p>
                                                            <p style ="font-size: medium;">cuustomer Price</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--  This goes in 2nd column. This shows fields for Team to input -->

                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Our price</label>
                                                            <input class="form-control" placeholder="whole dollars"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Reference</label>
                                                            <input class="form-control" placeholder="Holding reference"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Noteline</label>
                                                            <input class="form-control" placeholder="Noteline"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Booked</label>
                                                            <input class="form-control" placeholder="Booking reference"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <hr>
                                            <!-- This shows totals calculation from all panels. Put in 2nd column. Customer cannot change, only Team can recalculate  -->
                                            <div class="row">
                                                <div class="col-md-6"></div>
                                                <div class="col-md-6">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Total Fare</label>
                                                            <input class="form-control" placeholder="Total fare"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Taxes and fees</label>
                                                            <input class="form-control" placeholder="Taxes and fees"
                                                                   type="text"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Total</label>
                                                            <div class="input-group">
                                                                <div class="input-group-addon">
                                                                    AUD$

                                                                </div>
                                                                <input class="form-control" placeholder="Total price"
                                                                       type="text"/>
                                                                {{--<a>AUD</a>--}}
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="status">Select Status:</label>
                                                            <select class="form-control" id="status">
                                                                <option>Quoted</option>
                                                                <option disabled>Paid</option>
                                                                <option>Booked</option>
                                                                <option>Timeline</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                </li>

                            </ul>

                            <div class="row">
                                <div class="col-md-6">

                                    <ul class="pagination pagination--transparent">
                                        <li class="active"><a href="#">1</a>
                                        </li>
                                        <li><a href="#">2</a>
                                        </li>
                                        <li><a href="#">3</a>
                                        </li>
                                        <li><a href="#">4</a>
                                        </li>
                                        <li><a href="#">5</a>
                                        </li>
                                        <li><a href="#">6</a>
                                        </li>
                                        <li><a href="#">7</a>
                                        </li>
                                        <li class="dots">...</li>
                                        <li><a href="#">43</a>
                                        </li>
                                        <li class="next"><a href="#">Next Page</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--<p class="text-right">Not what you're looking for? <a class="popup-text" href="#search-dialog" data-effect="mfp-zoom-out">Try your search again</a>
                                </p>-->
                            </div>
                        </div>
                        <div class="gap"></div>
                    </div>
                </div>
            </div>
            {{--bG-content end--}}
        </div>
        {{--bg-holder end--}}
    </div>


    <!--End Top Area-->

@endsection


@section('script')

@endsection