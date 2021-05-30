@extends('layouts.app')

@section('content')
    <section id="page_container">
        <article>
            <h2 id="article_title">
                Site search
            </h2>
            <div class="callout callout-warning">
                <div class="callout-heading">Problems with search?</div>
                Search has been built from the ground-up. If it's not behaving as you'd expect, please <a
                        href="https://github.com/jasonbayton/bayton_v5/issues">raise an issue</a> with feedback on how
                to make it better!
            </div>
            <h3 class="search-heading">
				Results for: {{ request()->search }}
            </h3>
            <ul>
                @forelse($results as $result)
                    <li><a href="{{ $result->url }}">{{ $result->title }}</a></li>

                @empty
                    <p>No results found for this exact match, check similar results below.</p>
                @endforelse
            </ul>
            <h3 class="search-heading">
                Similar Results based on "{{ request()->search }}" if not included above:
            </h3>
            <ul>
                @forelse($similar as $result)
                    <li><a href="{{ $result->url }}">{{ $result->title }}</a></li>

                @empty
                    <p>No results found, or query is vague enough to not require broader search.</p>
                @endforelse
            </ul>
        </article>
    </section>

@endsection
