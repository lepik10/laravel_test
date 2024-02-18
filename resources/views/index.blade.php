@extends('templates.main')

@section('content')
    <div class="py-5">
        <h2 class="mb-5">Авторизация</h2>
        @error('auth')
        <div class="alert alert-danger py-1 mt-3" role="alert">
            {{ $message }}
        </div>
        @enderror
        <form action="{{ route('auth.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
                @error('email')
                <div class="alert alert-danger py-1 mt-3" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" name="password" class="form-control" id="password">
                @error('password')
                <div class="alert alert-danger py-1 mt-3" role="alert">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </div>
@endsection
