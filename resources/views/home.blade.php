@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-md-3">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
              {{ session('status') }}
            </div>
          @endif
            {{ __('You are logged in!') }}
        </div>
      </div>
    </div>
    <div class="col-12 col-md-6">
      <h3>{{ __('You haven\'t become a member of any foundations') }}</h3>
    </div>
    <div class="col-12 col-md-3">
      <div class="card mb-4">
        <div class="card-header">{{ __('My Foundations') }}</div>
        <div class="card-body">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
            <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">{{ __('Joined Foundations') }}</div>
        <div class="card-body">
          <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
            <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
            <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
