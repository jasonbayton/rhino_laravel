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
            @foreach(array_chunk($content->getChildren()->toArray(), 3) as $chunk)
                <div class="content-grid">
                    @foreach($chunk as $entry)
                        <div class="grid-topic">
                            <div class="grid-topic-title">
                                <h4>{{ $entry->title }} ({{ count($entry->getChildren()) }})</h4>
                            </div>
                            <ul>
                                @foreach($entry->getChildren() as $child)
                                    <li><a href="{{ $child->url }}">{{ $child->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </article>
    </section>

@endsection
