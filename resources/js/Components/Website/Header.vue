<template>
  <header class="main-header main-header--four sticky-header sticky-header--normal">
    <div class="container-fluid">
      <div class="main-header__inner">
        <div class="main-header__logo">

          <Link href="/">
          <img :src="`${publicPath}assets/images/logo-dark.png`" alt="Click on charity HTML" width="80" height="79">
          </Link>
        </div><!-- /.main-header__logo -->
        <nav class="main-header__nav main-menu">
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
        </nav><!-- /.main-header__nav -->
        <div class="main-header__right">
          <div class="mobile-nav__btn mobile-nav__toggler">
            <span></span>
            <span></span>
            <span></span>
          </div><!-- /.mobile-nav__toggler -->
          <Link href="/need-help" class="careox-btn"><span>Need Help?</span></Link>
          <a href="#" class="main-header--four__toggler">
            <div class="main-header--four__toggler__wrapper">
              <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
          </a>
        </div><!-- /.main-header__right -->
      </div><!-- /.main-header__inner -->
    </div><!-- /.container-fluid -->
  </header><!-- /.main-header -->
</template>

<script>
import { Link } from '@inertiajs/vue3';
import $ from 'jquery'; // Import jQuery

export default {
  name: 'Header',
  components: {
    Link,
  },
  data() {
    return {
      publicPath: import.meta.env.APP_URL || '/',
    };
  },
  mounted() {
    // jQuery code for handling click events
    if ($(".main-header--four__toggler, .sidebar-one__overlay, .sidebar-one__close").length) {
      $(".main-header--four__toggler, .sidebar-one__overlay, .sidebar-one__close").on("click", function (e) {
        e.preventDefault();
        $(".sidebar-one").toggleClass("active");
      });
    }
    if ($(".mobile-nav__toggler").length) {
      $(".mobile-nav__toggler").on("click", function (e) {
        e.preventDefault();
        $(".mobile-nav__wrapper").toggleClass("expanded");
      });
    }
  },
};
</script>

