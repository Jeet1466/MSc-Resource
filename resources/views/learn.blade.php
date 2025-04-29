@extends('learnlayout')

@section('title', 'Jeet Patel')

@section('content')

<div class="main-section">
    <div id="syllabus" class="box">
        <a href="/syllabuspage">
            <h1>Syllabus</h1>
            <p>Here you can find the syllabus for the course.</p>
        </a>
    </div> 

    <div id="pyq" class="box">
        <a href="/pyqpage">
            <h1>Previous Years Paper</h1>
            <p>Here you can find the previous years paper for the course.</p>
        </a>
    </div>

    <div id="material" class="box">
        <a href="/materialpage">
            <h1>Material</h1>
            <p>Here you can find the material for the course.</p>
        </a>
    </div>

    <div id="contact" class="box">
        <a href="/contact">
            <h1>Contact</h1>
            <p>Here you can find the contact details.</p>
        </a>
    </div>
</div>

@endsection