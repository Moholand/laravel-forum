@extends('layouts.app')

@section('content')

@foreach($discussions as $discussion)
<div class="card mb-4 shadow">
    @include('partials.header')

    <div class="card-body">
      <div class="text-center">
        <h4>
          {{ $discussion->title }}
        </h4>
      </div>
      <div class="text-center">
        {{ strip_tags(substr($discussion->content, 0, 70) . '...') }}
      </div>
    </div>

    @include('partials.footer')
</div>
@endforeach

{{ $discussions->appends(['channel' => request()->query('channel')])->links() }}

@endsection
