<div class="card-header bg-light">
  <div class="d-flex justify-content-between">
    <div>
      <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->author->email) }}">
      <strong class="ml-3 text-dark"><span class="text-primary">{{ $discussion->author->name }}</span> <span class="text-danger">({{ $discussion->author->points }})</span></strong>
      <span>({{$discussion->created_at->diffForHumans() }})</span>
    </div>

    @if(isset($discussions))
      <div>
        <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-outline-info btn-sm text-dark shadow-lg">View</a>
      </div>
    @else 
      @if(auth()->user()->id === $discussion->user_id)
        <div>
          <a href="{{ route('discussions.edit', ['discussion' => $discussion->slug]) }}" class="btn btn-outline-info btn-sm text-dark shadow-lg">Edit</a>
        </div>
      @endif
    @endif
  </div>
</div>