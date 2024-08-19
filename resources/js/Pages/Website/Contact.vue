<template>
    <website-layout>
        <section class="page-header">
            <div class="page-header__bg"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title bw-split-in-left">Contact</h2>
                <ul class="careox-breadcrumb list-unstyled">
                    <li>
                        <Link href="/">Home</Link>
                    </li>
                    <li><span>Contact</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="contact-one contact-one--page">
            <div v-for="contact_main in contact_main" :key="contact_main.contact_main_id">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5">
                            <div class="contact-one__image">
                                <div class="contact-one__image__grid">
                                    <!-- Four Images in Diamond Shape -->
                                    <div class="diamond-wrapper">
                                        <div class="diamond">
                                            <img class="diamond-image"
                                                :src="`${publicPath}storage/images3/${contact_main.contact_image_1}`"
                                                :alt="contact_main.contact_title" />
                                        </div>
                                        <div class="diamond">
                                            <img class="diamond-image"
                                                :src="`${publicPath}storage/images3/${contact_main.contact_image_2}`"
                                                :alt="contact_main.contact_title" />
                                        </div>
                                        <div class="diamond">
                                            <img class="diamond-image"
                                                :src="`${publicPath}storage/images3/${contact_main.contact_image_3}`"
                                                :alt="contact_main.contact_title" />
                                        </div>
                                        <div class="diamond">
                                            <img class="diamond-image"
                                                :src="`${publicPath}storage/images3/${contact_main.contact_image_4}`"
                                                :alt="contact_main.contact_title" />
                                        </div>
                                        <!-- Center Logo -->
                                        <div class="center-logo">
                                            <img :src="`${publicPath}assets/images/logo-dark.png`" alt="careox">
                                        </div>
                                    </div>
                                </div>
                                <div class="contact-one__image__info">
                                    <div class="contact-one__image__info__icon">
                                        <i class="icofont-phone-circle"></i>
                                    </div>
                                    <p class="contact-one__image__info__title">Need Help Now?</p>
                                    <p class="contact-one__image__info__text">
                                        <a href="tel:0758999999">(075) 899 9999</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7">
                            <form @submit.prevent="submit"
                                class="contact-one__form contact-form-validated form-one wow fadeInUp"
                                data-wow-duration="1500ms">
                                <div class="sec-title text-left">
                                    <h6 class="sec-title__tagline bw-split-in-right"><span
                                            class="sec-title__tagline__border"></span>OUR CONTACT NOW</h6>
                                    <h3 class="sec-title__title bw-split-in-left">{{ contact_main.contact_title }}</h3>
                                </div>
                                <p class="contact-one__text">
                                    {{ contact_main.contact_main_content }}
                                </p>
                                <div class="form-one__group">
                                    <div class="form-one__control">
                                        <input v-model="form.name" type="text" name="name" placeholder="Your Name"
                                            :class="{ 'is-invalid': errors.name }">
                                        <span v-if="errors.name" class="text-danger">{{ errors.name }}</span>
                                    </div><!-- /.form-one__control -->

                                    <div class="form-one__control">
                                        <input v-model="form.email" type="email" name="email"
                                            placeholder="Email Address" :class="{ 'is-invalid': errors.email }">
                                        <span v-if="errors.email" class="text-danger">{{ errors.email }}</span>
                                    </div><!-- /.form-one__control -->

                                    <div class="form-one__control">
                                        <input v-model="form.phone" type="tel" name="phone" placeholder="Phone No"
                                            :class="{ 'is-invalid': errors.phone }">
                                        <span v-if="errors.phone" class="text-danger">{{ errors.phone }}</span>
                                    </div><!-- /.form-one__control -->

                                    <div class="form-one__control">
                                        <input v-model="form.subject" type="text" name="subject" placeholder="Subject"
                                            :class="{ 'is-invalid': errors.subject }">
                                        <span v-if="errors.subject" class="text-danger">{{ errors.subject }}</span>
                                    </div><!-- /.form-one__control -->

                                    <div class="form-one__control form-one__control--full">
                                        <textarea v-model="form.message" name="message" placeholder="Write a Message"
                                            :class="{ 'is-invalid': errors.message }"></textarea>
                                        <span v-if="errors.message" class="text-danger">{{ errors.message }}</span>
                                    </div><!-- /.form-one__control -->
                                    <div class="form-one__control form-one__control--full">
                                        <button type="submit" class="careox-btn"><span>Send Request</span></button>
                                    </div><!-- /.form-one__control -->
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.about-one -->




    </website-layout>
</template>


<script>
import WebsiteLayout from '@/Layouts/WebsiteLayout.vue';
import { router, Link } from '@inertiajs/vue3';
import { reactive } from 'vue';
import $ from 'jquery'; // Import jQuery
import Swal from 'sweetalert2';


export default {
    name: 'About',
    components: {
        WebsiteLayout,
        Link,
    },
    props: {
        contact_main: Object,
    },
    data() {
        return {
            publicPath: import.meta.env.VITE_APP_URL || '/', // Use environment variable or default to root
            form: reactive({
                name: null,
                email: null,
                phone: null,
                subject: null,
                message: null,
            }),
            errors: reactive({}),
        };
    },
    mounted() {
        // Initialize the accordion after the component has been mounted
        this.initializeAccordion();
    },
    methods: {
    async submit() {
        try {
            await router.post('/contact-us', this.form);

            // Handle successful submission
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Contact request submitted successfully!',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false,
            });

            // Clear the form fields after successful submission
            this.form.name = null;
            this.form.email = null;
            this.form.phone = null;
            this.form.subject = null;
            this.form.message = null;
            this.errors = {};

        } catch (error) {
            if (error.response && error.response.status === 422) {
                // Handle validation errors
                this.errors = error.response.data.errors;
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Please check the form for errors.',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                });
            } else {
                // Handle other errors
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                });
            }
        }
    }
}

};
</script>

<style>
.diamond-wrapper {
    position: relative;
    width: 600px;
    /* Increased size for a much bigger layout */
    height: 600px;
    /* Increased size for a much bigger layout */
    display: flex;
    justify-content: center;
    align-items: center;
}

.diamond {
    width: 48%;
    /* Maintain size to ensure gaps between diamonds */
    height: 48%;
    /* Maintain size to ensure gaps between diamonds */
    overflow: hidden;
    position: absolute;
    clip-path: polygon(50% 0%, 100% 50%, 50% 100%, 0% 50%);
    border-radius: 20px;
    /* Increased border-radius for more rounded corners */
    background-color: #f0f0f0;
    border: 2px solid #ccc;
    /* Optional: Add a border to make the shape more visible */
}

.diamond:nth-child(1) {
    top: 0;
    left: 50%;
    transform: translateX(-50%);
}

.diamond:nth-child(2) {
    top: 50%;
    right: 0;
    transform: translateY(-50%);
}

.diamond:nth-child(3) {
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}

.diamond:nth-child(4) {
    top: 50%;
    left: 0;
    transform: translateY(-50%);
}

.diamond-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: inherit;
    /* Inherit border-radius from parent */
    transform: none;
}

.center-logo {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 10;
    background-color: #ffffff;
    border-radius: 50%;
    padding: 20px;
    /* Increased padding to make the logo stand out more */
}

.center-logo img {
    max-width: 150px;
    /* Increased size for the center logo */
    height: auto;
}

.contact-one__image__info {
    position: absolute;
    bottom: 10px;
    right: 10px;
    text-align: right;
    z-index: 10;
}
</style>
