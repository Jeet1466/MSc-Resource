
@extends('learnlayout')

@section('title', 'Contact')

@section('content')
<div id="contact" class="main-section">
    <div id="title" class="box"><h1>Contact Me</h1></div>
    <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>

        <button type="submit">Send Message</button>
    </form>
</div>

@endsection
