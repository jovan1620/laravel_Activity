@extends('layouts.app')

@section('title', 'Edit Appointment')

@section('content')

<div class="card">

    <h1>Edit Appointment</h1>

    <form action="{{ route('appointments.update', $appointment) }}"
          method="POST">

        @csrf
        @method('PUT')

        <label>Patient</label>

        <select name="patient_id" required>

            @foreach($patients as $patient)

                <option value="{{ $patient->id }}"
                    {{ old('patient_id', $appointment->patient_id) == $patient->id ? 'selected' : '' }}>

                    {{ $patient->name }}

                </option>

            @endforeach

        </select>

        <label>Appointment Date</label>

        <input type="date"
               name="appointment_date"
               value="{{ old(
                    'appointment_date',
                    $appointment->appointment_date->format('Y-m-d')
               ) }}"
               required>

        <label>Appointment Time</label>

        <input type="time"
               name="appointment_time"
               value="{{ old('appointment_time', $appointment->appointment_time) }}"
               required>

        <label>Reason</label>

        <input type="text"
               name="reason"
               value="{{ old('reason', $appointment->reason) }}">

        <label>Status</label>

        <select name="status" required>

            <option value="Pending"
                {{ old('status', $appointment->status) == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Confirmed"
                {{ old('status', $appointment->status) == 'Confirmed' ? 'selected' : '' }}>
                Confirmed
            </option>

            <option value="Completed"
                {{ old('status', $appointment->status) == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

            <option value="Cancelled"
                {{ old('status', $appointment->status) == 'Cancelled' ? 'selected' : '' }}>
                Cancelled
            </option>

        </select>

        <button type="submit"
                class="btn btn-warning">
            Update Appointment
        </button>

        <a href="{{ route('appointments.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection
