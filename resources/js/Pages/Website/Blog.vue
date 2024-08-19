<template>
    <website-layout>
        <section class="page-header">
            <div class="page-header__bg"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title bw-split-in-left">Charity Blogs</h2>
                <ul class="careox-breadcrumb list-unstyled">
                    <li>
                        <Link href="/">Home</Link>
                    </li>
                    <li><span>Blog</span></li>
                </ul><!-- /.thm-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->



        <section class="blog-one blog-one--page">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="row gutter-y-30">
                            <div v-for="blog in blogs.data" :key="blog.id" class="col-md-12">
                                <div class="blog-card-list wow fadeInUp" data-wow-duration='1500ms'
                                    data-wow-delay='00ms' style='--accent-color: #ffa415;'>
                                    <Link :href="`/blog-details/${blog.blog_id}`">
                                    <div class="blog-card-list__image">
                                        <img :src="`${publicPath}storage/${blog.image}`" :alt="blog.title" />
                                        <img :src="`${publicPath}storage/${blog.image}`" :alt="blog.title" />
                                        <a href="#"><span class="sr-only">{{
                                            blog.title
                                                }}.</span>
                                            <!-- /.sr-only --></a>
                                    </div><!-- /.blog-card-list__image -->
                                    </Link>
                                    <div class="blog-card-list__content">
                                        <ul class="list-unstyled blog-card-list__meta">
                                            <li><a href="#">Created By: {{ blog.created_by }}</a></li>
                                            <li><i class="icofont-ui-calendar"></i>{{ blog.created_dte }}</li>
                                        </ul><!-- /.list-unstyled blog-card-list__meta -->
                                        <h3 class="blog-card-list__title"><a :href="`/blog-details/${blog.blog_id}`">{{
                                            blog.title }}.</a></h3>
                                        <!-- /.blog-card-list__title -->
                                        <p class="blog-card-list__text">
                                            {{ blog.content.substring(0, 100) }}.....
                                        </p><!-- /.blog-card-list__text -->
                                        <Link :href="`/blog-details/${blog.blog_id}`" class="blog-card-list__link">
                                        <span class="blog-card-list__link__front"><span
                                                class="icofont-double-right"></span></span>
                                        <span class="blog-card-list__link__back"><span
                                                class="icofont-double-right"></span>Read More</span>
                                        </Link><!-- /.blog-card-list__link -->
                                    </div><!-- /.blog-card-list__content -->
                                </div><!-- /.blog-card-list -->
                            </div><!-- /.col-md-6 col-lg-4 -->

                            <div class="col-md-12">
                                <ul class="post-pagination blog-page__pagination">
                                    <li :class="{ 'disabled': !blogs.prev_page_url }">
                                        <a @click.prevent="changePage(blogs.current_page - 1)"
                                            v-if="blogs.prev_page_url">Previous</a>
                                    </li>
                                    <li v-for="page in pages" :key="page">
                                        <a :class="{ 'current': page === blogs.current_page }"
                                            @click.prevent="changePage(page)">
                                            {{ page }}
                                        </a>
                                    </li>
                                    <li :class="{ 'disabled': !blogs.next_page_url }">
                                        <a @click.prevent="changePage(blogs.current_page + 1)"
                                            v-if="blogs.next_page_url">Next</a>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.col-lg-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>


    </website-layout>
</template>

<script>
import WebsiteLayout from '@/Layouts/WebsiteLayout.vue';
import { Link } from '@inertiajs/vue3';

export default {
    name: 'BlogPage',
    components: {
        WebsiteLayout,
        Link,
    },
    props: {
        blogs: Object
    },
    data() {
        return {
            publicPath: import.meta.env.VITE_APP_URL || '/',
        };
    },
    computed: {
        pages() {
            const totalPages = this.blogs.last_page;
            const pages = [];
            for (let i = 1; i <= totalPages; i++) {
                pages.push(i);
            }
            return pages;
        }
    },
    methods: {
        changePage(page) {
            if (page < 1 || page > this.blogs.last_page) return;

            this.$inertia.get('/blog', { page }, {
                preserveState: true,
                replace: true
            });
        }
    }
};
</script>


<style scoped>
.blog-card__image {
    position: relative;
}

.blog-card__image img {
    width: 286px;
    height: 202px;
    object-fit: cover;
    /* Ensures the image covers the dimensions without distortion */
}
</style>
