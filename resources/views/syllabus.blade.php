@extends('learnlayout')

@section('title', 'Syllabus')

@section('content')

<div id="Syllabus" class="main-section">
    <div class="box">
        <h1>Syllabus</h1>
    </div>

    @forelse ($resources as $semester => $files)
        <div class="box1">
            <a href="{{ $files[0]['url'] }}" download>
                <h1>{{ strtoupper($semester) }}</h1>
            </a>
        </div>
    @empty
        <p style="text-align:center; margin-top:30px;">No syllabus available yet.</p>
    @endforelse
</div>

@endsection

