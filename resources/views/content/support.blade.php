@extends('layouts.app')

@section('content')
    <section id="grid_container">
        <aside class="left">
            @include('layouts.aside')
        </aside>
        <article>
          <h2 id="article_title">
            {{ $content->title }}
          </h2>
          <!-- foreach topic, output docs in a UL -->
          <div class="content-grid">
            @foreach($allTopics as $header => $topic)
            <div class="grid-topic">
                <div class="grid-topic-title">
                <h4>{{ $header }}</h4>
                </div>
                <ul>
                    @foreach($topic as $article)
                        <li><a href="{{ $article->url }}">{{ $article->title }}</a></li>
                    @endforeach
                </ul>
              </div>
            @endforeach
          </div>
        </article>
    </section>

@endsection
