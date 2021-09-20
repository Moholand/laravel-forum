<div class="card-header bg-light">
  <div class="d-flex justify-content-between">
    <div>
      <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->author->email) }}">
      <strong class="ml-3 text-dark"><span class="text-primary">{{ $discussion->author->name }}</span> <span class="text-danger">({{ $discussion->author->points }})</span></strong>
      <span>({{$discussion->created_at->diffForHumans() }})</span>
    </div>

    <div>
      <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-info btn-sm shadow-lg">View</a>
    </div>
  </div>
</div>