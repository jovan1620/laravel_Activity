@extends('layouts.app')

@section('title', 'Appointments')

@section('content')

<div class="card">

    <h1>Appointments</h1>

    <a href="{{ route('appointments.create') }}"
       class="btn btn-success">
        + Add Appointment
    </a>

    <table>

        <thead>

            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Date</th>
                <th>Time</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

        </thead>

        <tbody>

        @forelse($appointments as $appointment)

            <tr>

                <td>{{ $appointment->id }}</td>

                <td>
                    {{ $appointment->patient->name }}
                </td>

                <td>
                    {{ $appointment->appointment_date->format('M d, Y') }}
                </td>

                <td>
                    {{ $appointment->appointment_time }}
                </td>

                <td>
                    {{ $appointment->reason ?? 'N/A' }}
                </td>

                <td>
                    {{ $appointment->status }}
                </td>

                <td>

                    <div class="actions">

                        <a href="{{ route('appointments.show', $appointment) }}"
                           class="btn">
                            View
                        </a>

                        <a href="{{ route('appointments.edit', $appointment) }}"
                           class="btn btn-warning">
                            Edit
                        </a>

                        <form class="inline"
                              action="{{ route('appointments.destroy', $appointment) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this appointment?')">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger">
                                Delete
                            </button>

                        </form>

                    </div>

                </td>

            </tr>

        @empty

            <tr>
                <td colspan="7">
                    No appointments found.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection
