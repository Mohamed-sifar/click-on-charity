<template>
    <website-layout>
        <section class="page-header">
            <div class="page-header__bg"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title bw-split-in-left">Our About Us</h2>
                <ul class="careox-breadcrumb list-unstyled">
                    <li><Link href="/">Home</Link></li>
                    <li><span>Our About Us</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="become-volunter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="become-volunter__content">
                            <h3 class="become-volunter__title">EXPLORING THE EVOLUTION & IMPORTANCE OF
                                CLERGY EDUCATION</h3>

                            <div class="become-volunter__highlight">Charity’s focus on enhancing the quality &
                                accessibility of clergy education, ultimately contributing to stronger, more informed, &
                                more effective religious leadership in their communities.</div>

                            <div v-for="about_main in about_main" :key="about_main.about_main_id" class="row">
                                <div class="col-xl-6">
                                    <div class="about-one__image wow fadeInLeft" data-wow-delay="100ms">
                                        <div class="about-one__image__one">
                                            <img :src="`${publicPath}storage/images2/${about_main.about_main_image}`"
                                                :alt="about_main.about_title" />
                                        </div>
                                        <div class="about-one__image__two">
                                            <img style="width: 300px; background: rgba(255, 255, 255, 0.7); border-radius: 15px; backdrop-filter: blur(10px);"
                                                :src="`${publicPath}storage/images2/${about_main.about_sec_image}`"
                                                :alt="about_main.about_title" />

                                        </div>
                                        <div class="about-one__image__shape-two"><img
                                                :src="`${publicPath}assets/images/shapes/about-1-shape-5.png`"
                                                alt="careox"></div>



                                    </div><!-- /.about__image -->
                                </div><!-- /.col-lg-6 -->
                                <div class="col-xl-6 wow fadeInRight" data-wow-delay="200ms">
                                    <div class="about-one__content">
                                        <div class="sec-title text-left">

                                            <h6 class="sec-title__tagline bw-split-in-right"><span
                                                    class="sec-title__tagline__border"></span>OUR ABOUT US</h6>
                                            <!-- /.sec-title__tagline -->

                                            <h3 class="sec-title__title bw-split-in-left">{{ about_main.about_title }}
                                            </h3><!-- /.sec-title__title -->
                                        </div><!-- /.sec-title -->
                                        <p class="about-one__content__text">
                                            {{ about_main.about_main_content.substring(0, 699) }}
                                        </p>
                                        <div class="row gutter-y-30">

                                        </div>
                                        <div class="about-one__content__border"></div>


                                    </div><!-- /.about__content -->
                                </div><!-- /.col-lg-6 -->
                                <p class="about-one__content__text">
                                {{ about_main.about_main_content.substring(699) }}
                            </p>
                            </div><!-- /.row -->
                            <div class="about-one__text wow fadeInUp">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="feature-three">
            <div class="container">
                <div class="row mb-6">
                    <div class="col-xl-1 col-md-12 wow fadeInUp" data-wow-delay="00ms">

                    </div>
                    <div class="col-xl-12 col-md-12 wow fadeInUp" data-wow-delay="100ms">
                        <div class="feature-three__item" style="--accent-color: #8139e7;">
                            <div class="feature-three__item__shape"
                                style="background-image: url(assets/images/shapes/feature-3-shape.png);"></div>
                            <div class="feature-three__item__hover"
                                style="background-image: url(assets/images/resources/feature-3-3.jpg)"></div>
                            <div class="feature-three__item__top">
                                <h3 class="feature-three__item__title">VISION</h3>
                            </div>
                            <p class="feature-three__item__text">Empowering clergy to transform communities through
                                faith & service</p>
                            <ul class="feature-three__item__list">

                            </ul>

                        </div><!-- feature-item -->
                    </div>
                    <br><br>
                    <div class="col-xl-12 col-md-12 wow fadeInUp" data-wow-delay="150ms">
                        <div class="feature-three__item" style="--accent-color: #44c895;">
                            <div class="feature-three__item__shape"
                                style="background-image: url(assets/images/shapes/feature-3-shape.png);"></div>
                            <div class="feature-three__item__hover"
                                style="background-image: url(assets/images/resources/feature-3-4.jpg)"></div>
                            <div class="feature-three__item__top">
                                <h3 class="feature-three__item__title">MISSION</h3>
                            </div>
                            <p class="feature-three__item__text">To empower clergy with comprehensive English knowledge
                            </p>
                            <ul class="feature-three__item__list">
                                <li>
                                    <span class="feature-three__item__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    leadership abilities and administrative skills fostering spiritual growth
                                </li>
                                <li>
                                    <span class="feature-three__item__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    community engagement to effectively lead and serve their congregations.
                                </li>
                            </ul>

                        </div><!-- feature-item -->
                    </div>
                    <div class="col-xl-1 col-md-12 wow fadeInUp" data-wow-delay="50ms">

                    </div>

                </div>
            </div>
        </section>
        <br><br><br><br><br>
        <section class="why-choose-one">
            <div class="why-choose-one__bg jarallax" data-jarallax="" data-speed="0.3" data-imgposition="50% -100%"
                style="background-image: url(assets/images/backgrounds/why-choose-one-1.png);"></div>
            <!-- /.contact__bg -->
            <div class="why-choose-one__shape"
                style="background-image: url(assets/images/shapes/why-choose-one-shape.png); width: 189px;"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-xl-4"></div>
                    <div class="col-lg-10 col-xl-8">
                        <div class="sec-title text-left">

                            <h6 class="sec-title__tagline bw-split-in-right"><span
                                    class="sec-title__tagline__border"></span>WHY CHOOSE US</h6>
                            <!-- /.sec-title__tagline -->

                            <h3 class="sec-title__title bw-split-in-left">OUTPUT</h3><!-- /.sec-title__title -->
                        </div><!-- /.sec-title -->
                        <p class="why-choose-one__text">
                            Charity’s focus on enhancing the quality & accessibility of clergy education, ultimately
                            contributing to stronger, more informed, & more effective religious leadership in their
                            communities.
                        </p><!-- /.why-choose-one__text -->
                        <div class="why-choose-one__box wow fadeInUp" style="--accent-color: #ffa415;"
                            data-wow-delay="00ms">
                            <div class="why-choose-one__box__icon"><span class="icon-interactions"></span></div>
                            <h3 class="why-choose-one__box__title">BENEFICIARY</h3>
                            <ul class="why-choose-one__box__list">
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    Religious organization such as, churches, mosque, temple & other religious bodies
                                    that benefit from having better-trained clergy.
                                </li>
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    Active clergy who seek further education, training, or professional development.
                                    They might participate in workshops, seminars and training programs.
                                </li>
                            </ul>
                            <Link href="/about-us" class="why-choose-one__box__rm"><span
                                class="icon-up-arrow-two"></span></Link>
                        </div>
                        <div class="why-choose-one__box" style="--accent-color: #fc5528;" data-wow-delay="100ms">
                            <div class="why-choose-one__box__icon"><span class="icon-charity-two"></span></div>
                            <h3 class="why-choose-one__box__title">OBJECTIVES</h3>
                            <ul class="why-choose-one__box__list">
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    Funding and Organizing training programs, workshops, and seminars for clergy
                                    members.
                                </li>
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    This can include continuous education opportunities to keep clergy updated on
                                    theological, technology & other relevant skills.
                                </li>
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    This can help advance knowledge and best practices within the field & also Educating
                                    clergy on how to effectively engage & support their communities, including training
                                    on social issues, counseling, and community leadership.
                                </li>
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    These objects aim to ensure that clergy are well-prepared to serve their communities
                                    effectively, with a strong foundation in both academic knowledge & practical skills.
                                </li>
                            </ul>
                            <Link href="/about-us" class="why-choose-one__box__rm"><span
                                class="icon-up-arrow-two"></span></Link>
                        </div>
                        <div class="why-choose-one__box" style="--accent-color: #8139e7;" data-wow-delay="200ms">
                            <div class="why-choose-one__box__icon"><span class="icon-interactions"></span></div>
                            <h3 class="why-choose-one__box__title">WE ARE DOING</h3>
                            <ul class="why-choose-one__box__list">
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    We are support poor student’s for theirs studies.
                                </li>
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    We are sponsored funds for medicine & engineering students.
                                </li>
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    We are providing water supply related Infrastructures (water pipe & etc.)
                                </li>
                                <li>
                                    <span class="why-choose-one__box__list__icon"><i
                                            class="icofont-check-circled"></i></span>
                                    We are providing religious priests Educational improvement programs
                                </li>
                            </ul>
                            <Link href="/about-us" class="why-choose-one__box__rm"><span
                                class="icon-up-arrow-two"></span></Link>
                        </div>
                    </div><!-- /.col-lg-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

        <br><br><br><br><br>




    </website-layout>
