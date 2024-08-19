<template>
    <website-layout>
        <!-- Add other sections here -->

        <!-- Testimonials Section -->
        <section class="testimonials-three">
    <div>
        <div class="testimonials-three__wrapper" style="background-color: #ff552800; padding: 0;">
            <ul class="testimonials-three__carousel-thumb careox-slick__carousel" style="max-width: none;"
                data-slick-options='{
                    "slidesToShow": 20,
                    "slidesToScroll": 1,
                    "autoplay": true,
                    "centerMode": false,
                    "asNavFor": ".testimonials-three__carousel",
                    "focusOnSelect": true,
                    "dots": false,
                    "centerPadding": 0,
                    "arrows": false,
                    "responsive": [
                        {
                            "breakpoint": 1600,
                            "settings": {
                                "slidesToShow": 17
                            }
                        },
                        {
                            "breakpoint": 1400,
                            "settings": {
                                "slidesToShow": 16
                            }
                        },
                        {
                            "breakpoint": 1200,
                            "settings": {
                                "slidesToShow": 13
                            }
                        },
                        {
                            "breakpoint": 1000,
                            "settings": {
                                "slidesToShow": 10
                            }
                        },
                        {
                            "breakpoint": 800,
                            "settings": {
                                "slidesToShow": 6
                            }
                        },
                        {
                            "breakpoint": 600,
                            "settings": {
                                "slidesToShow": 5
                            }
                        },
                        {
                            "breakpoint": 480,
                            "settings": {
                                "slidesToShow": 3
                            }
                        }
                    ]
                }'>
                <li v-for="activity in activity" :key="activity.activity_id" role="presentation">
                    <Link :href="`/activity-details/${activity.activity_id}`">
                        <span class="testimonials-three__meta-thumb">
                            <img :src="`${publicPath}storage/${activity.activity_image}`" :alt="activity.activity_title" />
                        </span>
                    </Link>
                </li>
            </ul>
            <div class="testimonials-three__carousel careox-slick__carousel" data-slick-options='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "asNavFor": ".testimonials-three__carousel-thumb",
                "autoplay": true,
                "dots": false,
                "centerPadding": 0,
                "arrows": true,
                "nextArrow": "<button class=\"next\"><i class=\"icon-right-arrow-two1\"></i></button>",
                "prevArrow": "<button class=\"prev\"><i class=\"icon-right-arrow-two\"></i></button>"
            }'>
                <!-- Carousel items go here -->
            </div>
        </div>
    </div>
