<x-user-layout>
    <x-slot name="header">
        <x-header page="about" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>
    <x-slot name="main">
        <section id="services" class="container">
            <q class="p-4 mb-5">
                {!! \Illuminate\Support\Facades\Storage::get('website/services/quote.txt') !!}
            </q>
            <article>
                {!! \Illuminate\Support\Facades\Storage::get('website/services/services.txt') !!}
            </article>
        </section>
    </x-slot>
</x-user-layout>
