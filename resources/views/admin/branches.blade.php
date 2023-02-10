<x-admin-layout>
    <x-slot name="main">
        <main class="branches-admin container">
                <h4 class="title my-2 center">Branches</h4>
                <div class="container my-5">
                    <hr>
                    <table class="table table-bordered caption-top">
                        <caption>List of All Branches</caption>
                        <thead class="bg-dark">
                        <tr>
                            <th scope="col" class="text-primary">
                                <a href="#">ID</a>
                                <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                            </th>
                            <th scope="col" class="text-primary">
                                <a href="#">Phone</a>
                                <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                            </th>
                            <th scope="col" class="text-primary">
                                <a href="#">Email</a>
                                <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                            </th>
                            <th scope="col" class="text-primary">
                                <a href="#">Location</a>
                                <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                            </th>
                            <th scope="col" class="text-primary">
                                <a href="#">Working hours</a>
                                <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                            </th>
                            <th scope="col" class="text-primary">
                                <a href="#">from</a>
                                <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                            </th>
                            <th scope="col" class="text-primary">
                                <a href="#">To</a>
                                <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                            </th>
                            <th scope="col" class="text-primary"><a href="#">Request a New Branch From Developper</a></th>
                        </tr>
                        </thead>
                        @isset($branches)
                            <tbody>
                            @foreach($branches as $branch)
                                <tr>
                                    <th scope="row">{{ $branch->id }}</th>
                                    <td>{{ $branch->phone }}</td>
                                    <td>{{ $branch->email }}</td>
                                    <td>{{ $branch->location }}</td>
                                    <td>{{ $branch->working_hours }}</td>
                                    <td>{{ $branch->from_hour }} AM</td>
                                    <td>{{ $branch->to_hour }} PM</td>
                                    <td><a href="mailto:husseinkhalil420@gmail.com?subject=New Branch -- Company ABC Website" title="">webdeveloper@gmail.com</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        @endisset
                    </table>
                </div>

        </main>
    </x-slot>
</x-admin-layout>
