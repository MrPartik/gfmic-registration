@if(@$type === 'featured_image')
    @if ($url !== '')
        <a target="_blank" href="{{ url($url) }}">
            <img style="max-height: 50px" src="{{ url($url) }}" alt=""/>
        </a>
    @endif
@elseif(@$type === 'action')

@endif
