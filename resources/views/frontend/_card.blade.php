@if(isset($item))
    <a href="{{ isset($path) ? $path : '#' }}" class="Card">
        <div class="Card__overlay">
        </div>

        <div class="Card__image">
            <img src="/imagecache/card/{{ $item->img()->first() }}" />
        </div>

        <div class="Card__text" data-match-height="Card__text">
            <h3>{{ trim(strip_tags($item->title)) }}</h3>
            {{ shortenClean(trim(strip_tags($item->content))) }}
        </div>
    </a>
@endif