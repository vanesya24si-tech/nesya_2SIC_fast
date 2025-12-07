@extends('layouts.auth.app')
@section('content')
<div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-100 fmxw-500">

    <div class="text-center mb-4">
        <h1 class="h3">Create your account</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('auth.register') }}" method="POST" class="mt-4">
        @csrf

        <!-- Name -->
        <div class="form-group mb-4">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <!-- Email -->
        <div class="form-group mb-4">
            <label for="email">Your Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <!-- Password -->
        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <!-- Confirm Password -->
        <div class="form-group mb-4">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <!-- ROLE DROPDOWN -->
        <div class="form-group mb-4">
            <label for="role">Role</label>
            <select name="role" class="form-control" required>
                <option value="">-- Pilih Role --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role }}">{{ $role }}</option>
                @endforeach
            </select>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-gray-800">Sign Up</button>
        </div>
    </form>

    <div class="text-center mt-4">
        <span class="fw-normal">
            Already have an account?
            <a href="{{ route('auth.index') }}" class="fw-bold">Sign in</a>
        </span>
    </div>

</div>
@endsection
