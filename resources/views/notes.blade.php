@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <!-- Display success message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Display error message -->
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">Ajouter notes pour les étudiants</div>
        <div class="card-body">
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="student_id" class="form-label">Choisir l'Étudiant</label>
                    <select class="form-control" id="student_id" name="student_id" required>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="subject_id" class="form-label">Choisir la Matière</label>
                    <select class="form-control" id="subject_id" name="subject_id" required>
                        @foreach($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="grade" class="form-label">Note</label>
                    <input type="number" class="form-control" id="grade" name="grade" required>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter la Note</button>
            </form>
        </div>
    </div>
</div>
@endsection
