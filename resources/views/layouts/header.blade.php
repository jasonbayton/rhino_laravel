<header>
    <div id="header_container" class="">
        <div id="rhino_header">
            <img src="{{ asset('assets/rhino-logo.png') }}" alt="rhino logo" width="64px"/>
            <div id="rhino_title">
                Rhino Mobility
            </div>
        </div>
        <nav>
            <div id="nav_links">
                <a href="/support">Support</a> <a href="/security">Security</a>
            </div>
            <div id="darktoggle">
                <i class="fas fa-clouds-moon"></i>
            </div>
        </nav>
    </div>
    <div id="search_container">
        <div class="rhino_search">
            <form action="/search" method="get" style="float: right;">
                <input type="text" placeholder="Search.." name="search" aria-label="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</header>
