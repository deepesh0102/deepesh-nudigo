{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Deepesh Patel--}}
{{--* Date: 02-02-2019--}}
{{--* Time: 07:06--}}
{{--*/--}}

@extends('layouts.frontLayout.front_design')

@section('style')
    {{--<style>--}}
    {{--/* ghostClass */--}}
    {{--.ghost {--}}
    {{--opacity: .5;--}}
    {{--background: #C8EBFB;--}}
    {{--}--}}

    {{--/* chosenClass */--}}
    {{--.chosen {--}}
    {{--color: #fff;--}}
    {{--background-color: #FF0097 !important;--}}
    {{--}--}}

    {{--.chosen > div > .panel {--}}
    {{--background: #FF0097;--}}
    {{--color: #fff;--}}
    {{--}--}}

    {{--.append_artical div {--}}

    {{--transition: all .5s;--}}
    {{--/*cursor: move;*/--}}
    {{--}--}}

    {{--button.close {--}}
    {{--padding: 0;--}}
    {{--cursor: pointer;--}}
    {{--background: transparent;--}}
    {{--border-radius: 50%;--}}
    {{--width: 27px;--}}
    {{--height: 27px;--}}
    {{--border: 0;--}}
    {{--position: absolute;--}}
    {{--opacity: 1;--}}
    {{--right: 9px;--}}
    {{--border: solid 2px;--}}
    {{--top: 8px;--}}
    {{---webkit-appearance: none;--}}
    {{--z-index: 500;--}}
    {{--}--}}


    {{--span.ham_burger {--}}
    {{--position: absolute;--}}
    {{--right: 15px;--}}
    {{--bottom: 10px;--}}
    {{--}--}}

    {{--.my-handle {--}}
    {{--cursor: move;--}}
    {{--cursor: -webkit-grabbing;--}}
    {{--}--}}

    {{--</style>--}}
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
                                                                <a class="timeline-icon">
                                                                    <i class="fas m-auto fa-users box-icon-big round time-icon" style="padding-top: 16px;"></i></a><br>
                                                                <h3 class="text-center">Add Passenger</h3><br>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                                @if(!$passenger->isEmpty())
                                                    @foreach($passenger as $passengers)
                                                    <article class="timeline-item active" style="position: relative"
                                                         id="show_added_data_{{$passengers->id}}" onclick='showModal("{{route('delete.passenger',$passengers->id)}}","{{route('edit.passenger',$passengers->id)}}", "{{$passengers->name}}","{{$passengers->surname}}","{{$passengers->gender}}","{{date('m/d/Y',strtotime($passengers->date_of_birth))}}", "{{$passengers->citizenship}}","{{$passengers->passport}}","{{date('m/d/Y',strtotime($passengers->expiry_date))}}","{{$passengers->passport_picture}}","{{$passengers->identity_picture}}")'>
                                                    <div class="timeline-add-new-area">
                                                        {{--<button onclick="$(this).closest('article').remove();"--}}
                                                                {{--type="button" class="close" style="top: 16px;"><span--}}
                                                                    {{--aria-hidden="true">×</span></button>--}}
                                                    </div>

                                                    <div class="timeline-caption" data-toggle="modal"
                                                         data-target="#modal-filled">
                                                        <div class="padding-default panel bg bg-primary c-pointer">
                                                            <div class="m-t-small timeline-action text-center">
                                                                <h5 class="text-center">{{$passengers->name}}</h5><br>
                                                                <h5 class="text-center">{{$passengers->passport}}</h5><br>
                                                                <h5 class="text-center">{{$passengers->date_of_birth}}</h5><br>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                                    @endforeach
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
    <!-- END TOP AREA  -->

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">This Passenger</h5>
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                </div>
                <div class="modal-body">
                    <form class="bootstrap-modal-form-noImage" method="POST" id="passenger_form_submite"  action="{{route('save.passenger',['id'=>Auth::user()->id ])}}">
                        <div class="mfp-with-anim  mfp-dialog" id="passenger-dialog">
                            {{--<h3 class="mb0"></h3>--}}
                            {{--<p>Brad Pitt</p>--}}

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <div class="radio-inline radio-small">
                                            <label onclick="male()">
                                                <input id="male" name="gender_1" value="male"  class="i-radio" type="radio"/>Male</label>
                                        </div>
                                        <div class="radio-inline radio-small">
                                        <label  onclick="female()">
                                            <input class="i-radio" id="female" value="female" name="gender_1" type="radio"/>Female</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input  id="gender" name="gender"  type="hidden"/>
                                        <input  id="passport_picture_delete" name="passport_picture_delete"  type="hidden"/>
                                        <input  id="identity_picture_delete" name="identity_picture_delete"  type="hidden"/>


                                        <input  id="name" name="name" class="form-control" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Surname</label>
                                        <input  id="surname" name="surname" class="form-control" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input  id="date_of_birth"  name="date_of_birth" class="form-control date-pick-years " type="text"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Citizenship</label>
                                        <input  id="citizenship"  name="citizenship" class="form-control" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Passport</label>
                                        <input  id="passport"  name="passport" class="form-control" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Expiry Date</label>
                                        <input  id="expiry_date" name="expiry_date" class="date-pick-years form-control" type="text"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group passport_picture">
                                        <label for=" control-label profile_picture">Upload Passport</label>
                                        <input  id="passport_picture" name="passport_picture" type="file" class=" form-control form-control-file dropify" id="passport_picture">

                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group identity_picture">
                                        <label for="control-label profile_picture">Upload Photo ID</label>
                                        <input id="identity_picture"  name="identity_picture" type="file"  class=" form-control form-control-file dropify" id="identity_picture">
                                        {{--<div class="progress progress-striped active" id="progressDivId">--}}
                                            {{--<div class="progress-bar" id="progressBar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%; ">--}}
                                                {{--<span id="percent" class="">0% Complete</span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>

                                </div>
                            </div>


                        </div>

                    </form>

                </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                            <div class="text-center">
                                {{--<button id="save_passenger" type="button" class="btn btn-primary">Save Passenger</button>--}}

                                <button type="button custom-button" style="background-color: transparent;border: transparent;font-size: 17px; padding-right: 75px;"  id="deletecard" onclick="deletedata();" ><i style="color: #999999;" class="far fa-trash-alt fa-2x"></i></button>

                                <button type="button custom-button" style="background-color: transparent;border: transparent;padding: 0px 0px;font-size: 17px;"   id="saveform" onclick="saveforms();"><i style="color: #999999;" class="far fa-check-circle fa-2x"></i></button>

                            </div>
                        </div>


            </div>
        </div>
    </div>






@endsection


@section('script')
    <script type="text/javascript">

        $('.iCheck-helper').remove('ins');

        function male() {

            $('#gender').val('male');

        }


        function female() {

            $('#gender').val('female');
        }



        function showModal(delete_url,url,name, surname, gender, date_of_birth,citizenship,passport,expiry_date,passport_picture,identity_picture) {


            $(':input','#passenger_form_submite')
                .not(':button, :submit, :reset, :hidden')
                .val('')
                .removeAttr('checked')
                .removeAttr('selected');


            var publicpath_passport_picture = "{{asset('/passport_picture/')}}/" + passport_picture ;
            var publicpath_identity_picture = "{{asset('/identity_picture/')}}/" + identity_picture;

            console.log(delete_url);
            console.log(url);

            $("#deletecard").attr("data-deleteUrl", delete_url);
            $("#passenger_form_submite").attr("action", url);

            console.log(name);
            console.log(surname);
            console.log('gender-------------------->'+gender);

            $('#name').val(name);
            $('#surname').val(surname);

            $('#date_of_birth').val(date_of_birth);
            $('#citizenship').val(citizenship);
            $('#passport').val(passport);
            $('#expiry_date').val(expiry_date);
            console.log('passport_picturepassport_picturepassport_picture'+passport_picture);
            console.log('identity_pictureidentity_picture==================='+identity_picture);
            console.log($('input#passport_picture'));

            // console.log($(document).find('input#passport_picture').parent().html());
            // console.log($(document).find('input#passport_picture').parent().html());
            // console.log($('div.identity_picture').find('span.dropify-render').html());


            // $('#passport_picture').attr("data-default-file", publicpath_passport_picture );
            // $('#identity_picture').attr("data-default-file", publicpath_identity_picture );
            if(passport_picture != ""){
                // $('.dropify-preview .dropify-render img').attr('src', publicpath_passport_picture)


                // $('div.identity_picture').append('<input type="hidden" name="passport_picture_old" value="'+passport_picture+'"');

                // $('.dropify#passport_picture').dropify({
                //     defaultFile: publicpath_passport_picture ,
                // });
                console.log('passport_picturepassport_picturepassport_picture'+passport_picture);

                var drEvent = $('.dropify#passport_picture').dropify();
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = publicpath_passport_picture;
                drEvent.destroy();
                drEvent.init();
                $('.dropify#passport_picture').dropify({
                        defaultFile: publicpath_passport_picture
                    });

                // $('div.identity_picture .dropify-render').css('display','block');
                // $('div.identity_picture .dropify-render').html('<span class="dropify-render"><img src="'+publicpath_passport_picture+'"></span>')
            }else{
                $(".dropify-clear").click();
                $('#passport_picture').dropify();

            }
            if(identity_picture !="") {

                // $('div.passport_picture').after('<input type="hidden" name="passport_picture_old" value="'+identity_picture+'"');
                var drEvent = $('.dropify#identity_picture').dropify();
                drEvent = drEvent.data('dropify');
                drEvent.resetPreview();
                drEvent.clearElement();
                drEvent.settings.defaultFile = publicpath_identity_picture;
                drEvent.destroy();
                drEvent.init();
                $('.dropify#identity_picture').dropify({
                    defaultFile: publicpath_identity_picture,
                });
            }else{

                $(".dropify-clear").click();
                $('.dropify#identity_picture').dropify({});

            }
            if(gender == "male"){
                $('input#male').iCheck('check');

                $('#gender').val('male');

                console.log("malemalemalemalemalemalem")
                // $('input#male').iCheck('check', function(){
                //     // alert('Well done, Sir');
                //     $('input#female').removeAttr('checked')
                //     $('input#male').attr('checked', 'checked');
                // });
                // $('.i-radio input#male').parent().addClass('checked');
                // $('.i-radio input#male').iCheck('check');
                // $('input#male').attr('checked', 'checked');
                // $('input#male').iCheck('check');
                //
                // $('.i-radio input#male').on('ifChecked', function(event){
                //     console.log("male male");
                // });


            }else if(gender == "female") {
                $('input#female').iCheck('check');
                $('#gender').val('female');
                console.log("femalefemalefemalefemalefemale")
                // $('input#female').attr('checked', 'checked');
                // $('.i-radio input#female').iCheck('check');
                // $('.i-radio input#female').on('ifChecked', function(event){
                //     console.log("female female");
                // });
                // $('input#female').iCheck('check', function(){
                //     // alert('Well done, Sir');
                //     $('input#male').removeAttr('checked')
                //     $('input#female').attr('checked', 'checked');
                // });
                // $('.i-radio input#female').parent().addClass('checked');
                // $('input#female').iCheck('check');

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
                if(event.target.id == 'passport_picture'){

                    $('#passport_picture_delete').val('deleted');

                }

                if(event.target.id == 'identity_picture'){

                    $('#identity_picture_delete').val('deleted');

                }
                //return confirm("Do you really want to delete \"" + element.filename + "\" ?");
            });




            // $('#passport_picture_delete').val('deleted');
            // $('#identity_picture_delete').val('deleted');



            // $('#is_primary').val(is_primary);
            $('#modal').modal('show');


        }
        console.log($('#passenger_form_submite').find('[type=radio]'))

        $('#passenger_form_submite').find('[type=radio]').on('change', function() {
            alert($('input[name=gender_1]:checked', '#passenger_form_submite').val());
        });


        $('input').on('ifClicked', function (event) {
            var value = $(this).val();

            if(value != ''){

                $('#gender').val(value);
                console.log("You clicked " + value);
            }

        });

        $('.checkInp input:checkbox').on('click', function(e) {
            e.stopImmediatePropagation();
            var checked = (e.currentTarget.checked) ? false : true;
            e.currentTarget.checked=(checked) ? false : checked.toString();
        });
        //
        //
        // $('input').on('ifUnchecked', function(event){
        //     var value = $(this).val();
        //     alert(event.type + ' callback'+ value);
        // });





        function saveforms() {


            // document.getElementById('payment_form_submite').submit();
            $('#passenger_form_submite').submit();

        }

        function showmodel(){

            // var drEvent = $('.dropify#passport_picture').dropify();
            // drEvent = drEvent.data('dropify');
            // drEvent.resetPreview();
            // drEvent.clearElement();
            //
            // var drEvent1 = $('.dropify#identity_picture').dropify();
            // drEvent1  = drEvent1.data('dropify');
            // drEvent1.resetPreview();
            // drEvent1.clearElement();

            $(".dropify-clear").click();

            $('#modal').modal('show');

            $('.dropify#passport_picture').dropify({
                messages: {
                    'default': 'Drop Passport Here'
                }
            });

            $('.dropify#identity_picture').dropify({
                messages: {
                    'default': 'Drop Photo Id Here'
                }
            });



        }

        // <button onclick="$(this).closest('article').remove();" type="button" class="close" ><span aria-hidden="true">×</span></button>
        $('#add_drag_drop, #add_button_popup_drag_drop').click(function () {

            var stucture = '        \t\t\t\t\t\t\t\t\t\t\t\t<div class=\'timeline-add-new-area\'>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t<div class="timeline-caption">\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t\t<div class=" bootstrap-modal-form-open padding-default text-center p-relative panel arrow arrow-left c-pointer" onclick="showmodel();">\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<br>\n' +
                '\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h5 class="text-center">Click to add</h5><br><span class="ham_burger my-handle"><i class="fas fa-bars fa-lg"></i></span>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t\t</div>\n' +
                '        \t\t\t\t\t\t\t\t\t\t\t\t</div>\n';


            $('.append_artical').append('<article  style="position: relative;opacity:0;margin-left:300px;" class="timeline-item new-artical black-text"></article>').children("article:last").animate({
                opacity: 1,
                marginLeft: '0px'
            }, 1000, "easeOutElastic");

            jQuery('.new-artical').html(stucture, 500);
        });

        //clear-model data

        $('#modal-1').on('hidden.bs.modal', function (e) {
            $(this)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
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
    </script>
@endsection