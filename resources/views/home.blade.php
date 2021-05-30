@extends('layouts.app')

@section('content')

</div> <!-- to remove max width -->
<section id="bold_intro">
    <div id="hero_rhino">
        <div id="statement">
            <h1>Devices <strong>made</strong> for enterprise</h1>
        </div>
        <div class="hero-grid">
            <div class="pull-left">
                <div id="hero_intro">
                    <h2>Security & Support</h2>
                    <p>All Rhino devices benefit from security
                        updates within 90 days of release from Google,
                        normally sooner, for up to 5 years. Additionally,
                        Rhino devices receive at least one letter upgrade.</p>
                    <p> Looking for manuals, product support, FAQs or
                        something else? Keep scrolling.</p>
                </div>
            </div>
            <div class="pull-right">
                <img id="rhino_c10" src="/img/c10-front.png">
            </div>
        </div>
    </div>
</section>
<div class="max-width"> <!-- Reviving max-width -->
    <section id="path">
        <h2 class="section-title">
            Choose a path
        </h2>
        <div id="path_selection">
            <a class="get-path" href="/support">
                <div class="t8-background">
                    <i class="fas fa-question-circle"></i>
                    <div class="path-title">
                        Support
                    </div>
                    <div class="path-blurb">
                        Get to know your Rhino, and if you're
                        having issues, we have you covered.
                    </div>
                </div>
            </a>
            <a class="get-path" href="/security">
                <div class="t8-background">
                    <i class="fas fa-shield-check"></i>
                    <div class="path-title">
                        Security
                    </div>
                    <div class="path-blurb">
                        Keep up-to-date with security and
                        system updates, for all Rhino devices.
                    </div>
                </div>
            </a>
        </div>
    </section>
@endsection
