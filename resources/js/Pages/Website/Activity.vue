<template>
    <website-layout>
        <section class="page-header">
            <div class="page-header__bg"></div>
            <div class="container">
                <h2 class="page-header__title bw-split-in-left">Charity Activities</h2>
                <ul class="careox-breadcrumb list-unstyled">
                    <li>
                        <Link href="/">Home</Link>
                    </li>
                    <li><span>Activities</span></li>
                </ul>
            </div>
        </section>

        <section class="event-one event-one--page">
            <div class="container">
                <div class="sec-title text-center">
                    <h6 class="sec-title__tagline bw-split-in-right">
                        <span class="sec-title__tagline__border"></span>Our Event
                    </h6>
                    <h3 class="sec-title__title bw-split-in-left">Our Upcoming Event</h3>
                </div>
                <div class="row gutter-y-30 masonry-layout">
                    <div class="col-xl-4 col-md-6" v-for="activity in activity.data" :key="activity.activity_id">
                        <div class="event-one__item">
                            <img :src="`${publicPath}storage/${activity.activity_image}`" :alt="activity.activity_title" />
                            <a :href="`/activity-details/${activity.activity_id}`" class="event-one__item__rm">
                                <i class="icon-right-arrow"></i>
                            </a>
                            <div class="event-one__item__content">
                                <h3 class="event-one__item__title">
                                    <a :href="`/activity-details/${activity.activity_id}`">{{ activity.activity_title }}</a>
                                </h3>
                                <ul class="event-one__item__meta">
                                    <li><i class="icofont-ui-calendar"></i>{{ activity.date }}</li>
                                    <li><i class="icofont-location-pin"></i>{{ activity.location }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <ul class="post-pagination blog-page__pagination">
                            <li :class="{ 'disabled': !activity.prev_page_url }">
                                <a @click.prevent="changePage(activity.current_page - 1)" v-if="activity.prev_page_url">Previous</a>
                            </li>
                            <li v-for="page in pages" :key="page">
                                <a :class="{ 'current': page === activity.current_page }" @click.prevent="changePage(page)">
                                    {{ page }}
                                </a>
                            </li>
                            <li :class="{ 'disabled': !activity.next_page_url }">
                                <a @click.prevent="changePage(activity.current_page + 1)" v-if="activity.next_page_url">Next</a>
                            </li>
                        </ul>
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
        activity: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            publicPath: import.meta.env.VITE_APP_URL || '/',
        };
    },
    computed: {
        pages() {
            const totalPages = this.activity.last_page;
            return Array.from({ length: totalPages }, (_, i) => i + 1);
        }
    },
    methods: {
        changePage(page) {
            if (page < 1 || page > this.activity.last_page) return;

            this.$inertia.get('/activity', { page }, {
                preserveState: true,
                replace: true
            });
        }
    }
};
</script>
