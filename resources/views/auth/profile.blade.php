@extends('layouts.app')

@section('content')
    
    <div class="container">
        <h1> User Profile </h1>
        <br>
        <div class="form-group">
          <label for="name">User Name</label>
          <input name="name" type="text" class="form-control" id="name" placeholder="" maxlength="255" value="{{ $user->name }}" readonly>
        </div>
        <br>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input name="email" type="text" class="form-control" id="email" placeholder="" maxlength="255" value="{{ $user->email }}" readonly>
        </div>
        <br>
        <div class="form-group">
          <label for="role">Role</label>
          <input name="role" type="text" class="form-control" id="role" placeholder="" maxlength="255" value="{{ $role }}" readonly>
        </div>

    </div>

@endsection