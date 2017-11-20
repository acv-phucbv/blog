<div class="page-bar">
    <ul class="page-breadcrumb">
        @foreach($breadcrumbs as $text => $link)
            <li>
                @if($link === '')
                    <span>{{ $text }}</span>
                @else
                    <a href="{{ $link }}">{{ $text }}</a>
                    <i class="fa fa-circle"></i>
                @endif
            </li>
        @endforeach
    </ul>
</div>