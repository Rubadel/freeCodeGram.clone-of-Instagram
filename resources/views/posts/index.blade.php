{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--    <div class="col-lg-12 ml-lg-5 pl-lg-5 ">--}}
{{--<div class="container col-lg-12 ml-lg-5 pl-lg-5">--}}

{{--    @if($posts != null)--}}

{{--        <div class="container">--}}
{{--            <div class="row justify-content-center" style="margin-top: 20%">--}}
{{--                <div class="col-8 offset-1 ">--}}

{{--                    <h1>Oops! your timeline is empty</h1>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    @else--}}

{{--   @foreach( $posts as $post)--}}

{{--        <div class="row justify-content-center ">--}}

{{--            <div class="col-4 offset-1 ">--}}
{{--                --}}{{-- username with profile-img--}}

{{--                <div class="col-4 pb-1 pl-5 ml-lg-5">--}}
{{--                    <div class="d-flex align-items-center">--}}

{{--                        <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle w-100" style="max-width: 40px;">--}}
{{--                        <a class="font-weight-bold" href="/profile/{{$post->user->id}}"> <span class="pl-2 text-dark">{{$post->user->username}}</span> </a>--}}

{{--                    </div>--}}
{{--                </div>--}}


{{--                    <img class="pl-5 ml-5 pt-1" src="/storage/{{$post->image }}">--}}
{{--            </div>--}}

{{--        </div>--}}

{{--  userName Caption  --}}
{{--    <div class="row pb-4">--}}
{{--                <div class="col-4 pl-5 ml-3 pt-1">--}}
{{--                    <p class="ml-1">--}}
{{--                        <span class=" pl-2 ml-4"> <a class="font-weight-bold pl-5 ml-5 pb-1" href="/profile/{{$post->user->id}}">--}}
{{--                                <span class="text-dark">{{$post->user->username}}</span>--}}
{{--                            </a> {{$post->caption}}--}}
{{--                        </span>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--        </div>--}}

{{--    @endforeach--}}

{{--    @endif--}}

{{--    <div class="row">--}}
{{--        <div class="col-12 d-flex justify-content-center ">--}}
{{--            {{ $posts->links() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--    </div>--}}
{{--@endsection--}}
@extends('layouts.app')
@section('content')

    <div class="container">

        @foreach($posts as $post)

            <div class="row pt-3">

                <div class="col-6 offset-3">
                    <div class="pb-1">
                    <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle w-100" style="max-width: 40px;">
                    <a class="font-weight-bold" href="/profile/{{$post->user->id}}"> <span class="pl-2 text-dark">{{$post->user->username}}</span> </a>
                    </div>

                    <img src="/storage/{{$post->image}}" class="w-100" >

                </div>
            </div>
            <div class="row pt-2 pb-5">

                <div class="col-6 offset-3">
                    <div>
                        <p>
                    <span  class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}} </span>
                        </a>

                    </span> {{ $post->caption }}
                        </p>

                    </div>
                </div></div>
        @endforeach

        @if(auth()->user()->following->count()!=0)
            <div class="row">
                <div class="col-12 offset-5">

                    <!-- a Tag for previous page -->
                    <a href="{{$posts->previousPageUrl()}}">
                        <img src="/svg/next.svg" style="max-width: 3%; transform: rotate(180deg)">      </a>
                @for($i=0;$i<=$posts->lastPage();$i++)
                    <!-- a Tag for another page -->

                        <a href="{{$posts->url($i)}}"> @if($i%3!=0)<img src="/svg/DotIcon.svg" style="max-width:2%"> @endif</a>

                @endfor
                <!-- a Tag for next page -->
                    <a href="{{$posts->nextPageUrl()}}">
                        <img src="/svg/next.svg" style="max-width: 3%">       </a>
                </div>
            </div>
    </div>


    @else
        <div class="container">
            <div class="row justify-content-center" style="margin-top: 20%">
                <div class="col-8 offset-1 ">

                    <h1>Opps!  You are not following anybody</h1>
                </div>
            </div>
        </div>

    @endif
@endsection
