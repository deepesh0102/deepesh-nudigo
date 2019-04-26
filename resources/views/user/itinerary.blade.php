@extends('layouts.frontLayout.front_design')
@section('content')
    <div class="top-area show-onload">
        {{--bg-holder start--}}
        <div class="bg-holder full">
            <div class="bg-mask bg-mask-white"></div>
            <div class="bg-parallax" style="background-image:url({{ asset('img/1024x487.png')}});"></div>
            {{--bG-content start--}}
            <div class="bg-content">

                <div class="container">

        <div class="col-md-9">

            <ul class="booking-list">
                {{--{{$uuid}}--}}
                <a href="{{route('quote',['itinerary_reference'=>$uuid])}}" >
                <li>
                    <div class="booking-item-container bg-white">
                        <div class="padder m-t m-b" style="margin-top: 25px">
                            <div class="timeline">
                                <div class="append_artical_1">
                                    <article class="timeline-item active">
                                        <div class="timeline-caption">
                                            <div class="padding-default panel bg bg-primary c-pointer"
                                                 data-toggle="modal" data-target="#modal-1">
                                                <div class="m-t-small timeline-action text-center">
                                                    <a href="{{route('quote',['itinerary_reference'=>$uuid])}}" class="timeline-icon"><i
                                                                class="fas m-auto fa-map-marked-alt box-icon-big round time-icon"></i></a><br>
                                                    <h3 class="text-center">Add to itinerary</h3><br>

                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>


                            </div>
                        </div>
                    </div>
                </li>
                </a>
                {{--{{$Itineraries}} @php(exit)--}}
                @if(!$Itineraries->isEmpty())

                    @foreach($Itineraries as $Itinerary)

                <li>


                    <div class="booking-item-container bg-white">



                        <div class="booking-item">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="booking-item-airline-logo">

                                    </div>
                                </div>
                                <div class="col-md-5" style="top: 24px;">
                                    <div class="booking-item-flight-details">

                                        <h5>Ref: {{$Itinerary->itinerary_reference}} {{$Itinerary->username}}</h5>


                                    </div>
                                </div>
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-3" style="text-align: right; font-size: 50px">
                                    {{--<a class="btn btn-default pull-right"  href="{{route('timeline')}}"><i class="fas fa-clock fa-2x"></i></a>--}}
                                    <a href="{{route('timeline',['id'=>$Itinerary->id])}}" class="timeline-icon"><i
                                                class="fas m-auto fa-arrow-circle-right  round time-icon"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="booking-item-details">
                        @foreach($Itinerary->itineraryItem as $ItineraryItems)
{{--                            {{$ItineraryItems}}--}}
{{--                            {{$ItineraryItems->passenger}}--}}


                            <div class="row">
                                <!-- Panel 1, first column, customer inputs from quote page, team cannot change -->
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p style ="font-size: medium;">Date</p>
{{--                                            <p style ="font-size: medium;">{{date('dS F Y', strtotime($ItineraryItems->journey_date))}}</p>--}}
                                            <p style ="font-size: medium;">{{$ItineraryItems->journey_date}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p style ="font-size: medium;">Passengers</p>
                                            <p style ="font-size: medium;">{{$ItineraryItems->passenger}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p style ="font-size: medium;">Notes</p>
                                            <p style ="font-size: medium;">{{$ItineraryItems->notes}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="popup-gallery">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a class="hover-img popup-gallery-image" href="{{asset('/itinerary_image/').'/'.$ItineraryItems->reference_image}}"
                                                           data-effect="mfp-zoom-out">
                                                            <img src="{{asset('/itinerary_image/').'/'.$ItineraryItems->reference_image}}" alt="Image Alternative text"
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
                                            <p style ="font-size: medium;">${{$ItineraryItems->cost}} AUD</p>
                                        </div>
                                    </div>
                                </div>

                                <!--  This goes in 2nd column. This contains fields for Team to input-->

                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p style ="font-size: medium;">Passengers</p>
                                            <p style ="font-size: medium;">{{$ItineraryItems->passenger}}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p style ="font-size: medium;">Our price</p>
                                            <p style ="font-size: medium;">${{$ItineraryItems->team_cost}} AUD</p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <p style ="font-size: medium;">Booking</p>
                                            <p style ="font-size: medium;">{{$ItineraryItems->booking_reference}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <!--  This is the end of Panel 1, put HR and load Panel 2 etc -->

                            <hr>



                            <!-- This shows totals calculation from all panels. Put in 2nd column. Customer cannot change, only Team can recalculate  -->
                            {{--<hr>--}}



                        @endforeach

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <a href="{{route('quote',['itinerary_reference'=>$Itinerary->itinerary_reference])}}" style="color: #999999;" class="timeline-icon"><i class="fas m-auto  fa-pencil-square-o fa-3x round time-icon"></i></a>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p style ="font-size: medium;">Total Fare</p>
                                                <p style ="font-size: medium;">${{$Itinerary->total_fare}} AUD</p>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p style ="font-size: medium;">Taxes and Fees</p>
                                                <p style ="font-size: medium;">${{$Itinerary->total_tax }} AUD</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <p style ="font-size: medium;">Total</p>
                                                <p style ="font-size: medium;">${{$Itinerary->total_price}} AUD</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>


                    </div>



        </li>

                    @endforeach
                @endif

        </ul>

        <div class="row">
            <div class="col-md-6">

                {{$Itineraries->links()}}


            </div>
            <!--<p class="text-right">Not what you're looking for? <a class="popup-text" href="#search-dialog" data-effect="mfp-zoom-out">Try your search again</a>
            </p>-->
        </div>
    </div>
    <div class="gap"></div>
    </div>
            </div>
            {{--bG-content end--}}
        </div>
        {{--bg-holder end--}}
    </div>




@endsection