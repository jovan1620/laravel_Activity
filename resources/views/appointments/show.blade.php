@extends('layouts.app')

@section('title', 'Appointment Details')

@section('content')

<div class="card">

    <h1>Appointment Details</h1>

    <p>
        <strong>Patient:</strong>
        {{ $appointment->patient->name }}
    </p>

    <p>
        <strong>Date:</strong>
        {{ $appointment->appointment_date->format('M d, Y') }}
    </p>

    <p>
        <strong>Time:</strong>
        {{ $appointment->appointment_time }}
    </p>

    <p>
        <strong>Reason:</strong>
        {{ $appointment->reason ?? 'N/A' }}
    </p>

    <p>
        <strong>Status:</strong>
        {{ $appointment->status }}
    </p>

    <a href="{{ route('appointments.index') }}"
       class="btn btn-secondary">
        Back
    </a>

    <a href="{{ route('appointments.edit', $appointment) }}"
       class="btn btn-warning">
        Edit
    </a>

</div>

@endsection
