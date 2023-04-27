@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'alert alert-info text-sm']) }}>
        {{ $status }}
    </div>
@endif
