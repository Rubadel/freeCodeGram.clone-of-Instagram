@extends('layouts.app')

@section('content')
    <div class="col-lg-12 ml-lg-5 pl-lg-5 ">
<div class="container col-lg-12 ml-lg-5 pl-lg-5">

   @foreach( $posts as $post)
        <div class="row">

            <div class="col-4 pl-5 ml-lg-5">
                {{-- username with profile-img--}}

                <div class="col-4 pb-1 pl-5 ml-lg-5">
                    <div class="d-flex align-items-center">

                        <img src="{{ $post->user->profile->profileImage() }}" class=" rounded-circle w-100" style="max-width: 40px;">
                        <a class="font-weight-bold" href="/profile/{{$post->user->id}}"> <span class="pl-2 text-dark">{{$post->user->username}}</span> </a>

                    </div>
                </div>


                    <img class="pl-5 ml-5 pt-1" src="/storage/{{$post->image }}">
            </div>

        </div>

{{--  userName Caption  --}}
    <div class="row pb-4">
                <div class="col-4 pl-5 ml-3 pt-1">
                    <p class="ml-1">
                        <span class=" pl-2 ml-4"> <a class="font-weight-bold pl-5 ml-5 pb-1" href="/profile/{{$post->user->id}}">
                                <span class="text-dark">{{$post->user->username}}</span>
                            </a> {{$post->caption}}
                        </span>
                    </p>
                </div>
        </div>

    @endforeach


    <div class="row">
        <div class="col-12 d-flex justify-content-center ">
            {{ $posts->links() }}
        </div>
    </div>
</div>
    </div>
@endsection
