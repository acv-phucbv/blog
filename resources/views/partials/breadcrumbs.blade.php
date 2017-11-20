@php
    if (!isset($breadcrumbs)) {
        $breadcrumbs = [];
    }
@endphp
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            {{ Html::link('/', trans('common.homepage')) }}
        </li>
        @foreach ($breadcrumbs as $crumb)
            @if (!empty($crumb['text']) && !empty($crumb['url']))
            <li>
                <i class="fa fa-circle"></i>
                {{ Html::link($crumb['url'], $crumb['text']) }}
            </li>
            @elseif (!empty($crumb['text']))
            <li>
                <i class="fa fa-circle"></i>
                <span>{{ $crumb['text'] }}</span>
            </li>
            @endif
        @endforeach
    </ul>
</div>
