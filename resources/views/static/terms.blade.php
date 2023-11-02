<x-user-layout>
    <x-slot name="header">
        <x-header page="terms" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>
    <x-slot name="main">
        <section id="terms" class="container">
            <q class="mb-5">
                {!! \Illuminate\Support\Facades\Storage::get('website/terms/quote.txt') !!}
            </q>

            <article>
                {!! \Illuminate\Support\Facades\Storage::get('website/terms/terms.txt') !!}
            </article>

        </section>
    </x-slot>
</x-user-layout>
