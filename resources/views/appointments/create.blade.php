@extends('layouts.app')

@section('title', 'Add Appointment')

@section('content')

<div class="card">

    <h1>Add Appointment</h1>

    @if($patients->count() === 0)

        <p>
            You need to create a patient before creating an appointment.
        </p>

        <a href="{{ route('patients.create') }}"
           class="btn btn-success">
            Add Patient
        </a>

    @else

        <form action="{{ route('appointments.store') }}"
              method="POST">

            @csrf

            <label>Patient</label>

            <select name="patient_id" required>

                <option value="">
                    -- Select Patient --
                </option>

                @foreach($patients as $patient)

                    <option value="{{ $patient->id }}"
                        {{ old('patient_id') == $patient->id ? 'selected' : '' }}>

                        {{ $patient->name }}

                    </option>

                @endforeach

            </select>

            <label>Appointment Date</label>

            <input type="date"
                   name="appointment_date"
                   value="{{ old('appointment_date') }}"
                   required>

            <label>Appointment Time</label>

            <input type="time"
                   name="appointment_time"
                   value="{{ old('appointment_time') }}"
                   required>

            <label>Reason</label>

            <input type="text"
                   name="reason"
                   value="{{ old('reason') }}"
                   placeholder="Reason for appointment">

            <label>Status</label>

            <select name="status" required>

                <option value="Pending"
                    {{ old('status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Confirmed"
                    {{ old('status') == 'Confirmed' ? 'selected' : '' }}>
                    Confirmed
                </option>

                <option value="Completed"
                    {{ old('status') == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

                <option value="Cancelled"
                    {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                    Cancelled
                </option>

            </select>

            <button type="submit"
                    class="btn btn-success">
                Save Appointment
            </button>

            <a href="{{ route('appointments.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    @endif

</div>

@endsection
