<template>
  <admin-layout>
    <div class="container-xxl" id="kt_content_container">
      <div class="row g-5 gx-xxl-8 mb-xxl-3">
        <div class="col-xxl-12">
          <div class="card">
            <div class="card-header border-0 pt-6">
              <h3 class="fw-bold m-0">Help Needed Main Details</h3>
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
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>NIC</th>
                    <th>Help Type</th>
                    <th>Description</th>
                    <th>Urgency</th>
                    <th>Status</th>
                    <th>Documents</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="request in requests" :key="request.id">
                    <td>{{ request.full_name }}</td>
                    <td>{{ request.email }}</td>
                    <td>{{ request.nic }}</td>
                    <td>{{ request.help_type }}</td>
                    <td>{{ request.description }}</td>
                    <td>{{ request.urgency }}</td>
                    <td>{{ request.status }}</td>
                    <td>
                      <div v-if="request.supporting_documents.length">
                        <button class="btn btn-sm btn-info" @click="showDocuments(request.supporting_documents)">View
                          Documents</button>
                      </div>
                    </td>
                    <td>
                      <button class="btn btn-sm btn-primary" @click="openEditModal(request)">Edit</button>
                      
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
    <div v-if="showModal" class="modal fade show d-block" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" id="kt_modal_edit_user_header">
            <h2 class="fw-bold">View Document</h2>
            <div class="btn btn-icon btn-sm btn-active-icon-primary" @click="showModal = false">
              <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
            </div>
          </div>
          <div class="modal-body">
            <div v-if="isImage(documentsList[currentDocumentIndex])">
              <img :src="documentsList[currentDocumentIndex]" width="100%" alt="Document Image">
            </div>
            <iframe v-else :src="documentsList[currentDocumentIndex]" width="100%" height="500px"></iframe>
            <div class="d-flex justify-content-between mt-3">
              <button class="btn btn-secondary" @click="prevDocument"
                :disabled="currentDocumentIndex === 0">Previous</button>
              <button class="btn btn-secondary" @click="nextDocument"
                :disabled="currentDocumentIndex === documentsList.length - 1">Next</button>
            </div>
            <button class="btn btn-primary mt-3" @click="downloadDocuments">Download All</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Request Modal -->
    <div class="modal fade" id="kt_modal_edit_user" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
          <div class="modal-header" id="kt_modal_edit_user_header">
            <h2 class="fw-bold">Edit Request</h2>
            <div class="btn btn-icon btn-sm btn-active-icon-primary" @click="closeModal('kt_modal_edit_user')">
              <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
            </div>
          </div>
          <div class="modal-body px-5 my-7">
            <form @submit.prevent="updateRequest">
              <div class="mb-4">
                <label for="full_name" class="form-label">Full Name</label>
                <input v-model="currentRequest.full_name" type="text" id="full_name" class="form-control" required>
              </div>
              <div class="mb-4">
                <label for="email" class="form-label">Email</label>
                <input v-model="currentRequest.email" type="email" id="email" class="form-control" required>
              </div>
              <div class="mb-4">
                <label for="nic" class="form-label">NIC</label>
                <input v-model="currentRequest.nic" type="text" id="nic" class="form-control" required>
              </div>
              <div class="mb-4">
                <label for="help_type" class="form-label">Help Type</label>
                <select v-model="currentRequest.help_type" id="help_type" class="form-select" required>
                  <option value="financial_aid">Financial Aid</option>
                  <option value="medical_assistance">Medical Assistance</option>
                  <option value="food">Food</option>
                  <option value="shelter">Shelter</option>
                  <option value="education">Education</option>
                </select>
              </div>
              <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <textarea v-model="currentRequest.description" id="description" class="form-control"
                  required></textarea>
              </div>
              <div class="mb-4">
                <label for="urgency" class="form-label">Urgency</label>
                <select v-model="currentRequest.urgency" id="urgency" class="form-select" required>
                  <option value="immediate">Immediate</option>
                  <option value="week">In a Week</option>
                  <option value="month">In a Month</option>
                </select>
              </div>

              <div class="mb-4">
                <label for="email" class="form-label">Status</label>
                <input v-model="currentRequest.status" type="text" id="status" class="form-control" required>
              </div>


              <!-- Document Editing -->



              <button type="submit" class="btn btn-primary">Update Request</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </admin-layout>
</template>

<script>
import { ref } from 'vue';
import AdminLayout from '../../Layouts/AdminLayout.vue';
import Swal from 'sweetalert2';
import { router } from '@inertiajs/vue3';
import { PDFDocument } from 'pdf-lib';