</template>


<script>
import WebsiteLayout from '@/Layouts/WebsiteLayout.vue';
import { Link } from '@inertiajs/vue3';
import $ from 'jquery'; // Import jQuery

export default {
    name: 'About',
    components: {
        WebsiteLayout,
        Link,
    },
    props: {
        about_main: Object,
    },
    data() {
        return {
            publicPath: import.meta.env.VITE_APP_URL || '/', // Use environment variable or default to root
        };
    },
    mounted() {
        // Initialize the accordion after the component has been mounted
        this.initializeAccordion();
    },
    methods: {
        initializeAccordion() {
            if ($(".alefox-accrodion").length) {
                var accrodionGrp = $(".alefox-accrodion");
                accrodionGrp.each(function () {
                    var accrodionName = $(this).data("grp-name");
                    var Self = $(this);
                    var accordion = Self.find(".accrodion");
                    Self.addClass(accrodionName);
                    Self.find(".accrodion .accrodion-content").hide();
                    Self.find(".accrodion.active").find(".accrodion-content").show();
                    accordion.each(function () {
                        $(this)
                            .find(".accrodion-title")
                            .on("click", function () {
                                if ($(this).parent().hasClass("active") === false) {
                                    $(".alefox-accrodion." + accrodionName)
                                        .find(".accrodion")
                                        .removeClass("active");
                                    $(".alefox-accrodion." + accrodionName)
                                        .find(".accrodion")
                                        .find(".accrodion-content")
                                        .slideUp();
                                    $(this).parent().addClass("active");
                                    $(this).parent().find(".accrodion-content").slideDown();
                                }
                            });
                    });
                });
            }
        }
    }
};
</script>

<style scoped>
/* Add your component-specific styles here */
</style>


<style scoped>
/* Add your component-specific styles here */
</style>
