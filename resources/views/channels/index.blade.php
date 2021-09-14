@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-header h4 font-weight-bolder">
            <div class="d-flex justify-content-between align-items-center">
              <span>Channels</span>
              <a class="btn btn-sm btn-info" href="{{ route('channels.create') }}">Add Channel</a>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </thead>
              <tbody>
                @foreach($channels as $channel)
                  <tr>
                    <td>{{ $channel->name }}</td>
                    <td>
                      <a href="{{ route('channels.edit', ['channel' => $channel->id]) }}" class="btn btn-sm btn-info">
                        Edit
                      </a>
                    </td>
                    <td>
                      <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection