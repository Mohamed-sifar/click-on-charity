<template>
  <admin-layout>
    <div class="card mb-5 mb-xl-10">
      <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <div class="card-title m-0">
          <h3 class="fw-bold m-0">Contact Main Details</h3>
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

              <label class="col-lg-2 col-form-label fw-semibold fs-6">Third Images</label>
              <div class="col-lg-4">
                <div class="image-input image-input-outline" data-kt-image-input="true"
                  :style="{ backgroundImage: `url(${form.thirdImageUrl || 'svg/avatars/blank.svg'})` }">
                  <div class="image-input-wrapper w-125px h-125px"
                    :style="{ backgroundImage: `url(${form.thirdImageUrl || 'svg/avatars/blank.svg'})` }"></div>

                  <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    title="Change avatar">
                    <i class="ki-duotone ki-pencil fs-6"></i>
                    <input type="file" ref="thirdImage" @change="handleImageChange('thirdImage', $event)" />
                  </label>
                  <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    @click="removeImage('thirdImage')"
                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    title="Remove avatar">
                    <i class="ki-outline ki-cross fs-3"></i>
                  </span>
                </div>
              </div>

              <label class="col-lg-2 col-form-label fw-semibold fs-6">Fourth Images</label>
              <div class="col-lg-4">
                <div class="image-input image-input-outline" data-kt-image-input="true"
                  :style="{ backgroundImage: `url(${form.fourthImageUrl || 'svg/avatars/blank.svg'})` }">
                  <div class="image-input-wrapper w-125px h-125px"
                    :style="{ backgroundImage: `url(${form.fourthImageUrl || 'svg/avatars/blank.svg'})` }"></div>

                  <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                    title="Change avatar">
                    <i class="ki-duotone ki-pencil fs-6"></i>
                    <input type="file" ref="fourthImage" @change="handleImageChange('fourthImage', $event)" />
                  </label>
                  <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                    @click="removeImage('fourthImage')"
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
  thirdImageUrl: '',
  fourthImageUrl: '',
  title: '',
  content: '',
  mainImageFile: null,
  secondaryImageFile: null,
  thirdImageFile: null,
  fourthImageFile: null,
});

const page = usePage();
onMounted(() => {
  const contactMain = page.props.contactMain;
  if (contactMain) {
    form.mainImageUrl = contactMain.contact_image_1 ? `/storage/images3/${contactMain.contact_image_1}` : '';
    form.secondaryImageUrl = contactMain.contact_image_2 ? `/storage/images3/${contactMain.contact_image_2}` : '';
    form.thirdImageUrl = contactMain.contact_image_3 ? `/storage/images3/${contactMain.contact_image_3}` : '';
    form.fourthImageUrl = contactMain.contact_image_4 ? `/storage/images3/${contactMain.contact_image_4}` : '';
    form.title = contactMain.contact_title || '';
    form.content = contactMain.contact_main_content || '';
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
      else if (imageType === 'thirdImage') {
        form.thirdImageUrl = e.target.result;
        form.thirdImageFile = file;
      }else if (imageType === 'fourthImage') {
        form.fourthImageUrl = e.target.result;
        form.fourthImageFile = file;
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
  }else if (imageType === 'thirdImage') {
    form.thirdImageUrl = '';
    form.thirdImageFile = null;
  }else if (imageType === 'fourthImage') {
    form.fourthImageUrl = '';
    form.fourthImageFile = null;
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
  if (form.thirdImageFile) {
    formData.append('thirdImage', form.thirdImageFile);
  }
  if (form.fourthImageFile) {
    formData.append('fourthImage', form.fourthImageFile);
  }

  // Use Inertia.js to handle form submission
  router.post('/admin/contact-curd', formData, {
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
        text: 'There was an error saving the contact main details.',
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
