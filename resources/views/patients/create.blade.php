@extends('layouts.app')

@section('title', 'Add Patient')

@section('content')

<div class="card">

    <h1>Add Patient</h1>

    <form action="{{ route('patients.store') }}"
          method="POST">

        @csrf

        <label>Name</label>
        <input type="text"
               name="name"
               value="{{ old('name') }}"
               required>

        <label>Email</label>
        <input type="email"
               name="email"
               value="{{ old('email') }}">

        <label>Phone</label>
        <input type="text"
               name="phone"
               value="{{ old('phone') }}">

        <label>Address</label>
        <textarea name="address"
                  rows="4">{{ old('address') }}</textarea>

        <button type="submit"
                class="btn btn-success">
            Save Patient
        </button>

        <a href="{{ route('patients.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
