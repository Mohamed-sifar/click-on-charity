<template>
  <div id="kt_aside" class="aside aside-extended " data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">

    <!--begin::Primary-->
    <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
      <!--begin::Logo-->
      <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto pt-10" id="kt_aside_logo">
        <Link href="/admin">
        <img alt="Logo" :src="`${publicPath}admin-assets/media/logos/logo-dark.png`" class="h-55px">
        </Link>
      </div>
      <!--end::Logo-->

      <!--begin::Nav-->
      <div class="aside-nav d-flex flex-column flex-lg-center flex-column-fluid w-100 py-5 px-3" id="kt_aside_nav">
        <!--begin::Aside Primary Menu Wrapper-->
        <div class="w-100 hover-scroll-overlay-y d-flex scroll-ms" id="kt_aside_menu_wrapper" data-kt-scroll="true"
          data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
          data-kt-scroll-wrappers="#kt_aside, #kt_aside_nav, #kt_aside_menu_wrapper" data-kt-scroll-offset="5px">
          <!--begin::Primary menu-->
          <div id="kt_aside_menu"
            class="menu menu-rounded menu-column menu-active-bg menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 fw-semibold fs-6 my-auto"
            data-kt-menu="true">
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
              class="menu-item here show py-2">
              <!--begin:Menu link--><span class="menu-link menu-center">
                <span class="menu-icon me-0">
                  <i class="ki-duotone ki-element-11 fs-2x">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                  </i>
                </span>
              </span><!--end:Menu link--><!--begin:Menu sub-->
              <div class="menu-sub menu-sub-indention menu-sub-dropdown w-225px px-2 py-4">
                <!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu content-->
                  <div class="menu-content ">
                    <span class="menu-section fs-5 fw-bold ps-1 py-1">Dashboards</span>
                  </div>
                  <!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link-->
                  <Link href="/admin" class="menu-link active">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Home</span>
                  </Link>
                </div>

               
                <!--end:Menu item--><!--begin:Menu item-->
              </div>
            </div><!--end:Menu item--><!--begin:Menu item-->

            <div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start"
              class="menu-item here show py-2">
              <!--begin:Menu link-->
              <span class="menu-link menu-center">
                <span class="menu-icon me-0">
                  <i class="ki-duotone ki-update-file fs-2x">
                  <span class="path1"></span>
                  <span class="path2"></span>
                  <span class="path3"></span>
                  <span class="path4"></span>
                </i>
                </span>
                
              </span><!--end:Menu link--><!--begin:Menu sub-->
              <div class="menu-sub menu-sub-indention menu-sub-dropdown w-225px px-2 py-4">
                <!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu content-->
                  <div class="menu-content ">
                    <span class="menu-section fs-5 fw-bold ps-1 py-1">Website Main pages</span>
                  </div>
                  <!--end:Menu content-->
                </div><!--end:Menu item--><!--begin:Menu item-->


                <!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link-->
                  <Link href="/admin/blog-curd" class="menu-link active">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">BlogCURD</span>
                  </Link>
                </div>
                <!--end:Menu item--><!--begin:Menu item-->
                <div class="menu-item"><!--begin:Menu link-->
                  <Link href="/admin/activity-curd" class="menu-link active">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">ActivityCURD</span>
                  </Link>
                </div>
                <div class="menu-item"><!--begin:Menu link-->
                  <Link href="/admin/home-curd" class="menu-link active">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">HomeCURD</span>
                  </Link>
                </div>
                <div class="menu-item"><!--begin:Menu link-->
                  <Link href="/admin/contact-curd" class="menu-link active">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">ContactCURD</span>
                  </Link>
                </div>
                <div class="menu-item"><!--begin:Menu link-->
                  <Link href="/admin/about-curd" class="menu-link active">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">AboutCURD</span>
                  </Link>
                </div>

                <div class="menu-item"><!--begin:Menu link-->
                  <Link href="/admin/needhelp-curd" class="menu-link active">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">NeedHelpCURD</span>
                  </Link>
                </div>
                <div class="menu-item"><!--begin:Menu link-->
                  <Link href="/admin/contact-us" class="menu-link active">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title">Contact Us</span>
                  </Link>
                </div>
                <!--end:Menu item--><!--begin:Menu item-->
              </div>
            </div><!--end:Menu item--><!--begin:Menu item-->

          </div>
          <!--end::Primary menu-->
        </div>
        <!--ebd::Aside Primary Menu Wrapper-->

      </div>
      <!--end::Nav-->

      <!--begin::Footer-->

      <!--end::Footer-->
    </div>
    <!--end::Primary-->

    <!--begin::Action-->
    <!--end::Action-->
  </div>
</template>

<script>
import { onMounted } from 'vue';
import { Link } from '@inertiajs/vue3';
export default {
  name: 'Sidebar',
  components: {
    Link,
  },
  data() {
    return {
      publicPath: import.meta.env.APP_URL || '/', // Use environment variable or default to root
    };
  },
  methods: {
    initializeToggle() {
      if (typeof KTToggle !== 'undefined') {
        KTToggle.createInstances();
      }
    },
    handleSidebarHover() {
      const sidebar = document.getElementById('kt_app_sidebar');
      const body = document.querySelector('body');
      const toggleButton = document.getElementById('kt_app_sidebar_toggle');

      if (!sidebar || !toggleButton) {
        console.error('Sidebar or toggle button not found');
        return;
      }

      sidebar.addEventListener('mouseenter', () => {
        if (body.getAttribute('data-kt-app-sidebar-minimize') === 'on') {
          KTToggle.getInstance(toggleButton).enable();
        }
      });

      sidebar.addEventListener('mouseleave', () => {
        if (body.getAttribute('data-kt-app-sidebar-minimize') === 'on') {
          KTToggle.getInstance(toggleButton).disable();
        }
      });
    },
  },
  mounted() {
    this.initializeToggle();
    this.handleSidebarHover();
  },
};
</script>