@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5" >
                <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-100">
            </div>
            <div class="col-9  pt-5">

                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-3">
                        <div class="h4">{{ $user->username}}</div>

                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                    <a class="pt-5" href="/p/create"> Add New Post</a>
                    @endcan

                </div>

                <div class="d-flex">
                    <div class="pr-4"> <strong>{{$postCount}}</strong> Post</div>
                    <div class="pr-4"> <strong>{{$followersCount}}</strong> followers</div>
                    <div class="pr-4"> <strong>{{$followingCount}}</strong> following</div>
                </div>

                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url}}</a></div>
            </div>
        </div>

        <div class="pl-lg-5" >
                @can('update', $user->profile)
                    <a class="pl-5" href="/profile/{{$user->id}}/edit"> Edit Profile</a>
                @endcan
        </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)

                <div class="col-4 pb-4">
                    <a href="/p/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" width="80%" height="60%">
                    </a>
                </div>

            @endforeach
        </div>
    </div>

@endsection