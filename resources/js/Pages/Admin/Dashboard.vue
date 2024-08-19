<template>
  <admin-layout>
    <div class="row g-5 gx-xxl-8 mb-xxl-3">
      <!--begin::Col-->
      <div class="col-xxl-12">
        <!--begin::Engage Widget 1-->
        <div class="card card-xxl-stretch">
          <!--begin::Card body-->

          <div class="card-body d-flex flex-column justify-content-between h-100">
            <!--begin::Section-->
            <div class="pt-12">
              <!--begin::Title-->
              <h3 class="text-dark text-center fs-1 fw-bolder line-height-lg">
                Click on charity <br>
                Application
              </h3>
              <!--end::Title-->

              <!--begin::Text-->
              <div class="text-center text-gray-600 fs-5 fw-semibold pt-4">
                HI welcome to the app
              </div>
              <!--end::Text-->

              <!--begin::Action-->
              
              <!--end::Action-->
            </div>
            <!--end::Section-->

            <!--begin::Image-->
            <div
              class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom card-rounded-bottom h-150px"
              style="background-image:url('admin-assets/media/illustrations/sigma-1/1.png')">
            </div>
            <!--end::Image-->
          </div>
          <!--end::Card body-->
        </div>
        <!--end::Engage Widget 1-->
      </div>
      <!--end::Col-->

      <!--begin::Col-->

      <!--end::Col-->
    </div>

  </admin-layout>
</template>

<script>
import AdminLayout from '../../Layouts/AdminLayout.vue';

export default {
  name: 'Dashboard',
  components: {
    AdminLayout,
  },
  data() {
    return {
      publicPath: import.meta.env.VITE_APP_URL || '/', // Use environment variable or default to root

    };
  },
}
</script>
