<header id="main-header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a class="logo" href="{{url('/')}}">
                        <img src="{{ asset('img/logo-invert.png')}}" alt="Nudigo Travel Happy" title="Nudigo" />
                    </a>
                </div>
                <div class="col-md-3 col-md-offset-2">

                </div>
                <div class="col-md-4">
                    <div class="top-user-area clearfix">
                        <ul class="top-user-area-list list list-horizontal list-border">
                            @guest
                               {{--//no login--}}

                            @else
                                {{--Login User--}}
                                <li class="top-user-area-avatar">
                                    @if(!empty(Auth::User()->profile_picture))

                                    <img id="avatar_image" class="origin round" src="{{ asset('profileImage/small/'.Auth::User()->profile_picture)}}" alt="Nudigo Travel Happy" title="AMaze" />


                                    @else

                                    <img id="avatar_image" class="origin round" src="{{ asset('profileImage/small/40x40.png')}}" alt="Nudigo Travel Happy" title="AMaze" />


                                    @endif
                                   </li>
                                <li class="top-user-area-avatar nav-drop">

                                    <a href="#">

                                        Hi, {{ Auth::user()->name }}
                                        <i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i>


                                    </a>
                                    <ul class="list nav-drop-menu">
                                        <li><a href="{{route('team.dashboard')}}">Home</a></li>
{{--                                        <li><a href="{{ route('profile') }}">Profile</a>--}}
                                        </li>
                                        {{--<li><a href="{{ route('passenger') }}">Passenger</a>--}}
                                        {{--</li>--}}
                                        {{--<li><a href="{{ route('payment') }}">Payment</a>--}}
                                        {{--</li>--}}
                                        <li>
                                            <a class="dropdown-item" href="{{ route('team.logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign Out</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>

                                    </ul>

                                </li>
                                {{--<li class="top-user-area-avatar">--}}
                                    {{--<a href="#">--}}
                                        {{--<img class="origin round" src="{{ asset('img/40x40.png')}}" alt="Nudigo Travel Happy" title="AMaze" />Hi, {{ Auth::user()->name }}--}}
                                    {{--</a>--}}
                                {{--</li>--}}

                            @endguest

                            <li class="nav-drop"><a href="#">USD $<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i></a>
                                <ul class="list nav-drop-menu">
                                    <li><a href="#">EUR<span class="right">€</span></a>
                                    </li>
                                    <li><a href="#">GBP<span class="right">£</span></a>
                                    </li>
                                    <li><a href="#">JPY<span class="right">円</span></a>
                                    </li>
                                    <li><a href="#">CAD<span class="right">$</span></a>
                                    </li>
                                    <li><a href="#">AUD<span class="right">A$</span></a>
                                    </li>
                                </ul>
                            </li>
                            {{--<li class="top-user-area-lang nav-drop">--}}
                                {{--<a href="#">--}}
                                    {{--<img src="{{ asset('img/flags/32/uk.png')}}" alt="English" title="ENG" />ENG<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i>--}}
                                {{--</a>--}}
                                {{--<ul class="list nav-drop-menu">--}}
                                    {{--<li>--}}
                                        {{--<a title="German" href="#">--}}
                                            {{--<img src="{{ asset('img/flags/32/de.png')}}" alt="Germany" title="GER" /><span class="right">GER</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a title="Japanise" href="#">--}}
                                            {{--<img src="{{ asset('img/flags/32/jp.png')}}" alt="Japan" title="JAP" /><span class="right">JAP</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a title="Italian" href="#">--}}
                                            {{--<img src="{{ asset('img/flags/32/it.png')}}" alt="Italy" title="ITA" /><span class="right">ITA</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a title="French" href="#">--}}
                                            {{--<img src="{{ asset('img/flags/32/fr.png')}}" alt="France" title="FRE" /><span class="right">FRE</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a title="Russian" href="#">--}}
                                            {{--<img src="{{ asset('img/flags/32/ru.png')}}" alt="Russia" title="RUS" /><span class="right">RUS</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                    {{--<li>--}}
                                        {{--<a title="Korean" href="#">--}}
                                            {{--<img src="{{ asset('img/flags/32/kr.png')}}" alt="Korea" title="KOR" /><span class="right">KOR</span>--}}
                                        {{--</a>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>