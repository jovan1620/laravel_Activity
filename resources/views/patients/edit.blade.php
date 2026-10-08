@extends('layouts.app')

@section('title', 'Edit Patient')

@section('content')

<div class="card">

    <h1>Edit Patient</h1>

    <form action="{{ route('patients.update', $patient) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Name</label>

        <input type="text"
               name="name"
               value="{{ old('name', $patient->name) }}"
               required>

        <label>Email</label>

        <input type="email"
               name="email"
               value="{{ old('email', $patient->email) }}">

        <label>Phone</label>

        <input type="text"
               name="phone"
               value="{{ old('phone', $patient->phone) }}">

        <label>Address</label>

        <textarea name="address"
                  rows="4">{{ old('address', $patient->address) }}</textarea>

        <button type="submit"
                class="btn btn-warning">
            Update Patient
        </button>

        <a href="{{ route('patients.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
