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
        .chosen > div > .panel  {
            background: #FF0097; color: #fff;
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

                                                <article class="timeline-item active" id="add_drag_drop" >

                                                    <div class="timeline-caption">
                                                        <div class="padding-default panel bg bg-primary c-pointer">
                                                            <div class="m-t-small timeline-action text-center" >
                                                                <a class="timeline-icon"><i class="fas m-auto fa-credit-card box-icon-big round time-icon" style="padding-top: 16px;"></i></a><br>
                                                                <h3 class="text-center">Add Payment</h3><br>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
{{--                                                {{print_r(empty($payment))}}--}}
                                                @if($payment->isEmpty())
                                                    {{--// whatever you need to do here--}}


                                                @else
                                                    <article class="timeline-item active">

                                                        <ul class="card-select" id="card-select">




                                                    @foreach($payment as $cards)

                                                                <li style="position: relative" class="{{$cards->is_primary == 1 ? 'active' : ''}} " onclick='showModal("{{route('delete.payment',$cards->id)}}","{{route('edit.payment',$cards->id)}}", "{{$cards->name}}","{{Crypt::decrypt($cards->card_number)}}","{{Crypt::decrypt($cards->valid_thru)}}", "{{$cards->is_primary}}")'>
                                                                    {{--<div class="timeline-add-new-area"><button  type="button" class="close" style="top: 16px;">--}}
{{--                                                                            <a class="dropdown-item" href="{{ route('delete.payment') }}" onclick="event.preventDefault(); document.getElementById('delete-card').submit();"></a>--}}
                                                                            {{--<span onclick='deletedata("{{route('delete.payment',$cards->id)}}");' aria-hidden="true">×</span></button>--}}
                                                                    {{--</div>--}}
                                                                    <img class="card-select-img" src="img/payment/{{$cards->card_type}}-curved-64px.png" alt="Card icon" title="Credit card">
                                                                    <div class="card-select-data data" >
                                                                        <p class="card-select-number">{{$cards->name}}</p>
                                                                        <p class="card-select-number">xxxx {{substr (Crypt::decrypt($cards->card_number), -4)}}</p>

                                                                        {{--<input class="form-control card-select-cvc" type="text" placeholder="CVC">--}}
                                                                        <p class="card-select-number text-right">{{$cards->is_primary == 1 ? 'Primary' : ''}}</p>
                                                                    </div>
                                                                </li>

                                                    @endforeach

                                                        </ul>
                                                    </article>
                                                @endif
                                                <div class="append_artical" style="" id="sortable">

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
    </div>

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form class="cc-form bootstrap-modal-form-noImage" method="POST" id="payment_form_submite" action="{{route('save.payment',['id'=>Auth::user()->id ])}}">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">This card</h5>
                        {{--<button type="button" class="close" onclick="saveform()">--}}
                            {{--<span aria-hidden="true">&times;</span>--}}
                        {{--</button>--}}
                    </div>
                    <div class="mfp-with-anim  mfp-dialog" id="edit-card-dialog">

                        {{--<p>Visa XXXX XXXX XXXX 1234</p>--}}

                            <div class="clearfix">
                                <div class="form-group form-group-cc-number">
                                    <label>Card Number</label>
                                    <input name="card_number" id="card_number" class="form-control" placeholder="" type="text" /><span class="cc-card-icon"></span>
                                </div>
                                <div class="form-group form-group-cc-ccv" style="width: 25%">
                                    <label>CCV</label>
                                    <input class="form-control" placeholder="" maxlength="3" pattern="\d{3}" type="text"  />
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="form-group form-group-cc-name">
                                    <label>Cardholder Name</label>
                                    <input name="name" id="name" class="form-control" placeholder=""  type="text" />
                                </div>
                                <div class="form-group form-group-cc-date">
                                    <label>Valid Thru</label>
                                    <input name="valid_thru" id="valid_thru" class="form-control" placeholder="mm/yy" type="text" />

                                </div>
                            </div>
                            <div class="checkbox">
                                <div class="form-group">
                                <label >
                                    <input name="is_primary" data-primary="0" id="is_primary" onclick="(function(){alert(this);})()" onchange="doalert(this.id)"   value="1" class="i-check" type="checkbox" />Set as primary</label>
                                </div>
                                </div>


                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            {{--<input class="btn btn-primary" type="submit" value="Save Card" />--}}
                            <div class="text-center">
                                <button type="button custom-button pull-right" style="background-color: transparent;border: transparent;font-size: 17px;padding-right: 75px;"   id="deletecard" onclick="deletedata();" ><i style="color: #999999;" class="far fa-trash-alt fa-2x"></i></button>

                                <button type="button custom-button pull-left" style="background-color: transparent;border: transparent;padding: 0px 0px;font-size: 17px;"><i style="color: #999999;" class="far fa-check-circle fa-2x"></i></button>

                            </div>

                        </div>
                        {{--<div class="text-center">--}}
                            {{--<input class="btn btn-primary" type="submit" value="Save Card" />--}}
                        {{--</div>--}}
                        <!-- <div class="text-center"><a href="#" id="add_button_popup_drag_drop" type="button" class="btn btn-primary">Add</a></div> -->
                    </div>
                    </form>
                </div>
            </div>
        </div>

    <!-- END TOP AREA  -->

@endsection


@section('script')
    <script type="text/javascript">
        $('.iCheck-helper').remove('ins');

        var totalCards = parseInt("{{count($payment)}}");


        function showModal(delete_url,url,name, card_number, valid_thru, is_primary) {



            console.log(delete_url);
            console.log(url);

            $("#deletecard").attr("data-deleteUrl", delete_url);
            $("#payment_form_submite").attr("action", url);
            $("#payment_form_submite").attr("method", 'PUT');
            // alert()
            $('.i-check input#is_primary').iCheck('uncheck');
            console.log(name);
            console.log(card_number);
            console.log(valid_thru);

            $('#card_number').val(card_number);
            $('#name').val(name);
            $('#valid_thru').val(valid_thru);
            if(is_primary == '1'){
                console.log(is_primary);
                $('.i-check input#is_primary').iCheck('check');

                $("#is_primary").attr('data-primary','1');
                $('div .form-group').children('p').remove();
                $('.form-group').removeClass('has-error');
                $('.form-group').find('.help-block').remove();

            } else {
                $("#is_primary").attr('data-primary','0');
                console.log(is_primary);
                $('.i-check input#is_primary').iCheck('uncheck');

            }
            // $('#is_primary').val(is_primary);
            $('#modal').modal('show');


        }

        // $("div .card-select-data").on("click", function(){
        //     $('#model').modal();
        //     $('#model').on('shown.bs.modal', function (e) {
        //     // do something...
        //     });
        // });

        $('.i-check input#is_primary').on('ifChecked', function(event) {

            var is_primary_count = $('#card-select li.active').length;
            console.log(is_primary_count)
            var primary = $("#is_primary").attr('data-primary');
            if (primary == 0) {

                if (is_primary_count > 0 && totalCards > 1) {

                    var field = 'is_primary';
                    var formGroup = $('[name=' + field + ']').closest('.form-group');
                    $('div .form-group').children('p').remove();
                    $('.form-group').removeClass('has-error');
                    $('.form-group').find('.help-block').remove();
                    formGroup.addClass('has-error').append('<p class="help-block">You only one card can be set to primary</p>');

                    var label = $('[name=' + field + ']').parent().parent("label");

                    label.addClass('control-label');

                }
            }

        });

        $('.i-check input#is_primary').on('ifUnchecked', function(event){
            $('div .form-group').children('p').remove();
            $('.form-group').removeClass('has-error');
            $('.form-group').find('.help-block').remove();
        });

        //<button onclick="$(this).closest('article').remove();" type="button" class="close" ><span aria-hidden="true">×</span></button>
        $('#add_drag_drop, #add_button_popup_drag_drop').click(function() {

            var stucture = '        \t\t\t\t\t\t\t\t\t\t\t\t<div class=\'timeline-add-new-area bootstrap-modal-form-open\'>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t<div class="timeline-caption">\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t\t<div class="bootstrap-modal-form-open padding-default text-center p-relative panel arrow arrow-left c-pointer" onclick="showModel()" >\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h5 class="text-center">Click to add</h5><br><span class="ham_burger my-handle"><i class="fas fa-bars fa-lg"></i></span>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t</div>\n' ;


            $('.append_artical').append('<article  style="position: relative; opacity:0; margin-left:300px;"  class="timeline-item new-artical black-text"></article>').children("article:last").animate({
                opacity:1,
                marginLeft:'0px'
            },1000,"easeOutElastic");

            jQuery('.new-artical').html(stucture , 500);
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


        function Delete(button) {
            var parent = button.parentNode;
            var grand_father = parent.parentNode;
            grand_father.removeChild(parent);
        }


        function showModel() {
            // alert();
            $('#modal').modal('show');
            $('.i-check input#is_primary').iCheck('uncheck');

        }




        //this function call on close button of form
        // function saveforms() {
        //
        //
        //     // document.getElementById('payment_form_submite').submit();
        //     $('#payment_form_submite').submit();
        //
        // }
    </script>
@endsection