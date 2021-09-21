@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
      @if(isset($discussion))
        Edit Discussion
      @else
        Add Discussion
      @endif
    </div>

    <div class="card-body">
      <form action="{{ (isset($discussion)) ? route('discussions.update', ['discussion' => $discussion->slug]) : route('discussions.store') }}" method="POST">
        @csrf

        @if(isset($discussion))
          @method('PUT')
        @endif

        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" id="title" name="title" class="form-control mt-2" value="{{ isset($discussion) ? $discussion->title : old('title') }}">
        </div>

        <div class="form-group my-3">
          <label for="content">Content</label>
          <input id="content" type="hidden" name="content" value="{{ isset($discussion) ? $discussion->content : old('content') }}">
          <trix-editor input="content"></trix-editor>
        </div>

        <div class="form-group">
          <label for="channel">Channel</label>
          <select name="channel" id="channel" class="form-control mt-2">
            @foreach($channels as $channel)
              <option value="{{ $channel->id }}" {{ ($discussion->channel_id === $channel->id) ? "selected" : "" }}>
                {{ $channel->name }}
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit" name="submit" class="btn btn-success mt-3">
          @if(isset($discussion))
            Update Discussion
          @else
            Create Discussion
          @endif
        </button>

      </form>
    </div>
</div>
@endsection

@section('css')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection

@section('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
@endsection
