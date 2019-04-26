@extends('layouts.frontLayout.front_design')
@section('content')

    <div class="top-area show-onload">
        <div class="bg-holder full">

            <div class="bg-mask bg-mask-white"></div>
            <div class="bg-parallax" style="background-image:url({{ asset('img/1024x487.png')}});"></div>
            <div class="bg-content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="search-tabs search-tabs-bg mt50">
                                <!-- <h1>Find Your Perfect Trip</h1> -->
                                <section id="content" class="content-sidebar">
                                    <!-- .main -->
                                    <section class="main">
                                        {{--<pre>--}}

                                        {{--{{print_r($Itineraries->toArray())}}--}}

                                        {{--</pre>--}}

                                        <div class="padder m-t m-b" style="margin-top: 25px">
                                            <div class="timeline">



                                                @if(!$Itineraries->isEmpty())

                                                    @foreach($Itineraries as $Itinerary)

                                                        @foreach($Itinerary->itineraryItem as $ItineraryItems)



                                                        @if ($loop->first)

                                                            <article class="timeline-item active">

                                                                <div class="timeline-caption">
                                                                    <div class="padding-default panel bg bg-primary c-pointer" data-toggle="modal" data-target="#modal-1">
                                                                        <div class="m-t-small timeline-action text-center" >
                                                                            <a class="timeline-icon"><i class="fas m-auto fa-plane box-icon-big round time-icon"></i></a>
                                                                            <h5 class="text-center">{{$ItineraryItems->journey_date}}</h5><br>
                                                                            <h3 class="text-center">8:55pm</h3><br>
                                                                            <h5 class="text-center">{{$ItineraryItems->notes}}</h5><br>
                                                                            <h5 class="text-center">{{$ItineraryItems->booking_reference}}</h5><br>
                                                                            <h5 class="text-center">{{$ItineraryItems->team_note_line}}</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>


                                                        @endif


                                                            <article class="timeline-item black-text">
                                                                <div class='timeline-add-new-area'>
                                                                    <a href='search.html' class="_forceLink"></a>
                                                                </div>
                                                                <div class="timeline-caption">
                                                                    <div class="padding-default text-center p-relative panel arrow arrow-left c-pointer" data-toggle="modal" data-target="#modal-2">
                                                                        <span class="timeline-icon"><i class="fas v-middle fa-car d-inline-block time-icon  box-icon-black  round"></i></span>
                                                                        <span class="timeline-date timeline-left-lbl">{{$ItineraryItems->journey_date}} 12:25 am</span>
                                                                        <h5 class='text-center' >
                                                                            <strong>{{$ItineraryItems->notes}}</strong>
                                                                            <br>
                                                                            {{$Itinerary->itinerary_reference}}<br>
                                                                            {{$ItineraryItems->booking_reference}}
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </article>


                                                    @endforeach

                                                    @endforeach
                                                @endif



                                            </div>
                                        </div>
                                    </section>
                                </section>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection