{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Deepesh Patel--}}
{{--* Date: 02-02-2019--}}
{{--* Time: 07:06--}}
{{--*/--}}

@extends('layouts.frontLayout.front_design')

@section('style')
    <style>
        /* ghostClass */
        .ghost {
            opacity: .5;
            background: #C8EBFB;
        }

        /* chosenClass */
        .chosen {
            color: #fff;
            background-color: #FF0097 !important;
        }

        .chosen > div > .panel {
            background: #FF0097;
            color: #fff;
        }

        .append_artical div {

            transition: all .5s;
            /*cursor: move;*/
        }

        button.close {
            padding: 0;
            cursor: pointer;
            background: transparent;
            border-radius: 50%;
            width: 27px;
            height: 27px;
            border: 0;
            position: absolute;
            opacity: 1;
            right: 9px;
            border: solid 2px;
            top: 8px;
            -webkit-appearance: none;
            z-index: 500;
        }


        span.ham_burger {
            position: absolute;
            right: 15px;
            bottom: 51px;
        }

        .my-handle {
            cursor: move;
            cursor: -webkit-grabbing;
        }

    </style>
@endsection


@section('content')

    <!-- TOP AREA -->
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

                                        <div class="padder m-t m-b" style="margin-top: 25px">
                                            <div class="timeline">

                                                <article class="timeline-item active" id="add_drag_drop">

                                                    <div class="timeline-caption">
                                                        <div class="padding-default panel bg bg-primary c-pointer">
                                                            <div class="m-t-small timeline-action text-center">
                                                                <a class="timeline-icon"><i
                                                                            class="fas m-auto fa-suitcase box-icon-big round time-icon"></i></a><br>
                                                                <h3 class="text-center">Add to itinerary</h3><br>

                                                                <a href="{{route('itinerary')}}" style="color: #999999;" class="timeline-icon"><i class="fas m-auto fa fa-home fa-3x round time-icon"></i></a>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                                @if(!$Itineraries->isEmpty())

                                                    @foreach($Itineraries as $Itinerary)
                                                        @foreach($Itinerary->itineraryItem as $ItineraryItems)

                                                            <article class="timeline-item active" onclick='showModal("{{route('destroy.itineraries',[$Itinerary->id,$ItineraryItems->id])}}","{{route('update.itineraries',[$Itinerary->id,$ItineraryItems->id])}}", "{{$ItineraryItems->journey_date}}","{{$ItineraryItems->notes}}", "{{$ItineraryItems->cost}}","{{$ItineraryItems->passenger}}","{{$ItineraryItems->reference_image}}")'>

                                                                <div class="timeline-caption">
                                                                    <div class="padding-default text-center p-relative panel arrow arrow-left c-pointer bootstrap-modal-form-open" data-toggle="modal" data-target="#modal">
                                                                        <br>
                                                                        <br>
                                                                        <h6 class="text-center">{{$ItineraryItems->notes}}</h6>
                                                                        <h6 class="text-center">{{$ItineraryItems->journey_date}}</h6>
                                                                        {{--<h6 class="text-center">Click to add</h6>--}}
                                                                        <br><span class="ham_burger my-handle"><i class="fas fa-bars fa-lg"></i></span>
                                                                    </div>
                                                                </div>
                                                            </article>

                                                        @endforeach
                                                    @endforeach
                                                @endif

                                                <div class="append_artical" id="sortable">

                                                </div>

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


        <!-- Modal data-backdrop="static" -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">New Item</h5>
                        {{--<button type="button" onclick="saveform(this);" class="close">--}}
                            {{--<span aria-hidden="true">&times;</span>--}}
                        {{--</button>--}}
                    </div>
                    <div class="modal-body">
                        <a class="text-center" style="padding-left: 259px;">
                            <i class="fas m-auto fa-plus box-icon-big round time-icon">

                            </i>
                        </a>
                        <br>
                        <h5 class="text-center" style="padding-top: 15px;">Ref: {{$uuid}} (auto generated)</h5><br>
                        <p class="text-center">Tell us what you had in mind</p><br>
                        <form id="itineraries-form" method="POST"  class="bootstrap-modal-form-noImage" action="{{route('save.itineraries')}}" >
                            {{ csrf_field() }}
                            <input type="hidden" name="itinerary_reference" value="{{$uuid}}"/>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Itinerary Date</label>
                                        <input  id="reference_image_delete" name="reference_image_delete"  type="hidden"/>
                                        <input id="journey_date" name="journey_date" class="form-control" type="text"/>


                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group purple-border">
                                        {{--<label for="exampleFormControlTextarea4">Colorful border</label>--}}
                                        <textarea class="form-control" name="notes" id="notes" rows="3"
                                                  placeholder="Text 50 char......">{{ old('notes') or '' }}</textarea>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Itinerary Cost</label>
                                        <input id="cost" value="{{ old('cost') or '' }}" type="text"
                                               class="form-control" name="cost" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Itinerary Passengers</label>
                                        <input id="passenger" value="{{ old('passenger') or '' }}" type="text"
                                               class="form-control" name="passenger">

                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="reference_image">Upload Refrence Image</label>
                                        <input id="reference_image" name="reference_image" type="file" class="form-control-file dropify"

                                               id="reference_image">
                                        <div class="progress progress-striped active" id="progressDivId">
                                            <div class="progress-bar" id="progressBar" role="progressbar"
                                                 aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"
                                                 style="width: 0%; ">
                                                <span id="percent" class="">0% Complete</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </form>

                        {{--<h5 class="text-center">Date field</h5><br>--}}
                        {{--<h5 class="text-center">Text field 50 char</h5><br>--}}
                        {{--<h5 class="text-center">Price field</h5><br>--}}

                        <!-- <h5 class="text-center">Brisbane to Auckland</h5><br>
                        <h5 class="text-center">BNE-AKL  | Flight: NZ234</h5><br>
                        <h5 class="text-center">Terminal 1</h5> -->
                    </div>
                    <div class="modal-footer">
                        <div class="text-center">
                            <button type="button custom-button" style="background-color: transparent;border: transparent;font-size: 17px; padding-right: 75px;"  id="deletecard" onclick="deletedata();" ><i style="color: #999999;" class="far fa-trash-alt fa-2x"></i></button>

                            <button type="button custom-button" style="background-color: transparent;border: transparent;padding: 0px 0px;font-size: 17px;"   id="saveform" onclick="saveformQuote();"><i style="color: #999999;" class="far fa-check-circle fa-2x"></i></button>
                        </div>
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        {{--<div class="text-center"><a href="#" id="add_button_popup_drag_drop" type="button" class="btn btn-primary">Add</a></div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END TOP AREA  -->

@endsection


@section('script')
    <script type="text/javascript">

        function deletedataquote(){

            window.location.reload();

        }


        function showModal(delete_url,url,journey_date, notes, cost, passenger,reference_image) {

            console.log('sshowmodel');

            var publicpath_reference_image = "{{asset('/itinerary_image/')}}/" + reference_image ;


            console.log(delete_url);
            console.log(url);

            $("#deletecard").attr("data-deleteUrl", delete_url);
            $("#itineraries-form").attr("action", url);
            // $("#itineraries-form").attr("method", 'PUT');

            console.log(journey_date);
            console.log(notes);
            console.log('cost-------------------->'+cost);
            console.log('passenger-------------------->'+passenger);
            console.log('reference_image-------------------->'+reference_image);
            // reference_image
            $('#journey_date').val(journey_date);
            $('#notes').val(notes);

            $('#cost').val(cost);
            $('#passenger').val(passenger);
            // $('#passport').val(passport);


            if(reference_image != ""){

                console.log('reference_image================>'+reference_image);

                var drEvent = $('.dropify#reference_image').dropify();
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = publicpath_reference_image;
                drEvent.destroy();
                drEvent.init();
                $('.dropify#reference_image').dropify({
                    defaultFile: publicpath_reference_image
                });

                // $('div.identity_picture .dropify-render').css('display','block');
                // $('div.identity_picture .dropify-render').html('<span class="dropify-render"><img src="'+publicpath_passport_picture+'"></span>')
            }else{
                $(".dropify-clear").click();
                $('#reference_image').dropify();

            }


            var dropifyElements = {};
            $('.dropify').each(function() {
                dropifyElements[this.id] = true;
            });
            console.log(dropifyElements);

            var drEvent = $('.dropify').dropify();


            console.log(drEvent);

            drEvent.on('dropify.beforeClear', function(event, element){

                console.log(event.target.id );
                if(event.target.id == 'reference_image'){

                    $('#reference_image_delete').val('deleted');

                }


                //return confirm("Do you really want to delete \"" + element.filename + "\" ?");
            });




            // $('#passport_picture_delete').val('deleted');
            // $('#identity_picture_delete').val('deleted');



            // $('#is_primary').val(is_primary);
            $('#modal').modal('show');


        }






        // Basic
        $('.dropify').dropify();

        //<button onclick="$(this).closest('article').remove();" type="button" class="close" ><span aria-hidden="true">×</span></button>
        $('#add_drag_drop, #add_button_popup_drag_drop').click(function () {

            var stucture = '        \t\t\t\t\t\t\t\t\t\t\t\t<div class=\'timeline-add-new-area\'>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t<div class="timeline-caption">\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t\t<div class="padding-default text-center p-relative panel arrow arrow-left c-pointer bootstrap-modal-form-open" onclick="showModalQuote()">\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h5 class="text-center">Click to add</h5><br><span class="ham_burger my-handle"><i class="fas fa-bars fa-lg"></i></span>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t</div>\n';


            $('.append_artical').append('<article  style="position: relative; opacity:0;margin-left:300px;" class="timeline-item new-artical black-text"></article>').children("article:last").animate({
                opacity: 1,
                marginLeft: '0px'
            }, 1000, "easeOutElastic");

            jQuery('.new-artical').html(stucture, 500);
        });


        // Simple list
        Sortable.create(sortable, {

//swapThreshold: 1,
//ghostClass: 'ghost',
//animation: 150,
            handle: '.my-handle',
            delay: 10,
            chosenClass: 'chosen'

        });


        // function Delete(button) {
        //     var parent = button.parentNode;
        //     var grand_father = parent.parentNode;
        //     grand_father.removeChild(parent);
        // }

        //this function call on close button of form
        function saveformQuote() {

            $('#itineraries-form').submit();

        }

         function showModalQuote(){

             $(".dropify-clear").click();

             $('.dropify#reference_image').dropify({
                 messages: {
                     'default': 'Drop Reference Image Here'
                 }
             });

             var url = "{{route('save.itineraries')}}"
             console.log('The modal is about to be shown.');
             var uuid = "{{$uuid}}";
             var csrf = "{{csrf_token()}}";
             $('input[name="itinerary_reference"]').val(uuid);
             $('input[name="_token"]').val(csrf);
             $("#itineraries-form").attr("method", 'POST');
             $("#itineraries-form").attr("action", url);
             $('#modal').modal('show');

         }



    </script>
@endsection