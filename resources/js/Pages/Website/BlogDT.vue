<template>
    <website-layout>
        <section class="page-header">
            <div class="page-header__bg"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title bw-split-in-left">Blog Details</h2>
                <ul class="careox-breadcrumb list-unstyled">
                    <li><Link href="/">Home</Link></li>
                    <li><span>Blog Details</span></li>
                </ul><!-- /.careox-breadcrumb list-unstyled -->
            </div><!-- /.container -->
        </section><!-- /.page-header -->

        <section class="blog-details">
            <div class="container">
                <div class="row gutter-y-60">
                    <div class="col-12">
                        <div class="blog-details__content">
                            <div class="blog-details__image">
                                <img :src="`${publicPath}storage/${blog.image}`" :alt="blog.title" />
                            </div><!-- /.blog-details__image -->
                            <ul class="list-unstyled blog-details__top-meta">
                                <li>
                                    Created By: {{ blog.created_by }}
                                </li>
                                <li><i class="icofont-ui-calendar"></i>{{ blog.created_dte }}</li>
                            </ul><!-- /.list-unstyled blog-details__top-meta -->
                            <h3 class="blog-details__title">{{ blog.title }}</h3>
                            <p class="blog-details__text">
                                {{ blog.content }}
                            </p><!-- /.blog-details__text -->
                        </div><!-- /.blog-details__content -->
                    </div><!-- /.col-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.blog-details -->
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
        blog: Object, // Singular because you're passing one blog
    },
    data() {
        return {
            publicPath: import.meta.env.VITE_APP_URL || '/',
        };
    },
};
</script>
