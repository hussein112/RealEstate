@isset($page)
    @switch($page)
        @case('all')
            @include('properties.all')
        @break

        @case('featured')
            @include('properties.featured')
        @break

        @case('rent')
            @include('properties.rent')
        @break


        @case('buy')
            @include('properties.buy')
        @break

        @case('sell')
            @include('properties.advertise')
        @break
    @endswitch
@endisset

