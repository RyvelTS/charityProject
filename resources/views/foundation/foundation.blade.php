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
      <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#staticBackdrop">{{ __('Edit Information') }}</button>
      <a class="btn btn-secondary ml-2 mt-2" href="{{ route('disband-foundation', $foundation_data->id) }}" role="button">{{ __('Disband Foundation') }}</a>
    @elseif($role_status == 2)
      <a class="btn btn-secondary ml-2 btn-lg" href="{{ route('quit-member', $foundation_data->id ) }}" role="button">{{ __('Leave Foundation') }}</a>
    @else 
      <a class="btn btn-primary ml-2 btn-lg" href="{{ route('become-member', $foundation_data->id ) }}" role="button">{{ __('Become Member') }}</a>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">{{ __('Edit Foundation') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('edit-foundation', $foundation_data->id) }}" method="POST">
          {{ csrf_field() }}
          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">{{ __('Name') }}</label>
            <div class="col-sm-10">
              <input name="name" type="text" readonly class="form-control-plaintext" id="inputName" placeholder="{{ __('Foundation Name') }}" value="{{ $foundation_data->name }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">{{ __('Email') }}</label>
            <div class="col-sm-10">
              <input name="email" type="email" class="form-control" id="inputEmail" placeholder="{{ __('Foundation Email') }}" value="{{ $foundation_data->email }}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPhone" class="col-sm-2 col-form-label">{{ __('Phone') }}</label>
            <div class="col-sm-10">
              <input name="phone" type="tel" class="form-control" id="inputPhone" placeholder="{{ __('Foundation Phone Number') }}"value="{{ $foundation_data->phone }}">
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
              <input name="bank_account_number" type="text" class="form-control" id="inputBank" placeholder="{{ __('Foundation Bank Account Number') }}" value="{{ $foundation_data->bank_account_number}}">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
        <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection