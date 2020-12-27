@extends('layouts.app')

@section('content')
<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">{{ $foundation_data->name}}</h1>
    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
    <hr class="my-4">
    <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
    <div class="row justify-content-end">
    @if ($role_status == 1)
      <a class="btn btn-primary ml-2" href="#" role="button">Edit</a>
      <a class="btn btn-secondary ml-2" href="#" role="button">Disband</a>
    @elseif($role_status == 2)
      <a class="btn btn-secondary ml-2 btn-lg" href="#" role="button">Quit</a>
    @else 
      <form action="{{ route('become-member', $foundation_data->id ) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn ml-2 btn-primary btn-lg">{{ __('Become a Member') }}</button>
      </form>
    @endif
    
    </div>
  </div>
  <div class="row">
    <div class="col-12 col-md-3">
      <div class="card">
        <div class="card-header">{{ __('Foundation Member') }}</div>
        <div class="card-body">
          <div class="list-group">
            @foreach ($foundation_data->members as $member)
              @if ($member->role_id == 1)
                <a href="{{ route('profile', $member->user->id ) }}" class="list-group-item list-group-item-action">{{ $member->user->name }} <span class="text-black-50">| {{ __('Owner') }} </span></a>
              @else
                <a href="{{ route('profile', $member->user->id ) }}" class="list-group-item list-group-item-action">{{ $member->user->name }}</a>
              @endif
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">

    </div>
    <div class="col-12 col-md-3"
    ></div>
  </div>
</div>
@endsection