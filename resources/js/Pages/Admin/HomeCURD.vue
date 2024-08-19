<template>
  <admin-layout>
    <div class="card mb-5 mb-xl-10">
      <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <div class="card-title m-0">
          <h3 class="fw-bold m-0">Home Main Details</h3>
        </div>
      </div>

      <div id="kt_account_settings_profile_details" class="collapse show">
        <form @submit.prevent="submit">
          <div class="card-body border-top p-9">
            <div class="row mb-6">
              <label class="col-lg-2 col-form-label fw-semibold fs-6">Main Images</label>
              <div class="col-lg-4">
                <div class="image-input image-input-outline" data-kt-image-input="true"
                  :style="{ backgroundImage: `url(${form.mainImageUrl || 'svg/avatars/blank.svg'})` }">
                  <div class="image-input-wrapper w-125px h-125px"
                    :style="{ backgroundImage: `url(${form.mainImageUrl || 'svg/avatars/blank.svg'})` }"></div>

                  <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    title="Change avatar">
                    <i class="ki-duotone ki-pencil fs-6"></i>
                    <input type="file" ref="mainImage" @change="handleImageChange('mainImage', $event)" />
                  </label>
                  <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    @click="removeImage('mainImage')"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    title="Remove avatar">
                    <i class="ki-outline ki-cross fs-3"></i>
                  </span>
                </div>
              </div>

              <label class="col-lg-2 col-form-label fw-semibold fs-6">Secondary Images</label>
              <div class="col-lg-4">
                <div class="image-input image-input-outline" data-kt-image-input="true"
                  :style="{ backgroundImage: `url(${form.secondaryImageUrl || 'svg/avatars/blank.svg'})` }">
                  <div class="image-input-wrapper w-125px h-125px"
                    :style="{ backgroundImage: `url(${form.secondaryImageUrl || 'svg/avatars/blank.svg'})` }"></div>

                  <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    title="Change avatar">
                    <i class="ki-duotone ki-pencil fs-6"></i>
                    <input type="file" ref="secondaryImage" @change="handleImageChange('secondaryImage', $event)" />
                  </label>
                  <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    @click="removeImage('secondaryImage')"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    title="Remove avatar">
                    <i class="ki-outline ki-cross fs-3"></i>
                  </span>
                </div>
              </div>
            </div>

            <div class="row mb-6">
              <label class="col-lg-2 col-form-label required fw-semibold fs-6">Content title</label>
              <div class="col-lg-4 fv-row">
                <input type="text" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                  v-model="form.title" placeholder="Content title">
              </div>

              <label class="col-lg-2 col-form-label required fw-semibold fs-6">Main content</label>
              <div class="col-lg-4 fv-row">
                <textarea class="form-control form-control-lg form-control-solid" v-model="form.content"
                  placeholder="Main content"></textarea>
              </div>
            </div>
          </div>

          <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
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
  secondaryImageUrl: '',
  title: '',
  content: '',
  mainImageFile: null,
  secondaryImageFile: null,
});

const page = usePage();
onMounted(() => {
  const homeMain = page.props.homeMain;
  if (homeMain) {
    form.mainImageUrl = homeMain.home_main_image ? `/storage/images/${homeMain.home_main_image}` : '';
    form.secondaryImageUrl = homeMain.home_sec_image ? `/storage/images/${homeMain.home_sec_image}` : '';
    form.title = homeMain.home_main_title || '';
    form.content = homeMain.home_main_content || '';
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
      } else if (imageType === 'secondaryImage') {
        form.secondaryImageUrl = e.target.result;
        form.secondaryImageFile = file;
      }
    };
    reader.readAsDataURL(file);
  }
}

function removeImage(imageType) {
  if (imageType === 'mainImage') {
    form.mainImageUrl = '';
    form.mainImageFile = null;
  } else if (imageType === 'secondaryImage') {
    form.secondaryImageUrl = '';
    form.secondaryImageFile = null;
  }
}

function submit() {
  const formData = new FormData();
  formData.append('title', form.title);
  formData.append('content', form.content);
  if (form.mainImageFile) {
    formData.append('mainImage', form.mainImageFile);
  }
  if (form.secondaryImageFile) {
    formData.append('secondaryImage', form.secondaryImageFile);
  }

  // Use Inertia.js to handle form submission
  router.post('/admin/home-curd', formData, {
    onSuccess: (response) => {
      // Check if the response contains a success message
      if (response.props.message) {
        Swal.fire({
          icon: 'success',
          title: 'Saved',
          text: response.props.message,
        });
      }
    },
    onError: (errors) => {
      Swal.fire({
        icon: 'error',
        title: 'Error',
        text: 'There was an error saving the home main details.',
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
