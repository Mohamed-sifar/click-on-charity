<template>
  <admin-layout>
    <div class="container-xxl" id="kt_content_container">
      <div class="row g-5 gx-xxl-8 mb-xxl-3">
        <div class="col-xxl-12">
          <div class="card">
            <div class="card-header border-0 pt-6">
              <h3 class="fw-bold m-0">Blog Main Details</h3>
              <div class="card-toolbar">
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_add_user">
                    <i class="ki-duotone ki-plus fs-2"></i> Add Blog
                  </button>
                </div>

                <!-- Add Blog Modal -->
                <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                      <div class="modal-header" id="kt_modal_add_user_header">
                        <h2 class="fw-bold">Add Blog</h2>
                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                          @click="closeModal('kt_modal_add_user')">
                          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                      </div>
                      <div class="modal-body px-5 my-7">
                        <form @submit.prevent="submitForm" id="kt_modal_add_user_form" class="form">
                          <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Blog image</label>
                              <div class="col-lg-4">
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                  :style="{ backgroundImage: `url(${form.mainImageUrl || 'svg/avatars/blank.svg'})` }">
                                  <div class="image-input-wrapper w-125px h-125px"
                                    :style="{ backgroundImage: `url(${form.mainImageUrl || 'svg/avatars/blank.svg'})` }">
                                  </div>

                                  <label
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-6"></i>
                                    <input type="file" ref="mainImage"
                                      @change="handleImageChange('mainImage', $event)" />
                                  </label>
                                  <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    @click="removeImage('mainImage')" data-kt-image-input-action="remove"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove avatar">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Full Title</label>
                              <input v-model="form.title" type="text" name="title"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full title">
                            </div>
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Blog content</label>
                              <textarea v-model="form.content" name="content"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Blog content"></textarea>
                            </div>
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Created By</label>
                              <input v-model="form.created_by" name="created_by"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Created By">
                            </div>
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Created Date</label>
                              <input type="date" v-model="form.created_dte" name="created_dte"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Created Date">
                            </div>
                          </div>
                          <div class="text-center pt-10">
                            <button type="button" class="btn btn-light me-3"
                              @click="closeModal('kt_modal_add_user')">Discard</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                              <span class="indicator-label">Submit</span>
                              <span class="indicator-progress">Please wait... <span
                                  class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Edit Blog Modal -->
                <div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered mw-650px">
                    <div class="modal-content">
                      <div class="modal-header" id="kt_modal_edit_user_header">
                        <h2 class="fw-bold">Edit Blog</h2>
                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                          @click="closeModal('kt_modal_edit_user')">
                          <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                        </div>
                      </div>
                      <div class="modal-body px-5 my-7">
                        <form @submit.prevent="updateForm" id="kt_modal_edit_user_form" class="form">
                          <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_edit_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_edit_user_header"
                            data-kt-scroll-wrappers="#kt_modal_edit_user_scroll" data-kt-scroll-offset="300px">
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Blog image</label>
                              <div class="col-lg-4">
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                  :style="{ backgroundImage: `url(${editForm.mainImageUrl || 'svg/avatars/blank.svg'})` }">
                                  <div class="image-input-wrapper w-125px h-125px"
                                    :style="{ backgroundImage: `url(${editForm.mainImageUrl || 'svg/avatars/blank.svg'})` }">
                                  </div>

                                  <label
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-6"></i>
                                    <input type="file" ref="mainImage"
                                      @change="handleImageChange('editMainImage', $event)" />
                                  </label>
                                  <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    @click="removeImage('editMainImage')" data-kt-image-input-action="remove"
                                    data-bs-toggle="tooltip" data-bs-dismiss="click" title="Remove avatar">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                  </span>
                                </div>
                              </div>
                            </div>
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Full Title</label>
                              <input v-model="editForm.title" type="text" name="title"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Full title">
                            </div>
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Blog content</label>
                              <textarea v-model="editForm.content" name="content"
                                class="form-control form-control-solid mb-3 mb-lg-0"
                                placeholder="Blog content"></textarea>
                            </div>
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Created By</label>
                              <input v-model="editForm.created_by" name="created_by"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Created By">
                            </div>
                            <div class="fv-row mb-7">
                              <label class="required fw-semibold fs-6 mb-2">Created Date</label>
                              <input v-model="editForm.created_dte" name="created_dte"
                                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Created Date">
                            </div>
                          </div>
                          <div class="text-center pt-10">
                            <button type="button" class="btn btn-light me-3"
                              @click="closeModal('kt_modal_edit_user')">Discard</button>
                            <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                              <span class="indicator-label">Update</span>
                              <span class="indicator-progress">Please wait... <span
                                  class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="card-body py-4">
              <table id="kt_datatable_dom_positioning"
                class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                  <tr class="fw-bold fs-6 text-gray-800 px-7">
                    <th>Title</th>
                    <th>Content</th>
                    <th class="min-w-150px">Date</th>
                    <th>Image</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="blog in blogs" :key="blog.blog_id">
                    <td>{{ blog.title }}</td>
                    <td>{{ blog.content }}</td>
                    <td>{{ blog.created_dte }}</td>
                    <td>
                      <img v-if="blog.image" :src="`${publicPath}storage/${blog.image}`" alt="Blog Image" width="100">
                    </td>
                    <td>
                      <button class="btn btn-sm btn-primary" @click="editBlog(blog)">Edit</button>
                      <button class="btn btn-sm btn-danger" @click="confirmDelete(blog.blog_id)">Delete</button>
                    </td>

                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </admin-layout>
