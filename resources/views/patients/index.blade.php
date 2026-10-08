@extends('layouts.app')

@section('title', 'Patients')

@section('content')

<div class="card">

    <h1>Patients</h1>

    <a href="{{ route('patients.create') }}"
       class="btn btn-success">
        + Add Patient
    </a>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

        @forelse($patients as $patient)

            <tr>

                <td>{{ $patient->id }}</td>

                <td>{{ $patient->name }}</td>

                <td>{{ $patient->email ?? 'N/A' }}</td>

                <td>{{ $patient->phone ?? 'N/A' }}</td>

                <td>{{ $patient->address ?? 'N/A' }}</td>

                <td>

                    <div class="actions">

                        <a href="{{ route('patients.show', $patient) }}"
                           class="btn">
                            View
                        </a>

                        <a href="{{ route('patients.edit', $patient) }}"
                           class="btn btn-warning">
                            Edit
                        </a>

                        <form class="inline"
                              action="{{ route('patients.destroy', $patient) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this patient?')">

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
                <td colspan="6">
                    No patients found.
                </td>
            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection
