{{--@extends('layouts.app')--}}

{{--@section('content')--}}

{{--    @if(auth()->user()->following->count()==0)--}}

{{--        <div class="container">--}}
{{--            <div class="row justify-content-center" style="margin-top: 20%">--}}
{{--                <div class="col-8 offset-1 ">--}}

{{--                    <h1>Oops! your timeline is empty</h1>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    @else--}}

{{--   @foreach( $posts as $post)--}}

{{--        <div class="row pt-3">--}}

{{--            whole the post --}}
{{--            <div class="col-4 offset-1 ">--}}


{{--                --}}{{--                      username with img top of post--}}

{{--                <div class="col-6 offset-3">--}}
{{--                    <div class="d-flex align-items-center">--}}
{{--                        <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle w-100" style="max-width: 40px;">--}}
{{--                        <a class="font-weight-bold" href="/profile/{{$post->user->id}}"> <span class="pl-2 text-dark">{{$post->user->username}}</span> </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                    <img class="pl-5 ml-5 pt-1" src="/storage/{{$post->image }}">--}}
{{--            </div>--}}
{{--            <./>--}}
{{--        </div>--}}

{{--        --}}{{--  userName Caption  --}}
{{--    <div class="row pt-2 pb-5">--}}

{{--        <div class="col-6 offset-3">--}}
{{--            <p class="ml-1">--}}
{{--                  <span class=" pl-2 ml-4">--}}
{{--                      --}}{{--username--}}
{{--                      <a class="font-weight-bold pl-5 ml-5 pb-1" href="/profile/{{$post->user->id}}">--}}
{{--                          <span class="text-dark">{{$post->user->username}}</span>--}}
{{--                      </a>--}}
{{--                      --}}{{--caption--}}
{{--                      {{$post->caption}}--}}
{{--                  </span>--}}
{{--            </p>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    @endforeach--}}
{{--    @endif--}}

{{--    <a href="{{$posts->previousPageUrl()}}">--}}
{{--        <img src="/svg/next.svg" style="max-width: 3%; transform: rotate(180deg)">      </a>--}}
{{--    @for($i=0;$i<=$posts->lastPage();$i++)--}}
{{--        <!-- a Tag for another page -->--}}

{{--        <a href="{{$posts->url($i)}}"> @if($i%3!=0)<img src="/svg/DotIcon.svg" style="max-width:2%"> @endif</a>--}}

{{--    @endfor--}}
{{--    <!-- a Tag for next page -->--}}
{{--    <a href="{{$posts->nextPageUrl()}}">--}}
{{--        <img src="/svg/next.svg" style="max-width: 3%">       </a>--}}

{{--    <div class="row">--}}
{{--        <div class="col-12 d-flex justify-content-center ">--}}
{{--            {{ $posts->links() }}--}}
{{--        </div>--}}
{{--    </div>--}}

{{--@endsection--}}

@extends('layouts.app')
@section('content')

    <div class="container">

        @if(auth()->user()->following->count()==0)

            <div class="container">
                <div class="row justify-content-center" style="margin-top: 20%">
                        <h1>Oops!  You are not following anyone</h1>
                </div>
            </div>

        @else

        @foreach($posts as $post)

            <div class="row pt-3">
                <div class="col-6 offset-3">

{{--                    username and "img profile"  top of the post --}}
                    <div class="pb-2">
                        <a class="font-weight-bold" href="/profile/{{$post->user->id}}">
                    <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle w-100" style="max-width: 40px;">
                        </a>
                        {{--                    "username" and img profile  top of the post --}}
                    <a class="font-weight-bold" href="/profile/{{$post->user->id}}">
                        <span class="pl-2 text-dark">{{$post->user->username}}</span>
                    </a>
                    </div>
                         {{--itself post --}}
                    <img src="/storage/{{$post->image}}" class="w-100" >

                </div>

            </div>

            <div class="row pt-2 pb-5">

                <div class="col-6 offset-3">
                        <p>
                    <span  class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}">
                            <span class="text-dark">{{$post->user->username}} </span>
                        </a>
                    </span> {{ $post->caption }}
                        </p>
                </div>

            </div>
        @endforeach

    </div>
    @endif
@endsection
