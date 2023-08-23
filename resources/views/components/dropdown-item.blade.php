@props(['active' => false])
    @php
        $classes = 'block text-left px-3 text-sm leading-6 hover:bg-purple-600 hover:text-white focus:bg-purple-500 focus:text-white';
        if($active) $classes .= " bg-purple-500 text-white";
    @endphp

<a    {{ $attributes([ 'class'=>$classes ]) }}>
    {{$slot}}
</a>
