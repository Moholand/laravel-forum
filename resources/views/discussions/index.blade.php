@extends('layouts.app')

@section('content')

@foreach($discussions as $discussion)
<div class="card mb-4 shadow">
    @include('partials/header')

    <div class="card-body">
      <div class="text-center">
        <h4>
          {{ $discussion->title }}
        </h4>
      </div>
    </div>
</div>
@endforeach

{{ $discussions->appends(['channel' => request()->query('channel')])->links() }}

@endsection
