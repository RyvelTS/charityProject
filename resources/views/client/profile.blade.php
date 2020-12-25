@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8 border">
      <ul class="list-group list-group-flush p-4">
        <li class="list-group-item">{{ __('Name') }}: {{ $user_data->name }}</li>
        <li class="list-group-item">{{ __('Email') }}: {{ $user_data->email }}</li>
        <li class="list-group-item">{{ __('Phone Number') }}: {{ $user_data->phone}}</li>
        <li class="list-group-item">{{ __('Country') }}: {{ $user_data->country}}</li>
        <li class="list-group-item">{{ __('Joined at') }}: {{ $user_data->created_at}}</li>
      </ul>
      <div class="w-100 d-flex justify-content-center mb-4">
        @if ($current_user != $user_data->id)
        @else
        <a href="{{ route('edit-profile', ['user' => $current_user]) }}" class="btn btn-primary" role="button" aria-disabled="true">{{ __('Edit My Information') }}</a>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection