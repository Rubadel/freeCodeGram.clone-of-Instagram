@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-3 p-5" >
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
            </div>

            <div class="col-9  pt-5">

                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center ">
                        <div class="font-weight-bolder h4 text-uppercase">{{ $user->username}}</div>

                    </div>

                    <div>
                        @cannot('update', $user->profile)
                            <follow-button class=" pt-5 pr-5" user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                        @endcannot
                    </div>


                    @can('update', $user->profile)
                        <img src="https://static.thenounproject.com/png/2796180-200.png" width="6%" height="6%"
                            onclick="window.location='{{ url('/p/create') }}' " >
                    @endcan

                </div>

                <div class="d-flex pb-2">
                    <div class="pr-4"> <strong>{{$postCount}}</strong> Post</div>
                    <div class="pr-4"> <strong>{{$followersCount}}</strong> followers</div>
                    <div class="pr-4"> <strong>{{$followingCount}}</strong> following</div>
                </div>

                <div class="pt-4 font-weight-bold" style="font-size: 103%">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url}}</a></div>

            </div>
        </div>


        <div>
                @can('update', $user->profile)
                    <button class="w-100" style="background-color: white; border-width: thin;
                     -webkit-text-stroke-width: thick"
                            onclick="window.location='{{ url('/profile/'.$user->id.'/edit') }}'" >Edit Profile </button>
                @endcan
        </div>

        <div class="row">
            @foreach($user->posts as $post)

                <div class="col-4">
                    <a href="/p/{{$post->id}}">
                        <img class="mr-4 mt-4" src="/storage/{{$post->image}}" >

{{--                        style="width: 80%; height: 70%"--}}

                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endsection
