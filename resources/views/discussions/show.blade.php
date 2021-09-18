@extends('layouts.app')

@section('content')

<div class="card">
  @include('partials/header')

  <div class="card-body">
    <div class="text-center">
      <strong>
        {{ $discussion->title }}
      </strong>
    </div>

    <hr>

    {!! $discussion->content !!}

    @if($discussion->bestReply)
      <div class="card mt-4">
        <div class="card-header bg-primary text-white">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <img class="mr-3" width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->bestReply->owner->email) }}">
              {{ $discussion->bestReply->owner->name }}
            </div>

            <div>
              Best Reply
            </div>
          </div>
        </div>

        <div class="card-body">
          {!! $discussion->bestReply->content !!}
        </div>
      </div>
    @endif

  </div>

  @include('partials.footer')
  
</div>

@foreach($discussion->replies()->paginate(3) as $reply)
  <div class="card mt-5">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <div>
          <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($reply->owner->email) }}">
          <span class="ml-3">{{ $reply->owner->name }}</span>
        </div>

        <div>
          @auth
            @if(auth()->user()->id === $discussion->user_id)
              <form action="{{ route('discussions.mark', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm btn-info">
                  Mark as Best reply
                </button>
              </form>
            @endif
          @endauth
        </div>
      </div>
    </div>

    <div class="card-body">
      {!! $reply->content !!}
    </div>

    <div class="card-footer">
      @if($reply->is_liked_by_auth_user())
        <a href="{{ route('reply.unlike', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}" class="btn btn-danger btn-sm">UnLike</a>
      @else
        <a href="{{ route('reply.like', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}" class="btn btn-success btn-sm">Like</a>
      @endif
      <span class="badge bg-danger text-white">{{ $reply->likes->count() }}</span>
    </div>

  </div>
@endforeach

<div class="my-3">
  {{ $discussion->replies()->paginate(3)->links() }}
</div>

<div class="card mt-3 shadow">
  <div class="card-header bg-info text-white">
    Add Reply
  </div>

  <div class="card-body">
    @auth
      <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
          @csrf
          <input type="hidden"name="content" id="content">
          <trix-editor input="content"></trix-editor>
          <button type="submit" class="btn btn-success mt-3">
            Add Reply
          </button>
        </form>
      </div>
    @else
      <a href="{{ route('login') }}" class="btn btn-info">
        Sign in for Reply
      </a>
    @endauth
</div>

@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
@endsection
