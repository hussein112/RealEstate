<x-user-layout>
    <x-slot name="header">
        <x-header page="about" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>
    <x-slot name="main">
        <section id="services" class="container">
            <q class="p-4 mb-5">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, quas in. Ipsa nostrum tempora corporis, reiciendis aliquam impedit accusantium temporibus cum similique possimus, adipisci ea eveniet, cumque veritatis distinctio aperiam.
            </q>
            <article>
                <h2>Why Us?</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe quisquam facilis alias quia illum maxime officiis a similique incidunt dolores, asperiores fugit magnam inventore vel obcaecati nesciunt sequi accusamus fugiat. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor ipsum nesciunt perspiciatis ipsam, quas iste in exercitationem et eligendi tempora vel deserunt amet illo, debitis fuga cupiditate minima aliquam praesentium. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore molestiae reprehenderit autem nemo in? Quidem consectetur, et nam earum tempore labore accusantium, magni recusandae perspiciatis, quisquam officia eum voluptatum temporibus!</p>
            </article>

            <article>
                <h2>Services</h2>
                <div class="accordion accordion-flush" id="services">
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                Buying Properties
                            </button>
                        </h3>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#services">
                            <div class="accordion-body">
                                <h4>How It Works?</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum praesentium ullam ducimus soluta voluptate quos nemo quas explicabo cum alias fuga impedit quo dolorum, ea, dolorem tenetur voluptas est aperiam.</p>
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h3 class="accordion-header" id="flush-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                Selling Poperties
                            </button>
                        </h3>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#services">
                            <div class="accordion-body">
                                <h4>How It Works?</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum praesentium ullam ducimus soluta voluptate quos nemo quas explicabo cum alias fuga impedit quo dolorum, ea, dolorem tenetur voluptas est aperiam.</p>
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h3 class="accordion-header" id="flush-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                Renting Properties
                            </button>
                        </h3>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#services">
                            <div class="accordion-body">
                                <h4>How It Works?</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum praesentium ullam ducimus soluta voluptate quos nemo quas explicabo cum alias fuga impedit quo dolorum, ea, dolorem tenetur voluptas est aperiam.</p>
                            </div>
                        </div>
                    </div>


                    <div class="accordion-item">
                        <h3 class="accordion-header" id="flush-headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                Evaluating Your Property
                            </button>
                        </h3>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#services">
                            <div class="accordion-body">
                                <h4>How It Works?</h4>
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum praesentium ullam ducimus soluta voluptate quos nemo quas explicabo cum alias fuga impedit quo dolorum, ea, dolorem tenetur voluptas est aperiam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </x-slot>
</x-user-layout>
