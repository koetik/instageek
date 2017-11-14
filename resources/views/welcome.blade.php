@extends('layouts.app')
@section('content')
    @if($posts->count() > 0)
        @foreach($posts as $post)
        <div class="ui centered card fluid text container">
            <div class="content">
                <div class="right floated meta">{{$post->created_at}}</div>
                <img class="ui avatar image" src="{{asset('storage/'.$post->user->profile_picture)}}"> {{$post->user->username}}
            </div>
            <div class="image">
                <img class="ui image" src="{{asset($post->photo)}}">
            </div>
            <div class="content">
                <span class="right floated">
                    @if($post->likeIsAvailable())
                    <i class="red heart like icon" 
                        data-uid="{{$post->uid}}" 
                        data-id="{{$post->likeIsAvailable()}}"></i>
                    @else
                    <i class="heart outline like icon" data-uid="{{$post->uid}}"></i>
                    @endif
                    <span class="like_count">{{$post->like_count}}</span> likes
                </span>
                <i class="comment icon"></i>
                <span class="comment_count">{{$post->comment_count}}</span> comments
                <div class="description">
                    <p><a class="name" href="#">{{$post->user->username}}</a> {{$post->caption}}</p>
                </div>
                <div class="ui divider hidden"></div>
                @if($post->comment_count > 0)
                    @foreach($post->comment as $comment)
                        <div class="description">
                          <p><a class="name" href="#"><strong>{{$comment->user->username}}</strong></a> {{$comment->comment}}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="extra content">
                <div class="ui form large transparent left icon input fluid">
                    <i class="heart outline icon"></i>
                    <input type="text" class="comment" name="{{$post->uid}}" placeholder="Add Comment...">
                </div>
            </div>
        </div>
        <div class="ui divider hidden"></div>
        <div class="ui divider hidden"></div>
        @endforeach
    @endif
    <div class="bottom"></div>

@push('script')
<script type="text/javascript" src="{{ asset('js/app/home.js') }}"></script>
@endpush
@endsection
