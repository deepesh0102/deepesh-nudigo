{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Deepesh Patel--}}
{{--* Date: 02-02-2019--}}
{{--* Time: 07:06--}}
{{--*/--}}

@extends('layouts.TeamLayout.team_design')

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

                                </ul>
                            </aside>
                        </div>
                        <div class="col-md-9">

                            <ul class="booking-list">
                                @if(!$Itineraries->isEmpty())

                                    @foreach($Itineraries as $Itinerary)
                                        <li  data-id="{{$Itinerary->id}}">
                                            <form method="POST" class="bootstrap-modal-form-noImage" action="{{route('update.Teamitineraries',$Itinerary->id)}}">
                                            <div class="booking-item-container bg-white">




                                                <div class="booking-item">
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                            <div class="booking-item-airline-logo">

                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="booking-item-flight-details">

                                                                <h5>Ref: {{$Itinerary->itinerary_reference}} {{$Itinerary->username}}</h5>


                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">

                                                        </div>
                                                        <div class="col-md-3"><span>NEW</span>

                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="booking-item-details">
                                                    @foreach($Itinerary->itineraryItem as $ItineraryItems)


                                                        <div class="row itinerary_items" id="{{$ItineraryItems->id}}">
                                                            <!-- Panel 1, first column, customer inputs from quote page, team cannot change -->
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <p style ="font-size: medium;">Date</p>
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

                                                            <div class="col-md-6 team">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Our price</label>
                                                                        <input name="id[]" value="{{$ItineraryItems->id}}" id="itinerary_items_id_{{$ItineraryItems->id}}"  type="hidden"/>
                                                                        <input class="form-control team_cost" name="team_cost[]" data-id="{{$ItineraryItems->id}}" id="team_cost_{{$ItineraryItems->id}}" placeholder="whole dollars" type="number"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Noteline</label>
                                                                        <input class="form-control" placeholder="Noteline" name="team_note_line[]"  id="team_note_line{{$ItineraryItems->id}}" type="text"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Reference</label>
                                                                        <input class="form-control" placeholder="Holding reference" name="holding_reference[]" id="holding_reference_{{$ItineraryItems->id}}" type="text"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Booked</label>
                                                                        <input class="form-control" placeholder="Booking reference" name="booking_reference[]" id="booking_reference_{{$ItineraryItems->id}}" type="text"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--  This is the end of Panel 1, put HR and load Panel 2 etc -->
                                                        <hr>
                                                    @endforeach
                                                        <!-- This shows totals calculation from all panels. Put in 2nd column. Customer cannot change, only Team can recalculate  -->
                                                        <div class="row">
                                                            <div class="col-md-6"></div>
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Total Fare</label>
                                                                        <input class="form-control"  name="total_fare" id="total_fare_{{$Itinerary->id}}" type="number"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Taxes and fees</label>
                                                                        <input class="form-control" placeholder="Taxes and fees" name="total_tax" id="total_tax_{{$Itinerary->id}}"  type="number"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Total</label>
                                                                        <div class="input-group">
                                                                            <div class="input-group-addon">
                                                                                AUD$

                                                                            </div>
                                                                            <input class="form-control" placeholder="Total price" name="total_price" id="total_price_{{$Itinerary->id}}" type="number"/>
                                                                            {{--<a>AUD</a>--}}
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="status">Select Status:</label>
                                                                        <select name="status" class="form-control" id="status_{{$Itinerary->id}}">
                                                                            <option value="1">Quoted</option>
                                                                            <option disabled>Paid</option>
                                                                            <option value="3">Booked</option>
                                                                            <option value="4">Timeline</option>
                                                                        </select>
                                                                    </div>

                                                                </div>

                                                                <div class="col-md-12">
                                                                    <div class="form-group">

                                                                        <div class="input-group">

                                                                            <input class="btn btn-primary" name="_team_{{$Itinerary->id}}" type="submit" value="Submit"/>
                                                                            {{--<a>AUD</a>--}}
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                </div>




                                            </div>
                                            </form>
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
            </div>
            {{--bG-content end--}}
        </div>
        {{--bg-holder end--}}
    </div>


    <!--End Top Area-->

@endsection


@section('script')
<script type="text/javascript">

    $(function(){

        var  ItineraryID ;
        var total_cost;
        $('li').on('click',function() {
            ItineraryID = $(this).data('id');
            console.log(ItineraryID);

            $("#total_tax_"+ItineraryID).on('keyup',function() {

                var tax = $(this).val();
                console.log(tax);
                console.log(total_cost);
                console.log($("#total_fare_"+ItineraryID).val());
                total = parseInt((!isNaN(total_cost))? total_cost : 0) + parseInt((!isNaN(tax))? tax : 0);


                $("#total_price_"+ItineraryID).val(total)

            });

        })

        $('input.team_cost').on('click',function() {

            console.log($(this).closest('div.booking-item-details').find('input[name*=team_cost]'));

            var inputs = $(this).closest('div.booking-item-details').find('input[name*=team_cost]');

            inputs.keyup(function(){
                var total = 0;
                $.each(inputs, function(input){
                    var num = parseInt(inputs[input].value);
                    total += (!isNaN(num))? num : 0;
                });
                total_cost = total;
                $("#total_fare_"+ItineraryID).val(total)

            })
        });






            // var dropdownid = $(this).data('value');
            // var surname = $(this).data('surname');
            // var middlename = $(this).data('middlename');
            // var firstname = $(this).data('firstname');
            // var attendees = $(this).data('attendees');
            //
            // $('.attendees').append('<div class=' + dropdownid + '>' + firstname + ' ' + middlename + ' ' + surname + '</div>' + '<button class=' + dropdownid + ' id=btn-deleteattendee data-id=' + dropdownid + ' class=remove>X</button>');
            //



    })


</script>
@endsection