@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="{{ route('update-profile', ['id' => $user_data->id]) }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group row">
          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input name="name" type="text" class="form-control" id="inputName" value="{{ $user_data->name }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input name="email" type="email" class="form-control" id="inputEmail" value="{{ $user_data->email }}">
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
          <div class="col-sm-10">
            <input name="phone" type="tel" class="form-control" id="inputPhone" value="{{ $user_data->phone }}">
          </div>
        </div>
        <div class="form-group  row">
          <label for="inputCountry" class="col-sm-2 col-form-label">Country</label>
          <div class="col-sm-10">
            <select name="country" id="inputCountry" class="form-control">
              <option></option>
              <option>Indonesia</option>
              <option>...</option>
            </select>
          </div>
        </div>
        <div class="form-group row justify-content-center">
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection