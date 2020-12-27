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
      <h3>{{ __('Still quite over here') }}</h3>
    </div>
    <div class="col-12 col-md-3">
      <div class="card mb-4">
        <div class="card-header">{{ __('My Foundations') }}</div>
        <div class="card-body">
          <div class="list-group">
            @foreach ($foundation_list as $foundation)
            <a href="#" class="list-group-item list-group-item-action">{{ $foundation->name }}</a>
            @endforeach
            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#staticBackdrop">{{ __('Create Foundation') }}</button>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{ __('Create Foundation') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('create-foundation') }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
            <div class="col-sm-10">
              <input name="name" type="text" class="form-control" id="inputName" placeholder="{{ __('Foundation Name') }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
            <div class="col-sm-10">
              <input name="email" type="email" class="form-control" id="inputEmail" placeholder="{{ __('Foundation Email') }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPhone" class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
            <div class="col-sm-10">
              <input name="phone" type="tel" class="form-control" id="inputPhone" placeholder="{{ __('Foundation Phone Number') }}">
            </div>
          </div>
          <div class="form-group  row">
            <label for="inputCountry" class="col-sm-2 col-form-label">{{ __('Country') }}</label>
            <div class="col-sm-10">
              <select name="country" id="inputCountry" class="form-control">
                <option></option>
                <option>Indonesia</option>
                <option>...</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputBank" class="col-sm-2 col-form-label">{{ __('Account Number') }}</label>
            <div class="col-sm-10">
              <input name="bank_account_number" type="text" class="form-control" id="inputBank" placeholder="{{ __('Foundation Bank Account Number') }}">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
