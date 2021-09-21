<div class="col-md-4">
    @auth
        <a href="{{ route('discussions.create') }}" style="width: 100%; color: #ffffff" class="btn btn-info mb-3 shadow">
            Add Discussion
        </a>
    @else
        <a href="{{ route('login') }}" style="width: 100%; color: #ffffff" class="btn btn-info mb-3 shadow">
            Sign in for Add Discussion
        </a>
    @endauth

    <div class="card bg-light shadow mb-3">
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('discussions.index') }}" style="text-decoration: none; font-weight: bold">Home</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header">
            @if(auth()->check() && auth()->user()->admin)
                <a href="{{ route('channels.index') }}" class="font-weight-bold text-dark" style="text-decoration: none">Channels</a>
            @else
                Channels
            @endif
        </div>

        <div class="card-body">
            <ul class="list-group">
                @foreach($channels as $channel)
                    <li class="list-group-item">
                        <a href="{{ route('discussions.index') }}?channel={{$channel->slug}}" style="text-decoration: none">
                            {{$channel->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>