@extends('layouts.layout')

@section('content')

<div class="form-block">

   <div class="form-title">Rejestracja</div>

   <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-part">
         <label for="name" >Imię</label>
         <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

         @error('name')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
         @enderror
      </div>

      <div class="form-part">
         <label for="email" >Adres E-mail</label>
         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

         @error('email')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
         @enderror
      </div>

      <div class="form-part">
         <label for="password">Hasło</label>
         <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

         @error('password')
            <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
            </span>
         @enderror
      </div>

      <div class="form-part">
         <label for="password-confirm">Powtórz hasło</label>
         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
      </div>

      <div class="form-part">
         <button type="submit" class="btn btn-primary">
         Zarejestruj
         </button>
      </div>
   </form>

</div>

@endsection