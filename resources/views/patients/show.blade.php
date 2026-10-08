@extends('layouts.app')

@section('title', 'Patient Details')

@section('content')

<div class="card">

    <h1>Patient Details</h1>

    <p>
        <strong>Name:</strong>
        {{ $patient->name }}
    </p>

    <p>
        <strong>Email:</strong>
        {{ $patient->email ?? 'N/A' }}
    </p>

    <p>
        <strong>Phone:</strong>
        {{ $patient->phone ?? 'N/A' }}
    </p>

    <p>
        <strong>Address:</strong>
        {{ $patient->address ?? 'N/A' }}
    </p>

    <h2>Appointments</h2>

    @forelse($patient->appointments as $appointment)

        <p>
            {{ $appointment->appointment_date->format('M d, Y') }}
            -
            {{ $appointment->appointment_time }}
            -
            {{ $appointment->status }}
        </p>

    @empty

        <p>No appointments found.</p>

    @endforelse

    <a href="{{ route('patients.index') }}"
       class="btn btn-secondary">
        Back
    </a>

</div>

@endsection
