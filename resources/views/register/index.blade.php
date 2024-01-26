<!-- resources/views/register/create.blade.php -->

@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-md-6">

        <main class="form-signin w-100 m-auto">
            <h1 class="h3 mb-3 fw-normal text-center">Register</h1>
            <form action="/register" method="post">
              @csrf
              <div class="form-floating">
                <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" autofocus required>
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
              </div>
              <div class="form-floating">
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
              <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
            </form>
          </main>
    </div>
</div>
@endsection
