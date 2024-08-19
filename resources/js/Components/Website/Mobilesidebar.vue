<template>
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <Link href="/" aria-label="logo image"><img :src="`${publicPath}assets/images/logo-light.png`" width="155" alt=""></Link>
                
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container">
                <ul class="main-menu__list">

                    <li>
                        <Link href="/">Home</Link>
                    </li>

                    <li>
                        <Link href="/about">About</Link>
                    </li>
                    <li>
                        <Link href="/contact">Contact</Link>
                    </li>
                    <li>
                        <Link href="/activity">Activity</Link>
                    </li>
                    <li>
                        <Link href="/blog">Blogs</Link>
                    </li>

                </ul>
            </div>
            <!-- /.mobile-nav__container -->



            <ul class="mobile-nav__contact list-unstyled">

                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:clickoncharity@gmail.com">clickoncharity@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:075-899-9999">075 899 0000</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__social">
                <a href="https://facebook.com" style="--accent-color: #ffa415;">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://twitter.com" style="--accent-color: #fc5528;">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>

                <a href="https://instagram.com" style="--accent-color: #44c895;">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a>
            </div><!-- /.mobile-nav__social -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <!-- /.search-popup -->
    <!-- Sidebar One Start -->
    <aside class="sidebar-one">
        <div class="sidebar-one__overlay"></div><!-- /.siderbar-ovarlay -->
        <div class="sidebar-one__content">
            <div class="sidebar-one__close"><i class="icofont-close-line"></i></div><!-- /.siderbar-close -->
            <div class="sidebar-one__logo">
                <Link href="/" aria-label="logo image"><img :src="`${publicPath}assets/images/logo-light.png`" alt="Careox HTML" width="223"></Link>
                
            </div><!-- /.sidebar-one__logo-box -->
            <p class="sidebar-one__text">
                We help communities thrive by offering personalized support and resources to those in need.
            </p>
            <h4 class="sidebar-one__title">Contact Info:</h4>
            <ul class="sidebar-one__info">
                <li>
                    <span class="fas fa-map-marker-alt"></span>
                    Bus Land Road, Eravur Batticaloa, Sri Lanka
                </li>
                <li>
                    <span class="fas fa-envelope"></span>
                    <a href="mailto:clickoncharity@gmail.com">clickoncharity@gmail.com</a>
                </li>
                <li>
                    <span class="fas fa-phone-alt"></span>
                    <a href="tel:+0999999999">+0(999) 999 999</a>
                </li>
            </ul>
            <div class="sidebar-one__social">
                <a href="https://facebook.com" style="--accent-color: #ffa415;">
                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                    <span class="sr-only">Facebook</span>
                </a>
                <a href="https://twitter.com" style="--accent-color: #fc5528;">
                    <i class="fab fa-twitter" aria-hidden="true"></i>
                    <span class="sr-only">Twitter</span>
                </a>

                <a href="https://instagram.com" style="--accent-color: #44c895;">
                    <i class="fab fa-instagram" aria-hidden="true"></i>
                    <span class="sr-only">Instagram</span>
                </a>
            </div><!-- /sidebar-one__socila -->

        </div><!-- /.sidebar__content -->
    </aside>
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
    name: 'Mobilesidebar',
    components: {
        Link
    },
    data() {
        return {
            publicPath: import.meta.env.APP_URL || '/' // Use environment variable or default to root
        };
    }
};
</script>