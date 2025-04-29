@extends('learnlayout')

@section('title', 'Material') <!-- or 'PYQ' based on page -->

@section('content')

<div id="Material" class="main-section"> <!-- or id="PYQ" -->
    <div class="box">
        <h1>Materials</h1> <!-- or Previous Year Questions -->
    </div>

    @forelse ($resources as $semester => $subjects)
        <div class="box1">
            <div onclick="toggleSubjects('{{ $semester }}')">
                <h1>{{ strtoupper($semester) }}</h1>
            </div>

            <div id="{{ $semester }}" class="subjects" style="display: none; padding-left: 20px;">
                @foreach ($subjects as $subject => $files)
                    <div class="box2">
                        <div onclick="toggleFiles('{{ $semester }}_{{ $subject }}')">
                            <h2>{{ $subject }}</h2>
                        </div>

                        <div id="{{ $semester }}_{{ $subject }}" class="files" style="display: none; padding-left: 20px;">
                            <ul>
                                @foreach ($files as $file)
                                    <li style="margin: 5px 0;">
                                        <a href="{{ $file['url'] }}" download>{{ $file['name'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p style="text-align: center; margin-top: 30px;">No PYQs available yet.</p>
    @endforelse
</div>

@endsection
