<template>
    <website-layout>
        <section class="page-header">
            <div class="page-header__bg"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title bw-split-in-left">Activity Details</h2>
                <ul class="careox-breadcrumb list-unstyled">
                    <li><Link href="/">Home</Link></li>
                    <li><span>Activity Details</span></li>
                </ul><!-- /.careox-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="event-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="event-details__content">
                            <div class="event-details__image">
                                <img :src="`${publicPath}storage/${activity.activity_image}`" :alt="activity.activity_title" />
                            </div>
                            <h3 class="event-details__title">{{ activity.activity_title }}</h3>
                            <p class="event-details__text">
                                {{ activity.activity_content }}
                            </p>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="event-details__info">
                            <ul class="event-details__info__list">
                                <li>Starting Time: <span>{{ activity.start_time }}</span></li>
                                <li>Date: <span>{{ activity.date }}</span></li>
                                <li>Phone: <span>{{ activity.phone }}</span></li>
                                <li>Location: <span>{{ activity.location }}</span></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>


    </website-layout>
</template>

<script>
import WebsiteLayout from '@/Layouts/WebsiteLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'ActivityPage',
    components: {
        WebsiteLayout,
        Link,
    },
    props: {
        activity: Object, // Singular because you're passing one blog
    },
    data() {
        return {
            publicPath: import.meta.env.VITE_APP_URL || '/',
        };
    },
};
</script>
