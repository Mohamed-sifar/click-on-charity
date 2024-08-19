<template>
  <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
        style="display:none;visibility:hidden"></iframe></noscript>
    <!--End::Google Tag Manager (noscript) -->

    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
      <!--begin::Page-->
      <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <Sidebar />
        <!--end::Aside-->

        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
          <!--begin::Header-->
          <Header />
          <!--end::Header-->

          <!--begin::Content-->
          <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Container-->
            <div class="container-xxl flex-grow-1" id="kt_content_container">
              <!--begin::Row-->
              <main>
                <slot></slot>
              </main>
              <!--End::Row-->
            </div>
            <!--end::Container-->
          </div>
          <!--end::Content-->

          <!--begin::Footer-->
          <Footer />
          <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Page-->
    </div>
    <!--end::Root-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
      <i class="ki-duotone ki-arrow-up"><span class="path1"></span><span class="path2"></span></i>
    </div>
    <!--end::Scrolltop-->
  </body>
</template>

<script>
import { ref, onMounted } from 'vue';
import Header from '../Components/Admin/Header.vue';
import Footer from '../Components/Admin/Footer.vue';
import Sidebar from '../Components/Admin/Sidebar.vue';
import { Link } from '@inertiajs/vue3';

export default {
  components: {
    Header,
    Footer,
    Sidebar,
    Link,
  },
  name: 'AdminLayout',
  setup() {
    onMounted(() => {
      // Ensure script is loaded and initialized
      if (typeof KTThemeMode !== 'undefined') {
        KTThemeMode.init();
      } else {
        console.error('KTThemeMode script not loaded');
      }

      initializeDrawer();
      initializeMenu();
      initializeToggle();
      initializeState();
    });

    const initializeDrawer = () => {
      // Initialize the drawer component (assuming jQuery and Bootstrap are loaded)
      if (window.KTDrawer) {
        KTDrawer.init();
      }
    };

    const initializeMenu = () => {
      // Initialize the menu component (assuming jQuery and Bootstrap are loaded)
      if (window.KTMenu) {
        KTMenu.init();
      }
    };

    const initializeToggle = () => {
      // Initialize the toggle component (assuming jQuery and Bootstrap are loaded)
      if (window.KTToggle) {
        KTToggle.init();
      }
    };

    const initializeState = () => {
      // Initialize the toggle component (assuming jQuery and Bootstrap are loaded)
      if (window.KTState) {
        KTState.init();
      }
    };

    return {};
  }
};
</script>

<style scoped>
/* Admin layout styles */
html, body {
  height: 100%;
  margin: 0;
}

#kt_wrapper {
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

#kt_content {
  flex-grow: 1;
}

.container-xxl {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}
</style>