</template>

<script>
import AdminLayout from '../../Layouts/AdminLayout.vue';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/vue3';
import { reactive } from 'vue';

export default {
  name: 'BlogCURD',
  components: {
    AdminLayout,
  },
  props: {
    blogs: Array,
  },
  data() {
    return {
      publicPath: import.meta.env.VITE_APP_URL || '/',
      form: reactive({
        mainImageUrl: '',
        mainImageFile: null,
        title: '',
        content: '',
        created_by: '',
        created_dte: ''
      }),
      editForm: reactive({
        id: null,
        mainImageUrl: '',
        mainImageFile: null,
        title: '',
        content: '',
        created_by: '',
        created_dte: ''
      })
    };
  },
  mounted() {
    this.$nextTick(() => {
      $("#kt_datatable_dom_positioning").DataTable({
        "language": {
          "lengthMenu": "Show _MENU_",
        },
        "dom":
          "<'row mb-2'" +
          "<'col-sm-6 d-flex align-items-center justify-conten-start'l>" +
          "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
          ">" +

          "<'table-responsive'tr>" +

          "<'row'" +
          "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
          "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
          ">"
      });
    });
  },
  methods: {
    handleImageChange(imageType, event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          if (imageType === 'mainImage') {
            this.form.mainImageUrl = e.target.result;
            this.form.mainImageFile = file;
          } else if (imageType === 'editMainImage') {
            this.editForm.mainImageUrl = e.target.result;
            this.editForm.mainImageFile = file;
          }
        };
        reader.readAsDataURL(file);
      }
    },

    removeImage(imageType) {
      if (imageType === 'mainImage') {
        this.form.mainImageUrl = '';
        this.form.mainImageFile = null;
      } else if (imageType === 'editMainImage') {
        this.editForm.mainImageUrl = '';
        this.editForm.mainImageFile = null;
      }
    },
    submitForm() {
      const formData = new FormData();
      formData.append('blog_file', this.form.mainImageFile);
      formData.append('title', this.form.title);
      formData.append('content', this.form.content);
      formData.append('created_by', this.form.created_by);
      formData.append('created_dte', this.form.created_dte);

      router.post('/admin/blogs', formData, {
        onSuccess: () => {
          this.resetForm();
          this.closeModal('kt_modal_add_user');
          Swal.fire({
            title: 'Success!',
            text: 'Blog added successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then(() => {
            window.location.reload();
          });
        },
        onError: (errors) => {
          let errorMessage = '';
          Object.values(errors).forEach((error) => {
            errorMessage += `${error}<br>`;
          });
          Swal.fire({
            title: 'Error!',
            html: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    },
    editBlog(blog) {
      this.editForm.id = blog.blog_id;
      this.editForm.title = blog.title;
      this.editForm.content = blog.content;
      this.editForm.created_by = blog.created_by;
      this.editForm.created_dte = blog.created_dte;
      this.editForm.mainImageUrl = `/storage/${blog.image}`;

      this.$nextTick(() => {
        $('#kt_modal_edit_user').modal('show');
      });
    },
    updateForm() {
      const formData = new FormData();

      // Append the image file only if it's selected
      if (this.editForm.mainImageFile) {
        formData.append('blog_file', this.editForm.mainImageFile);
      }

      formData.append('title', this.editForm.title);
      formData.append('content', this.editForm.content);
      formData.append('created_by', this.editForm.created_by);
      formData.append('created_dte', this.editForm.created_dte);
      formData.append('_method', 'PUT');

      router.post(`/admin/blogs/${this.editForm.id}`, formData, {
        onSuccess: () => {
          this.resetEditForm();
          this.closeModal('kt_modal_edit_user');
          Swal.fire({
            title: 'Success!',
            text: 'Blog updated successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then(() => {
            window.location.reload();
          });
        },
        onError: (errors) => {
          let errorMessage = '';
          Object.values(errors).forEach((error) => {
            errorMessage += `${error}<br>`;
          });
          Swal.fire({
            title: 'Error!',
            html: errorMessage,
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    },

    resetForm() {
      this.form.mainImageFile = null;
      this.form.title = '';
      this.form.content = '';
      this.form.created_by = '';
      this.form.created_dte = '';
    },
    resetEditForm() {
      this.editForm.id = null;
      this.editForm.mainImageFile = null;
      this.editForm.title = '';
      this.editForm.content = '';
      this.editForm.created_by = '';
      this.editForm.created_dte = '';
    },
    closeModal(modalId) {
      $(`#${modalId}`).modal('hide');
    },
    confirmDelete(blogId) {
      Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!'
      }).then((result) => {
        if (result.isConfirmed) {
          this.deleteBlog(blogId);
        }
      });
    },
    deleteBlog(blogId) {
      router.post(`/admin/blogs/${blogId}`, {
        onSuccess: () => {
          Swal.fire({
            title: 'Deleted!',
            text: 'Blog has been deleted.',
            icon: 'success',
            confirmButtonText: 'OK'
          }).then(() => {
            window.location.reload();
          });
        },
        onError: () => {
          Swal.fire({
            title: 'Error!',
            text: 'There was an issue deleting the blog.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
        }
      });
    }

  }
};

</script>
