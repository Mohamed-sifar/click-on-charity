<template>
  <div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(admin-assets/media/illustrations/sigma-1/14.png)">
      <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <a href="/" class="mb-12">
          <img alt="Logo" :src="`${publicPath}admin-assets/media/logos/logo-default.svg`" class="h-60px">
        </a>
        <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
          <form @submit.prevent="submit" class="form w-100" novalidate="novalidate" id="kt_sign_up_form">
            <div v-if="errors.length" class="mb-3">
              <div v-for="(error, index) in errors" :key="index" class="alert alert-danger">
                {{ error }}
              </div>
            </div>
            <div class="mb-10 text-center">
              <h1 class="text-dark mb-3">Create an Account</h1>
              <div class="text-gray-400 fw-semibold fs-4">
                Already have an account?
                <Link href="/login" class="link-primary fw-bold">Sign in here</Link>
              </div>
            </div>
            <div class="row fv-row mb-7">
              <div class="col-xl-12">
                <label class="form-label fw-bold text-dark fs-6">Name</label>
                <input v-model="form.name" class="form-control form-control-lg form-control-solid" type="text" placeholder="" name="name" autocomplete="off">
                <div v-if="formErrors.name" class="text-danger">{{ formErrors.name }}</div>
              </div>
            </div>
            <div class="fv-row mb-7">
              <label class="form-label fw-bold text-dark fs-6">Email</label>
              <input v-model="form.email" class="form-control form-control-lg form-control-solid" type="email" placeholder="" name="email" autocomplete="off">
              <div v-if="formErrors.email" class="text-danger">{{ formErrors.email }}</div>
            </div>
            <div class="mb-10 fv-row" data-kt-password-meter="true">
              <div class="mb-1">
                <label class="form-label fw-bold text-dark fs-6">Password</label>
                <div class="position-relative mb-3">
                  <input v-model="form.password" class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" autocomplete="off">
                  <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                    <i class="ki-duotone ki-eye-slash fs-2"></i>
                    <i class="ki-duotone ki-eye fs-2 d-none"></i>
                  </span>
                </div>
                <div v-if="formErrors.password" class="text-danger">{{ formErrors.password }}</div>
              </div>
            </div>
            <div class="fv-row mb-5">
              <label class="form-label fw-bold text-dark fs-6">Confirm Password</label>
              <input v-model="form.password_confirmation" class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm-password" autocomplete="off">
              <div v-if="formErrors.password_confirmation" class="text-danger">{{ formErrors.password_confirmation }}</div>
            </div>
            <div class="text-center">
              <button type="submit" id="kt_sign_up_submit" class="btn btn-lg btn-primary">
                <span class="indicator-label">Submit</span>
                <span class="indicator-progress">Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { router, Link } from '@inertiajs/vue3'
import Swal from 'sweetalert2'
const publicPath = import.meta.env.VITE_APP_URL || '/';

const form = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
})

const formErrors = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: ''
})

const errors = ref([])

async function submit() {
  // Reset errors
  for (const key in formErrors) {
    formErrors[key] = ''
  }
  errors.value = []

  // Basic client-side validation
  if (!form.name) formErrors.name = 'Name is required'
  if (!form.email) formErrors.email = 'Email is required'
  if (!form.password) formErrors.password = 'Password is required'
  if (!form.password_confirmation) formErrors.password_confirmation = 'Confirm Password is required'
  if (form.password !== form.password_confirmation) formErrors.password_confirmation = 'Passwords do not match'

  // If there are errors, return early
  if (Object.values(formErrors).some(error => error)) return

  try {
    await router.post('/register', form)
    Swal.fire({
      icon: 'success',
      title: 'Registration Successful',
      text: 'Your account has been created successfully!'
    })
    // Clear the form fields
    form.name = ''
    form.email = ''
    form.password = ''
    form.password_confirmation = ''
  } catch (error) {
    if (error.response && error.response.status === 422) {
      errors.value = []
      const validationErrors = error.response.data.errors
      for (const key in validationErrors) {
        formErrors[key] = validationErrors[key][0]
      }
    } else {
      errors.value = ['User already created.'] // Add this line to catch custom error messages
      Swal.fire({
        icon: 'error',
        title: 'Registration Failed',
        text: 'There was an error creating your account. Please try again.'
      })
    }
  }
}
</script>
