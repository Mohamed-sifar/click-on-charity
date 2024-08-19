<template>
    <div>
      <div
        id="kt_app_sidebar"
        class="app-sidebar flex-column"
        data-kt-drawer="true"
        data-kt-drawer-name="app-sidebar"
        data-kt-drawer-activate="{default: true, lg: false}"
        data-kt-drawer-overlay="true"
        data-kt-drawer-width="250px"
        data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
      >
        <!--begin::Main-->
        <div
          class="d-flex flex-column justify-content-between h-100 hover-scroll-overlay-y my-2 mx-5 d-flex flex-column"
          id="kt_app_sidebar_main"
          data-kt-scroll="true"
          data-kt-scroll-activate="true"
          data-kt-scroll-height="auto"
          data-kt-scroll-dependencies="#kt_app_header"
          data-kt-scroll-wrappers="#kt_app_main"
          data-kt-scroll-offset="5px"
        >
          <!--begin::Sidebar menu-->
          <div
            id="#kt_app_sidebar_menu"
            data-kt-menu="true"
            data-kt-menu-expand="false"
            class="flex-column-fluid menu menu-sub-indention menu-column menu-rounded menu-active-bg mb-7"
          >
            <!--begin:Menu item-->
            <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
              <!--begin:Menu link-->
              <span class="menu-link"
                ><span class="menu-icon"
                  ><i class="ki-duotone ki-element-11 fs-1"
                    ><span class="path1"></span><span class="path2"></span><span class="path3"></span
                    ><span class="path4"></span></i
                  ></span
                ><span class="menu-title">Dashboards</span>
                <span class="menu-arrow"></span></span
              >
              <!--end:Menu link-->
              <!--begin:Menu sub-->
              <div class="menu-sub menu-sub-accordion">
                <!--begin:Menu item-->
                <div class="menu-item">
                  <!--begin:Menu link-->
                  <a class="menu-link active" href="index.html">
                    <span class="menu-bullet">
                      <span class="bullet bullet-dot"></span>
                    </span>
                    <span class="menu-title">Default</span>
                  </a>
                  <!--end:Menu link-->
                </div>
                <!--end:Menu item-->
  
                <!--end:Menu item-->
              </div>
              <!--end:Menu sub-->
            </div>
            <!--end:Menu item-->
            <!--begin:Menu item-->
          </div>
          <!--end::Sidebar menu-->
          <!--begin::Footer-->
  
          <!--end::Footer-->
        </div>
        <!--end::Main-->
      </div>
  
      <!-- Sidebar toggle button -->
      <div
        id="kt_app_sidebar_toggle"
        class="app-sidebar-toggle btn btn-sm btn-icon btn-color-warning me-n2 d-none d-lg-flex"
        data-kt-toggle="true"
        data-kt-toggle-state="active"
        data-kt-toggle-target="body"
        data-kt-toggle-name="app-sidebar-minimize"
      >
        <i class="ki-duotone ki-exit-left fs-2x rotate-180"><span class="path1"></span><span class="path2"></span></i>
      </div>
    </div>
  </template>
  
  <script>
  import { onMounted } from 'vue';
  
  export default {
    name: 'Sidebar',
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
  
  