<div class="card-footer d-flex justify-content-between align-items-center">

  <div>
    <span class="mr-2">
      {{ $discussion->replies->count() }} Replies
    </span>

    <span>
      Like
    </span>
  </div>
  
  <div>
    <a href="{{ route('discussions.index') }}?channel={{ $discussion->channel->slug }}" class="btn btn-outline-info btn-sm" style="color: #000000 !important">{{ $discussion->channel->name }}</a>
  </div>
  
</div>