</section>



        <section class="main-slider-one">
            <div class="main-slider-one__carousel careox-owl__carousel owl-carousel" ref="owlCarousel">
                <div class="item">
                    <div class="main-slider-one__item">
                        <div class="main-slider-one__bg"
                            style="background-image: url(assets/images/backgrounds/slider-1-1.jpg);">
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <circle class='circle0 steap' cx="50%" cy="55%" r="5.2%"></circle>
                            <circle class='circle1 steap' cx="50%" cy="55%" r="15.6%"></circle>
                            <circle class='circle2 steap' cx="50%" cy="55%" r="26%"></circle>
                            <circle class='circle3 steap' cx="50%" cy="55%" r="36.4%"></circle>
                            <circle class='circle4 steap' cx="50%" cy="55%" r="46.8%"></circle>
                            <circle class='circle5 steap' cx="50%" cy="55%" r="57%"></circle>
                            <circle class='circle6 steap' cx="50%" cy="55%" r="67.7%"></circle>
                            <circle class='circle7 steap' cx="50%" cy="55%" r="78.1%"></circle>
                            <circle class='circle8 steap' cx="50%" cy="55%" r="88.5%"></circle>
                            <circle class='circle9 steap' cx="50%" cy="55%" r="100%"></circle>
                        </svg>
                        <div class="main-slider-one__shape-one"><img
                                :src="`${publicPath}assets/images/shapes/slider-1-shape-1.png`" alt="careox"></div>

                        <div class="main-slider-one__shape-three"><img
                                :src="`${publicPath}assets/images/shapes/slider-1-shape-3.png`" alt="careox"></div>
                        <div class="main-slider-one__shape-four"><img
                                :src="`${publicPath}assets/images/shapes/slider-1-shape-4.png`" alt="careox"></div>
                        <div class="main-slider-one__layer"
                            style="background-image: url(assets/images/shapes/slider-1-layer-bg.png);">
                            <div class="main-slider-one__layer__inner">
                                <img :src="`${publicPath}assets/images/backgrounds/slider-1-layer-1.png`"
                                    style="object-fit: cover" alt="careox">
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-slider-one__content">
                                        <div class="main-slider-one__image">
                                            <img :src="`${publicPath}assets/images/shapes/slider-1-arrow.png`"
                                                alt="careox">
                                            <img :src="`${publicPath}assets/images/shapes/slider-1-hand.png`"
                                                alt="careox">
                                        </div>
                                        <!-- slider-sub-title -->
                                        <h2 class="main-slider-one__title">The Vital Role of <br>Women VOGS'</h2>
                                        <!-- slider-title -->
                                        <p class="main-slider-one__text">
                                            Women gynecologists play a crucial role in providing <br> specialized care
                                            tailored to the unique needs of women.
                                        </p><!-- slider-text -->
                                        <div class="main-slider-one__btn">
                                            <Link herf="/blog" class="careox-btn"><span>Discover more</span></Link>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="main-slider-one__item">
                        <div class="main-slider-one__bg"
                            style="background-image: url(assets/images/backgrounds/slider-1-1.jpg);">
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <circle class='circle0 steap' cx="50%" cy="55%" r="5.2%"></circle>
                            <circle class='circle1 steap' cx="50%" cy="55%" r="15.6%"></circle>
                            <circle class='circle2 steap' cx="50%" cy="55%" r="26%"></circle>
                            <circle class='circle3 steap' cx="50%" cy="55%" r="36.4%"></circle>
                            <circle class='circle4 steap' cx="50%" cy="55%" r="46.8%"></circle>
                            <circle class='circle5 steap' cx="50%" cy="55%" r="57%"></circle>
                            <circle class='circle6 steap' cx="50%" cy="55%" r="67.7%"></circle>
                            <circle class='circle7 steap' cx="50%" cy="55%" r="78.1%"></circle>
                            <circle class='circle8 steap' cx="50%" cy="55%" r="88.5%"></circle>
                            <circle class='circle9 steap' cx="50%" cy="55%" r="100%"></circle>
                        </svg>
                        <div class="main-slider-one__shape-one"><img
                                :src="`${publicPath}assets/images/shapes/slider-1-shape-1.png`" alt="careox"></div>

                        <div class="main-slider-one__shape-three"><img
                                :src="`${publicPath}assets/images/shapes/slider-1-shape-3.png`" alt="careox"></div>
                        <div class="main-slider-one__shape-four"><img
                                :src="`${publicPath}assets/images/shapes/slider-1-shape-4.png`" alt="careox"></div>
                        <div class="main-slider-one__layer"
                            style="background-image: url(assets/images/shapes/slider-1-layer-bg.png);">
                            <div class="main-slider-one__layer__inner">
                                <img :src="`${publicPath}assets/images/backgrounds/slider-1-layer-2.jpg`" alt="careox">
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-slider-one__content">
                                        <div class="main-slider-one__image">
                                            <img :src="`${publicPath}assets/images/shapes/slider-1-arrow.png`"
                                                alt="careox">
                                            <img :src="`${publicPath}assets/images/shapes/slider-1-hand.png`"
                                                alt="careox">
                                        </div>
                                        <!-- slider-sub-title -->
                                        <h2 class="main-slider-one__title">Volunteer and<br> Make An Impact</h2>
                                        <!-- slider-title -->
                                        <p class="main-slider-one__text">
                                            Volunteers are the heart of our charity. Whether you're offering your
                                            time,<br> skills, or expertise, your involvement helps us reach more people
                                            in need.
                                        </p><!-- slider-text -->
                                        <div class="main-slider-one__btn">
                                            <Link herf="/blog" class="careox-btn"><span>Discover more</span></Link>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="main-slider-one__item">
                        <div class="main-slider-one__bg"
                            style="background-image: url(assets/images/backgrounds/slider-1-1.jpg);"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <circle class='circle0 steap' cx="50%" cy="55%" r="5.2%"></circle>
                            <circle class='circle1 steap' cx="50%" cy="55%" r="15.6%"></circle>
                            <circle class='circle2 steap' cx="50%" cy="55%" r="26%"></circle>
                            <circle class='circle3 steap' cx="50%" cy="55%" r="36.4%"></circle>
                            <circle class='circle4 steap' cx="50%" cy="55%" r="46.8%"></circle>
                            <circle class='circle5 steap' cx="50%" cy="55%" r="57%"></circle>
                            <circle class='circle6 steap' cx="50%" cy="55%" r="67.7%"></circle>
                            <circle class='circle7 steap' cx="50%" cy="55%" r="78.1%"></circle>
                            <circle class='circle8 steap' cx="50%" cy="55%" r="88.5%"></circle>
                            <circle class='circle9 steap' cx="50%" cy="55%" r="100%"></circle>
                        </svg>
                        <div class="main-slider-one__shape-one"><img
                                :src="`${publicPath}assets/images/shapes/slider-1-shape-1.png`" alt="careox2"></div>

                        <div class="main-slider-one__shape-three"><img
                                :src="`${publicPath}assets/images/shapes/slider-1-shape-3.png`" alt="careox2"></div>
                        <div class="main-slider-one__shape-four"><img
                                :src="`${publicPath}assets/images/shapes/slider-1-shape-4.png`" alt="careox2"></div>
                        <div class="main-slider-one__layer"
                            style="background-image: url(assets/images/shapes/slider-1-layer-bg.png);">
                            <div class="main-slider-one__layer__inner">
                                <img :src="`${publicPath}assets/images/backgrounds/slider-1-layer-3.jpg`" alt="careox2">
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-slider-one__content">
                                        <div class="main-slider-one__image">
                                            <img :src="`${publicPath}assets/images/shapes/slider-1-arrow.png`"
                                                alt="careox">
                                            <img :src="`${publicPath}assets/images/shapes/slider-1-hand.png`"
                                                alt="careox">
                                        </div>
                                        <!-- slider-sub-title -->
                                        <h2 class="main-slider-one__title">Your Support <br>Changes Lives</h2>
                                        <!-- slider-title -->
                                        <p class="main-slider-one__text">
                                            Every donation to helps us provide critical healthcare services, <br>
                                            educational programs, and support to those who need it most.
                                        </p><!-- slider-text -->
                                        <div class="main-slider-one__btn">
                                            <Link herf="/blog" class="careox-btn"><span>Discover more</span></Link>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- main-slider-end -->



        <section class="cta-one">
            <div class="container-fluid">
                <div class="cta-one__shape-middle"
                    style="background-image: url(assets/images/shapes/cta-1-shape-2.png);"></div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta-one__content">
                            <h3 class="cta-one__title">Join Our Mission</h3>
                            <p class="cta-one__text">Join our mission to provide support and hope to those in need.</p>
                            <Link href="/about" class="careox-btn">See More</Link>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="cta-one__content cta-one__content--right">
                            <h3 class="cta-one__title">Get Involved</h3>
                            <p class="cta-one__text">Get involved and make a meaningful contribution. Support our
                                charity today.</p>
                            <Link href="/contact" class="careox-btn">See More</Link>
                            <div class="cta-one__content__shape"
                                style="background-image: url(assets/images/shapes/cta-1-shape-1.png);"></div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section><!-- /.cta-one -->

        <section class="about-one">

            <div class="container">
                <div class="row" v-for="home_main in home_main" :key="home_main.home_main_id">
                    <div class="col-xl-6">
                        <div class="about-one__image wow" data-wow-delay="100ms">
                            <div class="about-one__image__one">
                                <img :src="`${publicPath}storage/images/${home_main.home_main_image}`"
                                    :alt="home_main.home_main_title" />
                            </div>
                            <div class="about-one__image__two">
                                <img style="width: 300px;"
                                    :src="`${publicPath}storage/images/${home_main.home_sec_image}`"
                                    :alt="home_main.home_main_title" />
                                <div class="about-one__image__video">
                                    <a href="#" class="">
                                    </a>Always Support Us!
                                </div>
                            </div>
                            <div class="about-one__image__shape-one">
                                <img :src="`${publicPath}assets/images/shapes/about-1-shape-1.png`" alt="careox">
                            </div>
                            <div class="about-one__image__shape-two">
                                <img :src="`${publicPath}assets/images/shapes/about-1-shape-2.png`" alt="careox">
                            </div>

                        </div>
                        <!-- /.why-choose-two__image -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms">
                        <div class="about-one__content">
                            <div class="sec-title text-left">

                                <h6 class="sec-title__tagline"><span class="sec-title__tagline__border"></span>OUR ABOUT
                                    US</h6>
                                <!-- /.sec-title__tagline -->

                                <h3 class="sec-title__title">{{ home_main.home_main_title }}</h3>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="about-one__content__text">
                                {{ home_main.home_main_content }}
                            </p>
                            <div class="row gutter-y-30">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>
                            <div class="about-one__content__border"></div>


                        </div><!-- /.why-choose-two__content -->
                        <Link href="/about" class="careox-btn">See More</Link>
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->

            </div><!-- /.container -->
        </section><!-- /.about-one -->


        <!-- Service Start -->

        <!-- Service End -->

        <section class="blog-two">
            <div class="container">
                <div class="sec-title text-center">

                    <h6 class="sec-title__tagline"><span class="sec-title__tagline__border"></span>News & articles</h6>
                    <!-- /.sec-title__tagline -->

                    <h3 class="sec-title__title">We Articles From Blog <br>News and Story</h3>
                    <!-- /.sec-title__title -->
                </div><!-- /.sec-title -->
                <div class="blog-one__carousel careox-owl__carousel careox-owl__carousel--with-shadow careox-owl__carousel--basic-nav owl-carousel"
                    ref="blogCarousel">
                    <div v-for="blog in blogs" :key="blog.blog_id" class="item">
                        <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='00ms'
                            style='--accent-color: #ffa415;'>
                            <Link :href="`/blog-details/${blog.blog_id}`">
                            <div class="blog-card__image">
                                <img :src="`${publicPath}storage/${blog.image}`" :alt="blog.title" />
                                <img :src="`${publicPath}storage/${blog.image}`" :alt="blog.title" />
                                <Link :href="`/blog-details/${blog.blog_id}`">
                                <span class="sr-only">{{ blog.title }}</span>
                                </Link>

                                <div class="blog-card__date"><i class="icofont-ui-calendar"></i>{{ blog.created_dte }}
                                </div>
                                <!-- /.blog-card__date -->
                            </div><!-- /.blog-card__image -->
                            </Link>
                            <div class="blog-card__content">
                                <ul class="list-unstyled blog-card__meta">
                                    <li>
                                        <Link :href="`/blog-details/${blog.blog_id}`">Created By: {{ blog.created_by }}
                                        </Link>
                                    </li>

                                </ul><!-- /.list-unstyled blog-card__meta -->
                                <h3 class="blog-card__title">
                                    <Link :href="`/blog-details/${blog.blog_id}`">{{ blog.title }}</Link>
                                </h3><!-- /.blog-card__title -->
                                <p class="blog-card__text">
                                    {{ blog.content.substring(0, 100) }}.....
                                </p><!-- /.blog-card__text -->
                                <Link :href="`/blog-details/${blog.blog_id}`" class="blog-card__link">
                                <span class="blog-card__link__front"><span class="icofont-double-right"></span></span>
                                <span class="blog-card__link__back"><span class="icofont-double-right"></span>Read
                                    More</span>
                                </Link>

                            </div><!-- /.blog-card__content -->
                        </div><!-- /.blog-card -->
                    </div><!-- /.item -->

                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-two -->


        <section class="info">
            <div class="container">
                <ul class="info__wrapper">
                    <li style="--accent-color: #ffa415;">
                        <div class="info__icon"><span class="icofont-phone"></span></div>
                        <div class="info__content">
                            <h5 class="info__title">Call Me</h5>
                            <p class="info__text"><a href="tel:+0758999999">(075) 899 9999</a></p>
                        </div>
                    </li>
                    <li style="--accent-color: #ff5528;">
                        <div class="info__icon"><span class="icofont-envelope"></span></div>
                        <div class="info__content">
                            <h5 class="info__title">Email</h5>
                            <p class="info__text"><a href="mailto:careox@envato.com">clickoncharity@gmail.com</a></p>
                        </div>
                    </li>
                    <li style="--accent-color: #8139e7;">
                        <div class="info__icon"><span class="icofont-location-pin"></span></div>
                        <div class="info__content">
                            <h5 class="info__title">Address</h5>
                            <p class="info__text"><a href="https://www.google.com/maps">Bus Land Road, Eravur
                                    <br>Batticaloa, Sri Lanka</a></p>
                        </div>
                    </li>
                </ul>
            </div><!-- /.container -->
        </section><!-- /.info -->



        <section class="contact-map">
            <div class="container-fluid">
                <div class="google-map google-map__contact">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63249.9506853636!2d81.56300285163756!3d7.776895214009499!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afad474cfc87353%3A0x9d3fd8ac4c081b6a!2sEravur!5e0!3m2!1sen!2slk!4v1722673341466!5m2!1sen!2slk"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- /.google-map -->
            </div><!-- /.container-fluid -->
        </section><!-- /.contact-map -->


    </website-layout>
