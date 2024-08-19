<template>
  <admin-layout>
    <div class="card mb-5 mb-xl-10">
      <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <div class="card-title m-0">
          <h3 class="fw-bold m-0">Profile</h3>
        </div>
      </div>

      <div id="kt_account_settings_profile_details" class="collapse show">
        <form @submit.prevent="submit">
          <div class="card-body border-top p-9">
            <div class="row mb-6">
              <label class="col-lg-2 col-form-label fw-semibold fs-6">Profile Images</label>
              <div class="col-lg-4">
                <div class="image-input image-input-outline" data-kt-image-input="true"
                  :style="{ backgroundImage: `url(${form.mainImageUrl || 'svg/avatars/blank.svg'})` }">
                  <div class="image-input-wrapper w-125px h-125px"
                    :style="{ backgroundImage: `url(${form.mainImageUrl || 'svg/avatars/blank.svg'})` }"></div>

                  <label
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    title="Change avatar">
                    <i class="ki-duotone ki-pencil fs-6"></i>
                    <input type="file" ref="mainImage" @change="handleImageChange('mainImage', $event)" />
                  </label>
                  <span
                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    @click="removeImage('mainImage')" data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                    data-bs-dismiss="click" title="Remove avatar">
                    <i class="ki-outline ki-cross fs-3"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-lg-2 col-form-label required fw-semibold fs-6">Name</label>
              <div class="col-lg-4 fv-row">
                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                  v-model="form.name" placeholder="User name">
              </div>
              <label class="col-lg-2 col-form-label required fw-semibold fs-6">Email</label>
              <div class="col-lg-4 fv-row">
                <input type="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                  v-model="form.email" placeholder="User email">
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-lg-2 col-form-label fw-semibold fs-6">Password</label>
              <div class="col-lg-4 fv-row">
                <input type="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                  v-model="form.password" placeholder="New password">
              </div>
              <label class="col-lg-2 col-form-label fw-semibold fs-6">Confirm Password</label>
              <div class="col-lg-4 fv-row">
                <input type="password" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                  v-model="form.password_confirmation" placeholder="Confirm new password">
              </div>
            </div>
          </div>

          <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </admin-layout>
</template>

<script setup>
import { reactive, onMounted } from 'vue';
import { router, usePage } from '@inertiajs/vue3';
import Swal from 'sweetalert2';
import AdminLayout from '../../Layouts/AdminLayout.vue';

const form = reactive({
  mainImageUrl: '',
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  mainImageFile: null,
});

const page = usePage();
onMounted(() => {
  const myProfile = page.props.myProfile;
  if (myProfile) {
    form.mainImageUrl = myProfile.profile_image ? `/storage/profile_images/${myProfile.profile_image}` : '';
    form.name = myProfile.name || '';
    form.email = myProfile.email || '';
  }
});

function handleImageChange(imageType, event) {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      if (imageType === 'mainImage') {
        form.mainImageUrl = e.target.result;
        form.mainImageFile = file;
      }
    };
    reader.readAsDataURL(file);
  }
}

function removeImage(imageType) {
  if (imageType === 'mainImage') {
    form.mainImageUrl = '';
    form.mainImageFile = null;
  }
}

function submit() {
  const formData = new FormData();
  formData.append('name', form.name);
  formData.append('email', form.email);
  if (form.password) {
    formData.append('password', form.password);
    formData.append('password_confirmation', form.password_confirmation);
  }
  if (form.mainImageFile) {
    formData.append('profile_image', form.mainImageFile);
  }

  // Log the form data
  console.log('Submitting form data:', {
    name: form.name,
    email: form.email,
    password: form.password,
    password_confirmation: form.password_confirmation,
    profile_image: form.mainImageFile ? form.mainImageFile.name : 'No file'
  });

  // Use Inertia.js to handle form submission
  router.post('/admin/my-profile', formData, {
    onSuccess: (response) => {
      // Log the response data
      console.log('Success response:', response);

      Swal.fire({
        icon: 'success',
        title: 'Saved',
        text: 'Profile updated successfully.',
      });

      // Update local form state with the latest data
      const updatedProfile = response.props.myProfile;
      form.mainImageUrl = updatedProfile.profile_image ? `/storage/profile_images/${updatedProfile.profile_image}` : '';
      form.name = updatedProfile.name;
      form.email = updatedProfile.email;
      form.password = '';
      form.password_confirmation = ''; // Clear password fields after successful update
    },
    onError: (errors) => {
      console.log('Error response:', errors); // Log errors if any

      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'There was an error updating the profile.',
      });
    },
  });
}
</script>

<style scoped>
.image-input-wrapper {
  background-size: cover;
  background-position: center;
}
</style>
