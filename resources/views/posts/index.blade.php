@extends('layouts.app')
@section('content')

    <div class="container">

        @if(auth()->user()->following->count()==0)

            <div class="container">
                <div class="row justify-content-center" style="margin-top: 20%">
                        <h1>Oops! You are not following anyone</h1>
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