</template>
<script>
import WebsiteLayout from '@/Layouts/WebsiteLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Home',
    components: {
        WebsiteLayout,
        Link,
    },
    props: {
        blogs: Object,
        home_main: Object,
        activity: Object,
    },
    data() {
        return {
            publicPath: import.meta.env.VITE_APP_URL || '/', // Use environment variable or default to root
        };
    },
    mounted() {
        this.initializeCarousel();
        this.initializeCategoryCarousel();
        this.initializeBlogCarousel();
        this.careoxSlickInit(); // Initialize the slick carousel
    },
    methods: {
        initializeCarousel() {
            $(this.$refs.owlCarousel).owlCarousel({
                loop: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                items: 1,
                autoplay: true,
                autoplayTimeout: 7000,
                smartSpeed: 10,
                nav: false,
                navText: [
                    '<span class="icon-left-arrow"></span>',
                    '<span class="icon-right-arrow"></span>',
                ],
                dots: true,
                margin: 0,
            });
        },
        initializeCategoryCarousel() {
            $(this.$refs.categoryCarousel).owlCarousel({
                items: 1,
                margin: 30,
                loop: false,
                smartSpeed: 700,
                nav: true,
                navText: [
                    '<span class="icon-up-arrow-two"></span>',
                    '<span class="icon-down-arrow-two"></span>',
                ],
                dots: false,
                autoplay: false,
                responsive: {
                    0: { items: 1 },
                    500: { items: 2 },
                    992: { items: 3 },
                },
            });
        },
        initializeBlogCarousel() {
            $(this.$refs.blogCarousel).owlCarousel({
                items: 1,
                margin: 30,
                loop: false,
                smartSpeed: 700,
                nav: false,
                navText: [
                    '<span class="fa fa-angle-left"></span>',
                    '<span class="fa fa-angle-right"></span>',
                ],
                dots: false,
                autoplay: false,
                responsive: {
                    0: { items: 1 },
                    570: { items: 2 },
                    992: { items: 3 },
                },

            });
        },
        careoxSlickInit() {
            // slick slider
            let careoxslickCarousel = $(".careox-slick__carousel");
            if (careoxslickCarousel.length) {
                careoxslickCarousel.each(function () {
                    let elm = $(this);
                    let options = elm.data("slick-options");
                    let careoxslickCarousel = elm.slick(
                        "object" === typeof options ? options : JSON.parse(options)
                    );
                });
            }
        }
    },
};
</script>

<style>
.info {
    font-size: 16px;
    /* Base font size for the entire section */
}

.info__title {
    font-size: 16px;
    /* Slightly larger for titles */
    margin-bottom: 5px;
    /* Adjust spacing */
}

.info__text {
    font-size: 16px;
    /* Smaller size for the text */
}

.info__icon {
    font-size: 20px;
    /* Adjust icon size if needed */
    margin-right: 10px;
    /* Space between icon and text */
}

a {
    color: inherit;
    /* Keep the link color the same as text */
    text-decoration: none;
    /* Remove underline */
}

a:hover {
    text-decoration: underline;
    /* Optional: Add underline on hover */
}
</style>
