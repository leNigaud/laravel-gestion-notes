@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <!-- General Information Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Moyenne de classe</h5>
                    <p class="card-text">{{ number_format($averageGrade, 2) }}</p> <!-- Display dynamic average grade -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Étudiants Non-Admis</h5>
                    <p class="card-text">{{ $nonAdmissibleCount }}</p> <!-- Display dynamic count of non-admissible students -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Étudiants</h5>
                    <p class="card-text">{{ $totalStudents }}</p> <!-- Display dynamic total number of students -->
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Matières</h5>
                    <p class="card-text">{{ $totalSubjects }}</p> <!-- Display dynamic total number of subjects -->
                </div>
            </div>
        </div>
    </div>
<!-- Students Grades Table -->
<div class="card">
    <div class="card-header">
        Notes des Étudiants
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    @foreach ($subjects as $subject)
                        <th>{{ $subject->name }}</th>
                    @endforeach
                    <th>Moyenne</th>
                    <th>Situation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        @php
                            $totalNotes = 0;
                            $totalSubjects = 0;
                        @endphp
                        @foreach ($subjects as $subject)
                            @php
                                $note = $student->subjects->find($subject->id)->pivot->note ?? null;
                            @endphp
                            <td>{{ $note !== null ? $note : 'N/A' }}</td>
                            @if ($note !== null)
                                @php
                                    $totalNotes += $note;
                                    $totalSubjects++;
                                @endphp
                            @endif
                        @endforeach
                        @php
                            $average = $totalSubjects > 0 ? $totalNotes / $totalSubjects : 0;
                        @endphp
                        <td>{{ number_format($average, 2) }}</td>
                        <td>
                            <span class="badge {{ $average >= 10 ? 'bg-success' : 'bg-danger' }}">
                                {{ $average >= 10 ? 'Admis' : 'Non-Admis' }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    </div>
</div>
@endsection
