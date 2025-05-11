@extends('layout')

@section('title', 'Jeet Patel')

@section('content')


<div id="surface" class="section surface">
    <img src="{{ asset('images/Jeet.jpg') }}" alt="Jeet Patel" class="profile-photo">
    <div class="text-content">
        <h1>Jeet Patel</h1>
        <p>I'm a passionate developer exploring AI, Cybersecurity & Web Development.</p>
    </div>
</div>


<div id="shallow" class="section shallow">
    <div class="about-container">
        <h1>About Me</h1>
        <p>Hey there! I'm <strong>Jeet Patel</strong>, a tech enthusiast currently pursuing an  
           <strong>MSc(IT) (5-Year Integrated)</strong> at SDJ International College, Surat. 🎓</p>

        <p>I’m deeply passionate about <strong>web development, cybersecurity, and AI/ML</strong>.  
           Currently, I’m exploring the <strong>Laravel framework</strong> to build amazing web applications.  
           I also love ethical hacking and diving into the depths of digital security. 🔥</p>

        <p>My goal? To create innovative projects that solve real-world problems and  
           keep learning every day. When I’m not coding, I enjoy exploring new tech trends  
           and improving my problem-solving skills. 🚀</p>

        <p><em>"Tech isn’t just my field, it’s my playground!"</em> 💻✨</p>
    </div>
</div>


<div id="mid-depth" class="section mid-depth">
    <h1>Skills & Portfolio</h1>
    <ul>
       <p>learning webdevlopment using Laravel.</p>
       <p>Checkout GitHub for the more projects.</p>
    </ul>
    <div class="video-container">
        <video width="100%" controls>
            <source src="{{ asset('videos/skills.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>


    <div id="deep-sea" class="section deep-sea">
        <h1>Fun Stuff</h1>
        <p> Achievements & Blog</p>
    </div>

    <div id="abyss" class="section abyss">
    <h1>Contact Me</h1>
    
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
