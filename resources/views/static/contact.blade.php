<x-user-layout>
    <x-slot name="header">
        <x-header page="contact" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>
    <x-slot name="main">
        <section id="branches">
            <div class="container flex flex-wrap">
                @isset($branches)
                    @foreach($branches as $branch)
                        <div class="container flex flex-wrap branch-main m-2">
                            <ul class="branch custom-list m-1">
                                <h2>{{ $branch->name }}</h2>
                                <li class="l-item"><a href="tel:{{$branch->phone}}"><iconify-icon icon="material-symbols:phone-enabled"></iconify-icon> {{$branch->phone}}</a></li>
                                <li class="l-item"><a href="mailto:{{$branch->phone}}"><iconify-icon icon="material-symbols:alternate-email"></iconify-icon> {{$branch->phone}}</a></li>
                                <li class="l-item"><a href="contact.html"><iconify-icon icon="ant-design:form-outlined"></iconify-icon> Contact</a></li>
                                <li class="l-item">{{ $branch->location }}</li>
                                <h3>Working Hours</h3>
                                <li>From: {{$branch->from_hour}} A.M</li>
                                <li>To: {{$branch->to_hour}} A.M</li>
                            </ul>
                        </div>
                    @endforeach
                @endisset
            </div>
        </section>
    </x-slot>
</x-user-layout>
