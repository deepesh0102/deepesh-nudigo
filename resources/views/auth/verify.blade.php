{{--/**--}}
{{--* Created by PhpStorm.--}}
{{--* User: Deepesh Patel--}}
{{--* Date: 02-02-2019--}}
{{--* Time: 07:06--}}
{{--*/--}}

@extends('layouts.frontLayout.front_design')

@section('style')
    <style>

    </style>
@endsection


@section('content')

    <!-- TOP AREA -->
    <div class="gap"></div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <i class="fas fa-check round box-icon-large box-icon-center box-icon-success mb30"></i>
                <h2 class="text-center">Please verify your email</h2>
                <h5 class="text-center mb30">Welcome to Nudigo</h5>
                <div class="card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A new verification link has been sent to your email address') }}
                        </div>
                    @endif

                    {{ __('Please check your email to activate your account') }}
                    {{ __("Didn't get an email? Check Spam Junk or") }}, <a href="{{ route('verification.resend') }}">{{ __('RESEND VERIFY EMAIL') }}</a>.
                </div>
                


            </div>
        </div>
        <div class="gap"></div>
    </div>
    <!-- END TOP AREA  -->
@endsection


@section('script')
    <script type="text/javascript">

    </script>
@endsection