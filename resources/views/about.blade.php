@extends('layouts.app')
@section('title')
    About Us
@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}" type="text/css">

    <main class="main-container about-section">
        <section id="profile">
            <div class="page-title">
                <img src="./img/smile.svg" alt="Smile Icon">
                <h2>{{ $user->username ?? 'yogaviveka' }}.<span class="pink">Profile</span></h2>
            </div>
            <p class="section-description">
                Hello! I'm {{ $user->name ?? 'yogaviveka' }}, welcome to my profile.
            </p>
            <div class="profile-container">
                <div class="terminal-container">
                    <div class="terminal-header">
                        <div id="terminal-title">{{ $user->username ?? 'yogaviveka' }}.exe</div>
                        <div class="right-side-buttons">
                            <i class="fa-solid fa-window-minimize"></i>
                            <i class="fa-solid fa-window-restore"></i>
                            <i class="fa-solid fa-window-close"></i>
                        </div>
                    </div>
                    <div class="terminal-window">
                        <div class="statement">
                            <p class="input">
                                {{ $user->username ?? 'yogaviveka' }}.<span class="green">Pronouns</span>
                            </p>
                            <p class="return">
                                {{ $user->pronouns ?? 'Not specified' }}
                            </p>
                        </div>
                        <div class="statement">
                            <p class="input">
                                {{ $user->username ?? 'yogaviveka' }}.<span class="green">Location</span>
                            </p>
                            <p class="return">
                                {{ $user->location ?? 'Not specified' }}
                            </p>
                        </div>
                        <div class="statement">
                            <p class="input">
                                {{ $user->username ?? 'yogaviveka' }}.<span class="green">Languages</span>
                            </p>
                            <p class="return">
                                [ @if($user && $user->languages)
                                    @foreach ($user->languages as $language)
                                        {{ $language }}@if (!$loop->last), @endif
                                    @endforeach
                                @else
                                    Not specified
                                @endif ]
                            </p>
                        </div>
                        <div class="statement">
                            <p class="input">
                                {{ $user->username ?? 'yogaviveka' }}.<span class="green">Bear Puppy</span>
                            </p>
                            <p class="return">
                                <a target="_blank" href="{{ $user->insta_url ?? '#' }}"
                                    class="hyperlink">{{ $user->pit_animal ?? 'Not specified' }}</a>
                            </p>
                        </div>
                        <div class="statement">
                            <p class="input bottom"><span></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="education-experience">
            <div id="education" class="education-experience-container">
                <h3>Education</h3>
                @foreach ($educations as $education)
                    <div class="education-experience-card">
                        <div class="card-info">
                            <h4 class="green">{{ $education->education_degree }}</h4>
                            <p>{{ $education->education_location }}</p>
                        </div>
                        <div class="card-description">
                            <h5>Achievements</h5>
                            @php
                                $achievements = explode(',', $education->education_achievements);
                            @endphp
                            @foreach ($achievements as $achievement)
                                <p>{{ $achievement }}</p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div id="experience" class="education-experience-container">
                <h3>Experience</h3>
                @foreach ($experiences as $experience)
                    <div class="education-experience-card">
                        <div class="card-info">
                            <h4 class="green">{{ $experience->role }}</h4>
                            <p class="date">{{ $experience->start_date }} - {{ $experience->end_date }}</p>
                            <p><a href="{{ $experience->company_url }}">{{ $experience->company }}</a><br>
                                {{ $experience->job_type }}</p>
                        </div>
                        <div class="card-description">
                            @foreach ($experience->tasks as $task)
                                <h5>{{ $task->title }}</h5>
                                <p>{{ $task->description }}.</p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <section id="tech-stack">
            <h3>Tech Stack</h3>
            <div class="tech-stack-container">
                @foreach ($techstasks as $item)
                    <a href="{{ $item->url }}">
                        <div class="skill">
                            <img style="width: 35px; border-radius: 50%; height: 35px;"
                                src="{{ asset('storage/' . $item->image) }}"
                                alt="{{ $item->name }}"><span>{{ $item->name }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
        <section id="all-social-media">
            <h3>Contact</h3>
            <p class="section-description">
                Here are all the places you can find me on the internet.
            </p>
            <div class="social-media-list">
                <a href="{{ $user->linkedin_url ?? '#' }}" class="social-media-item">
                    <i class="fa-brands fa-linkedin-in"></i>
                    LinkedIn
                </a>
                <a href="{{ $user->github_url ?? '#' }}" class="social-media-item">
                    <i class="fa-brands fa-github"></i>
                    GitHub
                </a>
                <a href="{{ $user->insta_url ?? '#' }}" class="social-media-item">
                    <i class="fa-brands fa-instagram"></i>
                    Instagram
                </a>
                <a href="mailto:{{ $user->email ?? 'notavailable@example.com' }}" class="social-media-item">
                    <i class="fa-solid fa-envelope"></i>
                    Email
                </a>
            </div>
        </section>
    </main>
@endsection
