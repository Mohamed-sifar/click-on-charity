<template>
    <div class="topbar-two">
        <div class="container">
            <div class="topbar-two__inner">
                <ul class="topbar-two__info">
                    <li>
                        <span class="topbar-two__info__icon"><i class="icofont-envelope"></i></span>
                        <a href="mailto:clickoncharity@gmail.com">clickoncharity@gmail.com</a>
                    </li>
                    <li>
                        <span class="topbar-two__info__icon"><i class="icofont-location-pin"></i></span>
                        <a href="https://www.google.com/maps">Bus Land Road, Eravur Batticaloa, Sri Lanka</a>
                    </li>
                </ul><!-- /.topbar-two__info -->
                <ul class="list-unstyled topbar-two__nav">
                    <li><Link href="/contact">Donate</Link></li>
                </ul><!-- /.topbar-two__nav -->
            </div><!-- /.topbar-two__inner -->
        </div><!-- /.container -->
    </div><!-- /.topbar-two -->



</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Topbar',
    components: {Link},
    data() {
        return {
            publicPath: import.meta.env.APP_URL || '/' // Use environment variable or default to root
        };
    }
};
</script>