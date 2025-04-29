@extends('learnlayout')

@section('title', 'PYQ')

@section('content')

<div id="pyq" class="main-section">
    <div class="box">
        <h1>PYQ</h1>
    </div>


    <div class="box1" onclick="toggleSubjects('semester1')">
    <h1>SEMESTER-1</h1>
        <div id="semester1" class="subjects" style="display: none;">
            <ul>
                <h2>Fundamental of Programming using C</h2>
                <h2>Mathematics</h2>
                <h2>Fundamental of Computers</h2>
                <h2>AEC</h2>
                <h2>SEC</h2>
                <h2>VAC</h2>
            </ul>
        </div>
    </div>

    <div class="box1" onclick="toggleSubjects('semester2')">
        <h1>SEMESTER-2</h1>
    <div id="semester2" class="subjects" style="display: none;">
        <ul>
            <h2>Fundamental of Programming using C</h2>
            <h2>Mathematics</h2>
            <h2>Introduction of DBMS</h2>
            <h2>AEC</h2>
            <h2>SEC</h2>
            <h2>VAC</h2>
        </ul>
    </div>
</div>
</div>
<script>
        function toggleSubjects(id) {
            const element = document.getElementById(id);
            if (element.style.display === "none") {
                element.style.display = "block";
            } else {
                element.style.display = "none";
            }
        }
    </script>
<script src="{{ asset('js/learnscript.js') }}"></script>
@endsection
