@extends('learnlayout')

@section('title', 'Upload')

@section('content')

@if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="error">
        {{ session('error') }}
    </div>
@endif

<div class="section">
<form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Type:</label>
    <select name="type" id="type" onchange="toggleSubjectField()" required>
        <option value="syllabus">Syllabus</option>
        <option value="material">Material</option>
        <option value="pyq">PYQ</option>
    </select>

    <label for="semester">Semester:</label>
    <select id="semester" name="semester" onchange="updateSubjects()" required>
        <option value="">-- Select Semester --</option>
        <option value="Semester 1">Semester 1</option>
        <option value="Semester 2">Semester 2</option>
        <option value="Semester 3">Semester 3</option>
        <option value="Semester 4">Semester 4</option>
        <option value="Semester 5">Semester 5</option>
        <option value="Semester 6">Semester 6</option>
        <option value="Semester 7">Semester 7</option>
        <option value="Semester 8">Semester 8</option>
        <option value="Semester 9">Semester 9</option>
        <option value="Semester 10">Semester 10</option>
    </select>

    <div id="subjectField">
        <label for="subject">Subject:</label>
        <select id="subject" name="subject">
            <option value="">-- Select Subject --</option>
            <!-- Subjects will be loaded here -->
        </select>
    </div>

    <label>Upload Files:</label>
    <input type="file" name="file[]" multiple required>

    <label>Upload Password:</label>
    <input type="password" name="password" required placeholder="Enter upload password">

    <button type="submit">Upload</button>
</form>
</div>

@endsection

