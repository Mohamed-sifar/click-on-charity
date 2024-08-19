<template>
  <footer class="main-footer background-black">
    <div class="main-footer__bg background-black"
      style="background-image: url(assets/images/backgrounds/footer-bg-1-1.jpg);"></div>
    <!-- /.main-footer__bg -->
    <div class="container">
      <div class="main-footer__top">
        <div class="row">

        </div>
      </div>
    </div><!-- /.main-footer__top -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-xl-4 wow fadeInUp" data-wow-delay="100ms">
          <div class="footer-widget footer-widget--about">
            
            <Link href="/">
            <img :src="`${publicPath}assets/images/logo-light.png`" alt="Alefox HTML" width="142" height="141">
          </Link>
            <p class="footer-widget__text">
              We help communities thrive by offering personalized support and resources to those in need.
            </p>
            <div class="footer-widget__box">
              <div class="footer-widget__box__icon"><i class="icon-phone-call"></i></div>
              <p class="footer-widget__box__text">Hotline 24/7 <a href="tel:+0758999999">(075) 899 999</a></p>
            </div>
          </div><!-- /.footer-widget -->
        </div><!-- /.col-md-6 -->
        <div class="col-md-6 col-xl-2 wow fadeInUp" data-wow-delay="150ms">
          <div class="footer-widget footer-widget--links">
            <h2 class="footer-widget__title">Service</h2><!-- /.footer-widget__title -->
            <ul class="list-unstyled footer-widget__links">
              <li><Link href="/contact">Give Donation</Link></li>
              <li><Link href="/contact">Education Support</Link></li>
            </ul><!-- /.list-unstyled footer-widget__links -->
          </div><!-- /.footer-widget -->
        </div><!-- /.col-md-6 -->
        <div class="col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="200ms">
          <div class="footer-widget footer-widget--links-two">
            <h2 class="footer-widget__title">Quick Link</h2><!-- /.footer-widget__title -->
            <ul class="list-unstyled footer-widget__links">
              <li><Link href="/about">About Us</Link></li>
              <li><Link href="/blog">Our News</Link></li>
              <li><Link href="/contact">Contact Us</Link></li>
            </ul><!-- /.list-unstyled footer-widget__links -->
          </div><!-- /.footer-widget -->
        </div><!-- /.col-md-6 -->
        <div class="col-md-6 col-xl-3 wow fadeInUp" data-wow-delay="250ms">
          <div class="footer-widget footer-widget--contact">
            <h2 class="footer-widget__title">Contact Info</h2><!-- /.footer-widget__title -->
            <ul class="list-unstyled footer-widget__info">
              <li style="--accent-color: #ffa415;">
                <span class="footer-widget__info__icon"><i class="icofont-clock-time"></i></span>
                Open Hours of Government: Mon - Fri: 8.00 am. - 6.00 pm.
              </li>
              <li style="--accent-color: #ff5528;">
                <span class="footer-widget__info__icon"><i class="icofont-location-pin"></i></span>
                Bus Land Road, Eravur Batticaloa, Sri Lanka
              </li>
              <li style="--accent-color: #8139e7;">
                <span class="footer-widget__info__icon"><i class="icofont-email"></i></span>
                <a href="mailto:clickoncharity@gmail.com">clickoncharity@gmail.com</a>
              </li>
            </ul><!-- /.list-unstyled -->
            <div class="footer-widget__social">
              <a href="https://facebook.com" style="--accent-color: #ffa415;">
                <i class="fab fa-facebook-f" aria-hidden="true"></i>
                <span class="sr-only">Facebook</span>
              </a>
              <a href="https://twitter.com" style="--accent-color: #fc5528;">
                <i class="fab fa-twitter" aria-hidden="true"></i>
                <span class="sr-only">Twitter</span>
              </a>
              <a href="https://pinterest.com" style="--accent-color: #8139e7;">
                <i class="fab fa-pinterest-p" aria-hidden="true"></i>
                <span class="sr-only">Pinterest</span>
              </a>
              <a href="https://instagram.com" style="--accent-color: #44c895;">
                <i class="fab fa-instagram" aria-hidden="true"></i>
                <span class="sr-only">Instagram</span>
              </a>
            </div><!-- /.footer-widget__social -->
          </div><!-- /.footer-widget -->
        </div><!-- /.col-md-6 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
    <div class="main-footer__bottom wow fadeInUp" data-wow-delay="300ms">
      <div class="container">
        <div class="main-footer__bottom__inner">
          <p class="main-footer__copyright">
            &copy; Copyright <span class="dynamic-year"></span> by Click On charity.
          </p>
        </div><!-- /.main-footer__inner -->
      </div><!-- /.container -->
    </div><!-- /.main-footer__bottom -->
  </footer><!-- /.main-footer -->
</template>

<script>
import { Link } from '@inertiajs/vue3';

export default {
  name: 'Footer',
  components: {
    Link,
  },
  data() {
    return {
      publicPath: import.meta.env.APP_URL || '/' // Use environment variable or default to root
    };
  }
};
</script>