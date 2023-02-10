<x-admin-layout>
    <x-slot name="main">
        <main class="enquiries-admin container">
            <h4 class="title my-2 center">Enquiries</h4>
            <div class="container my-5">
                <hr>
                <table class="table table-bordered caption-top">
                    <caption>List of All Enquiries</caption>
                    <thead class="bg-dark">
                    <tr>
                        <th scope="col" class="text-primary">
                            <a href="#">ID</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Admin Notes</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Date</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Issuer Name</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Issuer Message</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Assigned By</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">Assigned To</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary">
                            <a href="#">For Property</a>
                            <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                        </th>
                        <th scope="col" class="text-primary"><a href="#">Reply</a></th>
                        <th scope="col" class="text-primary"><a href="#">Details</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Ali Please, send the valuation ASAP.</td>
                        <td>10/10/2020</td>
                        <td>Ali Al-jammal</td>
                        <td class="td-long">Hello, I'm reaching out to in order to make a purchase for the property #123</td>
                        <td>Hussein Khalil</td>
                        <td>Firas Moussa</td>
                        <td><a href="property.html">#1032</a></td>
                        <td><a href="mailto:issuer@gmail.com">issuer@gmail.com</a></td>
                        <td><a class="btn btn-primary" href="/admin/enquiryDetails.html">></a></td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>Ali Please, send the valuation ASAP.</td>
                        <td>10/10/2020</td>
                        <td>Ali Al-jammal</td>
                        <td class="td-long">Hello, I'm reaching out to in order to make a purchase for the property #123</td>
                        <td>Hussein Khalil</td>
                        <td>Firas Moussa</td>
                        <td><a href="property.html">#1032</a></td>
                        <td><a href="mailto:issuer@gmail.com">issuer@gmail.com</a></td>
                        <td><a class="btn btn-primary" href="/admin/enquiryDetails.html">></a></td>
                    </tr>
                    <tr>
                        <th scope="row">1</th>
                        <td>-</td>
                        <td>10/10/2020</td>
                        <td>Ali Al-jammal</td>
                        <td class="td-long">Hello, I'm reaching out to in order to make a purchase for the property #123</td>
                        <td>Hussein Khalil</td>
                        <td>Firas Moussa</td>
                        <td><a href="property.html">#1032</a></td>
                        <td><a href="mailto:issuer@gmail.com">issuer@gmail.com</a></td>
                        <td><a class="btn btn-primary" href="/admin/enquiryDetails.html">></a></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <!-- Start Pagination -->
            <div class="center">
                {{ $enquiries->links() }}
            </div>
            <!-- End Pagination -->
        </main>
    </x-slot>
</x-admin-layout>
