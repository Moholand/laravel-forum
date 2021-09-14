@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header h4 font-weight-bolder">
            {{ isset($channel) ? 'Edit Channel: ' .  $channel->name  : 'Create Channel' }}
          </div>
          <div class="card-body">
            <form action="{{ isset($channel) ? route('channels.update', ['channel' => $channel->id]) : route('channels.store') }}" method="POST">
              @csrf

              @if(isset($channel))
                  @method('PUT')
              @endif

              <div class="form-group">
                <label for="channel">Channel Name</label>
                <input type="text" name="channel" class="form-control" value="{{ isset($channel) ? $channel->name : '' }}">
              </div>

              <div class="form-group">
                <div class="text-center">
                  <button type="submit" class="btn btn-success">
                    {{ isset($channel) ? 'Update' : 'Create' }}
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection