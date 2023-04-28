<x-user-layout>

    <x-slot name="header">
        <x-half-header>
        </x-half-header>
    </x-slot>


    <x-slot name="main">
        @php(event(new App\Events\TestingEvent('Hello World')))
        <script>
            window.onload = () => {
                console.log(window.Echo.connector);
                window.Echo.channel('events')
                    .listen('TestingEvent', (e) => console.log(e.message));
            }
        </script>
    </x-slot>
</x-user-layout>
