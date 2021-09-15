<div class="card-header bg-info">
  <div class="d-flex justify-content-between">
    <div>
      <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($discussion->author->email) }}">
      <strong class="ml-3 text-white">{{ $discussion->author->name }}</strong>
    </div>

    <div>
      <a href="{{ route('discussions.show', $discussion->slug) }}" class="btn btn-primary btn-sm shadow-lg">View</a>
    </div>
  </div>
</div>