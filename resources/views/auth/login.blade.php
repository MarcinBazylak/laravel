@extends('layouts.layout')

@section('content')

<div class="form-block">

   <div class="form-title">Zaloguj się</div>

   <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-part">
         <label for="email">E-mail</label>            
         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
         @error('email')
            <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
            </span>
         @enderror            
      </div>

      <div class="form-part">
         <label for="password">Hasło</label>            
         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

         @error('password')
            <span class="invalid-feedback" role="alert">
                  <strong>Podałeś nieprawidłowe dane!</strong>
            </span>
         @enderror            
      </div>

      <div class="form-part">         
         <button type="submit" class="btn">
            Zaloguj
         </button>         
      </div>

   </form>
</div>

@endsection
