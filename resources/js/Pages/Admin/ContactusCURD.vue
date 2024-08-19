<template>
  <admin-layout>
    <div class="container-xxl" id="kt_content_container">
      <div class="row g-5 gx-xxl-8 mb-xxl-3">
        <div class="col-xxl-12">
          <div class="card">
            <div class="card-header border-0 pt-6">
              <h3 class="fw-bold m-0">Contact Us Details</h3>
              <div class="card-toolbar">
                <!-- Add Blog Modal -->
                <!-- Edit Blog Modal -->
              </div>
            </div>
            <div class="card-body py-4">
              <table id="kt_datatable_dom_positioning"
                class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                <thead>
                  <tr class="fw-bold fs-6 text-gray-800 px-7">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="contactus in contactus" :key="contactus.contact_us_id">
                    <td>{{ contactus.con_name }}</td>
                    <td>{{ contactus.con_email }}</td>
                    <td>{{ contactus.con_phone }}</td>
                    <td>{{ contactus.con_subject }}</td>
                    <td>{{ contactus.con_message }}</td>
                    <td>
                      <button class="btn btn-sm btn-danger" @click="confirmDelete(contactus.contact_us_id)">Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Document Viewer Modal -->
    <!-- Edit Request Modal -->
  </admin-layout>
</template>

<script>
import { ref, onMounted } from 'vue';
import AdminLayout from '../../Layouts/AdminLayout.vue';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/vue3';

export default {
  name: 'ContactUs',
  components: {
    AdminLayout,
  },
  props: {
    contactus: Array,
  },
  setup() {
    const publicPath = import.meta.env.VITE_APP_URL || '/';
    
    const confirmDelete = (id) => {
      Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          router.delete(`/admin/contact-us/${id}`)
            .then(() => {
              Swal.fire('Deleted!', 'The record has been deleted.', 'success');
              // Optionally refresh or reload the page/data
            })
            .catch(() => {
              Swal.fire('Error!', 'There was an error deleting the record.', 'error');
            });
        }
      });
    };
    
    onMounted(() => {
      $("#kt_datatable_dom_positioning").DataTable({
        language: {
          lengthMenu: "Show _MENU_",
        },
        dom:
          "<'row mb-2'" +
          "<'col-sm-6 d-flex align-items-center justify-content-start'l>" +
          "<'col-sm-6 d-flex align-items-center justify-content-end'f>" +
          ">" +
          "<'table-responsive'tr>" +
          "<'row'" +
          "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
          "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
          ">"
      });
    });

    return {
      confirmDelete,
    };
  },
};
</script>
