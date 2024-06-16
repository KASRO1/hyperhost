@if (count($breadcrumbs))

    <ol class="breadcrumb pages">
        @foreach ($breadcrumbs as $breadcrumb)

            @if ($breadcrumb->url && !$loop->last)
                <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ strip_tags($breadcrumb->title) }}</a></li>
            @else
                <li class="breadcrumb-item active"> / {{ strip_tags($breadcrumb->title) }} </li>
            @endif

        @endforeach
    </ol>

@endif
