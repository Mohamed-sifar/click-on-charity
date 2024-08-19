<template>
  <div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Sign-in -->
    <div
      class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
      style="background-image: url(admin-assets/media/illustrations/sigma-1/14.png)"
    >
      <!--begin::Content-->
      <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <!--begin::Logo-->
        <Link href="/" class="mb-12">
          <img
            alt="Logo"
            :src="`${publicPath}admin-assets/media/logos/logo-dark.png`"
            class="h-80px"
          />
        </Link>
        <!--end::Logo-->

        <!--begin::Wrapper-->
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
          <!--begin::Form-->
          <form
            @submit.prevent="submit"
            class="form w-100"
            novalidate="novalidate"
            id="kt_sign_in_form"
          >
            <!--begin::Heading-->
            <div class="text-center mb-10">
              <!--begin::Title-->
              <h1 class="text-dark mb-3">
                Sign In to Admin
              </h1>
              <!--end::Title-->

              <!--begin::Link-->
              <div class="text-gray-400 fw-semibold fs-4">
                New Here?
                <Link href="/register" class="link-primary fw-bold"
                  >Create an Account</Link
                >
              </div>
              <!--end::Link-->
            </div>
            <!--end::Heading-->

            <!--begin::Input group-->
            <div class="fv-row mb-10">
              <!--begin::Label-->
              <label class="form-label fs-6 fw-bold text-dark">Email</label>
              <!--end::Label-->

              <!--begin::Input-->
              <input
                v-model="form.email"
                class="form-control form-control-lg form-control-solid"
                type="email"
                name="email"
                autocomplete="off"
                :class="{'is-invalid': formErrors.email}"
              />
              <!--end::Input-->
              <div v-if="formErrors.email" class="text-danger">
                {{ formErrors.email }}
              </div>
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="fv-row mb-10">
              <!--begin::Wrapper-->
              <div class="d-flex flex-stack mb-2">
                <!--begin::Label-->
                <label class="form-label fw-bold text-dark fs-6 mb-0">
                  Password
                </label>
                <!--end::Label-->
              </div>
              <!--end::Wrapper-->

              <!--begin::Input-->
              <input
                v-model="form.password"
                class="form-control form-control-lg form-control-solid"
                type="password"
                name="password"
                autocomplete="off"
                :class="{'is-invalid': formErrors.password}"
              />
              <!--end::Input-->
              <div v-if="formErrors.password" class="text-danger">
                {{ formErrors.password }}
              </div>
            </div>
            <!--end::Input group-->

            <!--begin::Actions-->
            <div class="text-center">
              <!--begin::Submit button-->
              <button
                type="submit"
                id="kt_sign_in_submit"
                class="btn btn-lg btn-primary w-100 mb-5"
              >
                <span class="indicator-label">
                  Continue
                </span>
                <span class="indicator-progress" v-if="loading">
                  Please wait...
                  <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </span>
              </button>
              <!--end::Submit button-->
            </div>
            <!--end::Actions-->
          </form>
          <!--end::Form-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--end::Content-->

      <!--begin::Footer-->
      <div class="d-flex flex-center flex-column-auto p-10">
        <!--begin::Links-->
        <!--end::Links-->
      </div>
      <!--end::Footer-->
    </div>
    <!--end::Authentication - Sign-in-->
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import Swal from 'sweetalert2';

const publicPath = import.meta.env.VITE_APP_URL || '/';

// Using useForm from Inertia to handle form submission
const form = useForm({
  email: '',
  password: '',
});

const formErrors = reactive({
  email: '',
  password: '',
});

const loading = ref(false); // Add loading state for better UX

async function submit() {
  loading.value = true; // Start loading indicator

  // Reset errors
  for (const key in formErrors) {
    formErrors[key] = '';
  }

  // Submit form using Inertia
  form.post('/login', {
    onSuccess: () => {
      loading.value = false; // Stop loading indicator

      Swal.fire({
        icon: 'success',
        title: 'Login Successful',
        text: 'You are now logged in!',
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect to the dashboard after the alert is confirmed
          form.reset();
          form.clearErrors();
        }
      });
    },
    onError: (errors) => {
      loading.value = false; // Stop loading indicator
      for (const key in errors) {
        formErrors[key] = errors[key][0];
      }

      // Display a SweetAlert message for invalid credentials
      if (
        errors.email &&
        errors.email[0] === 'The provided credentials are incorrect.'
      ) {
        Swal.fire({
          icon: 'error',
          title: 'Invalid Credentials',
          text: 'Email or password not valid. Please check and try again.',
        });
      }
    },
    onFinish: () => {
      loading.value = false; // Ensure loading indicator stops
    },
  });
}
</script>