export default {
  name: 'NeedHelpRequests',
  components: {
    AdminLayout,
  },
  props: {
    requests: Array,
  },
  setup(props) {
    const publicPath = import.meta.env.VITE_APP_URL || '/';
    const showModal = ref(false);
    const documentsList = ref([]);
    const currentDocumentIndex = ref(0);
    const currentRequest = ref({});

    const isImage = (url) => {
      return url.match(/\.(jpeg|jpg|png)$/) != null;
    };

    const getImageEmbedFunction = (url) => {
      if (url.endsWith('.png')) return 'embedPng';
      if (url.endsWith('.jpg') || url.endsWith('.jpeg')) return 'embedJpg';
      return null;
    };

    const showDocuments = (documents) => {
      if (documents.length > 0) {
        documentsList.value = documents.map(doc => `${publicPath}storage/${doc}`);
        currentDocumentIndex.value = 0;
        showModal.value = true;
      }
    };

    const nextDocument = () => {
      if (currentDocumentIndex.value < documentsList.value.length - 1) {
        currentDocumentIndex.value++;
      }
    };

    const prevDocument = () => {
      if (currentDocumentIndex.value > 0) {
        currentDocumentIndex.value--;
      }
    };

    const openEditModal = (request) => {
      currentRequest.value = { ...request };
      $('#kt_modal_edit_user').modal('show');
    };

    const closeModal = (modalId) => {
      $(`#${modalId}`).modal('hide');
    };


    const removeDocument = (index) => {
      currentRequest.value.supporting_documents.splice(index, 1);
    };


    const handleDocumentChange = (event) => {
      const files = Array.from(event.target.files);
      const totalDocuments = currentRequest.value.supporting_documents.length + files.length;

      if (totalDocuments > 3) {
        Swal.fire({
          icon: 'error',
          title: 'Limit Exceeded!',
          text: 'You can only upload up to 3 documents.',
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
        });
        return;
      }

      files.forEach(file => {
        const reader = new FileReader();
        reader.onload = (e) => {
          currentRequest.value.supporting_documents.push(e.target.result);
        };
        reader.readAsDataURL(file);
      });
    };


    const downloadDocuments = async () => {
      const pdfDoc = await PDFDocument.create();
      const A4Size = [595.276, 841.890]; // A4 size in points

      const documentPromises = documentsList.value.map(async (url) => {
        if (isImage(url)) {
          const embedFunction = getImageEmbedFunction(url);
          if (!embedFunction) return;

          try {
            const imgBytes = await fetch(url).then(res => res.arrayBuffer());
            const img = await pdfDoc[embedFunction](imgBytes);
            const { width, height } = img;

            // Calculate scaling to fit the image within A4 dimensions while preserving aspect ratio
            const scale = Math.min(A4Size[0] / width, A4Size[1] / height);
            const imgWidth = width * scale;
            const imgHeight = height * scale;

            const page = pdfDoc.addPage(A4Size);
            page.drawImage(img, {
              x: (A4Size[0] - imgWidth) / 2, // Center image horizontally
              y: (A4Size[1] - imgHeight) / 2, // Center image vertically
              width: imgWidth,
              height: imgHeight,
            });
          } catch (e) {
            console.error(`Error embedding image: ${url}`, e);
          }
        } else {
          try {
            const pdfBytes = await fetch(url).then(res => res.arrayBuffer());
            const pdf = await PDFDocument.load(pdfBytes);
            const copiedPages = await pdfDoc.copyPages(pdf, pdf.getPageIndices());
            copiedPages.forEach(page => pdfDoc.addPage(page));
          } catch (e) {
            console.error(`Error processing PDF: ${url}`, e);
          }
        }
      });

      await Promise.all(documentPromises);

      const pdfBytes = await pdfDoc.save();
      const blob = new Blob([pdfBytes], { type: 'application/pdf' });
      const link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = `${currentRequest.value.nic || 'combined'}_combined.pdf`;
      link.click();
    };

    const updateRequest = async () => {
      const formData = new FormData();

      formData.append('full_name', currentRequest.value.full_name);
      formData.append('email', currentRequest.value.email);
      formData.append('nic', currentRequest.value.nic);
      formData.append('help_type', currentRequest.value.help_type);
      formData.append('description', currentRequest.value.description);
      formData.append('urgency', currentRequest.value.urgency);
      formData.append('status', currentRequest.value.status);

      currentRequest.value.supporting_documents.forEach((document, index) => {
        if (typeof document !== 'string') {
          formData.append(`supporting_documents[${index}]`, document);
        }
      });

      try {
        await router.post(`/admin/needhelp-curd/${currentRequest.value.help_request_id}`, formData);
        Swal.fire({
          icon: 'success',
          title: 'Request Updated',
          text: 'The help request has been successfully updated.',
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
        });
        closeModal('kt_modal_edit_user');
      } catch (error) {
        console.error('Error updating request:', error);
        Swal.fire({
          icon: 'error',
          title: 'Update Failed',
          text: 'There was an error updating the request.',
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
        });
      }
    };

  
    return {
      showModal,
      documentsList,
      currentDocumentIndex,
      currentRequest,
      isImage,
      showDocuments,
      nextDocument,
      prevDocument,
      openEditModal,
      closeModal,
      removeDocument,
      handleDocumentChange,
      downloadDocuments,
      updateRequest,
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
  },
};
</script>
