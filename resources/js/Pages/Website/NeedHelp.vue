<template>
    <website-layout>
        <section class="donate-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="donate-page__content">
                            <form @submit.prevent="submit" class="donate-page__form" enctype="multipart/form-data">
                                <!-- Personal Information -->
                                <div class="donate-page__form__info form-one">
                                    <h3 class="donate-page__form__title">Personal Information</h3>
                                    <div class="form-one__group row">
                                        <div class="form-one__control col-6">
                                            <input v-model="form.full_name" type="text" placeholder="Full Name" :class="{'is-invalid': errors.full_name}">
                                            <span v-if="errors.full_name" class="text-danger">{{ errors.full_name }}</span>
                                        </div>
                                        <div class="form-one__control col-6">
                                            <input v-model="form.email" type="email" placeholder="Email Address" :class="{'is-invalid': errors.email}">
                                            <span v-if="errors.email" class="text-danger">{{ errors.email }}</span>
                                        </div>
                                        <div class="form-one__control col-6">
                                            <input v-model="form.nic" type="text" placeholder="NIC" :class="{'is-invalid': errors.nic}">
                                            <span v-if="errors.nic" class="text-danger">{{ errors.nic }}</span>
                                        </div>
                                        <div class="form-one__control col-6">
                                            <input v-model="form.phone" type="text" placeholder="Phone Number (Optional)">
                                        </div>
                                        <div class="form-one__control col-6">
                                            <input v-model="form.address" type="text" placeholder="Address" :class="{'is-invalid': errors.address}">
                                            <span v-if="errors.address" class="text-danger">{{ errors.address }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Help Request Details -->
                                <div class="donate-page__form__info form-one">
                                    <h3 class="donate-page__form__title">Help Request Details</h3>
                                    <div class="form-one__group row">
                                        <div class="form-one__control col-6">
                                            <select v-model="form.help_type" class="selectpicker form-control" :class="{'is-invalid': errors.help_type}" data-style="btn-primary" data-live-search="true">
                                                
                                                <option value="financial_aid">Financial Aid</option>
                                                <option value="medical_assistance">Medical Assistance</option>
                                                <option value="food">Food</option>
                                                <option value="shelter">Shelter</option>
                                                <option value="education">Education</option>
                                            </select>
                                            <span v-if="errors.help_type" class="text-danger">{{ errors.help_type }}</span>
                                            <P>Select type of help needed</P>
                                        </div>
                                        <div class="form-one__control col-6">
                                            <select v-model="form.urgency" class="selectpicker form-control" :class="{'is-invalid': errors.urgency}" data-style="btn-primary" data-live-search="true">
                                                
                                                <option value="immediate">Immediate</option>
                                                <option value="week">Within a Week</option>
                                                <option value="month">Within a Month</option>
                                            </select>
                                            <span v-if="errors.urgency" class="text-danger">{{ errors.urgency }}</span>
                                            <P>Select Urgency Level</P>
                                        </div>
                                        <div class="form-one__control col-12">
                                            <textarea v-model="form.description" placeholder="Description of Need" :class="{'is-invalid': errors.description}"></textarea>
                                            <span v-if="errors.description" class="text-danger">{{ errors.description }}</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Supporting Documents (Optional) -->
                                <div class="donate-page__form__info form-one">
                                    <h3 class="donate-page__form__title">Supporting Documents (Optional)</h3>
                                    <div class="form-one__group row">
                                        <div class="form-one__control col-12">
                                            <input type="file" multiple @change="handleFileUpload">
                                            <span v-if="errors.supporting_documents" class="text-danger">{{ errors.supporting_documents }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="donate-page__form__donate-amount"></div>
                                <!-- Submit Button -->
                                <div class="donate-page__form__info form-one">
                                    <button type="submit" class="careox-btn"><span>Submit Request</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </website-layout>
</template>

<script>
import WebsiteLayout from '@/Layouts/WebsiteLayout.vue';
import { Link } from '@inertiajs/vue3';
import { reactive, onMounted, nextTick } from 'vue'
import { router } from '@inertiajs/vue3'
import Swal from 'sweetalert2'

export default {
    name: 'Contact',
    components: {
        WebsiteLayout,
        Link,
    },
    data() {
        return {
            publicPath: import.meta.env.VITE_APP_URL || '/',
            form: reactive({
                full_name: null,
                email: null,
                nic: null,
                phone: null,
                address: null,
                help_type: null,
                description: null,
                urgency: null,
                supporting_documents: [],
            }),
            errors: reactive({}),
        };
    },
    mounted() {
        this.initializeSelectPicker();
    },
    updated() {
        this.refreshSelectPicker();
    },
    methods: {
        initializeSelectPicker() {
            nextTick(() => {
                $('.selectpicker').selectpicker();
            });
        },
        refreshSelectPicker() {
            nextTick(() => {
                $('.selectpicker').selectpicker('refresh');
            });
        },
        handleFileUpload(event) {
            const files = Array.from(event.target.files);
            const maxFiles = 5;
            const allowedTypes = ['image/jpeg', 'image/jpeg', 'image/png', ];
            
            if (files.length > maxFiles) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: `You can only upload up to ${maxFiles} files.`,
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                });
                return;
            }

            const invalidFiles = files.filter(file => !allowedTypes.includes(file.type));
            if (invalidFiles.length > 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Only images (JPEG, PNG) and PDFs are allowed.',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                });
                return;
            }

            this.form.supporting_documents = files;
        },
        async submit() {
            const formData = new FormData();
            for (const key in this.form) {
                if (key === 'supporting_documents') {
                    this.form.supporting_documents.forEach((file, index) => {
                        formData.append(`supporting_documents[${index}]`, file);
                    });
                } else {
                    formData.append(key, this.form[key]);
                }
            }

            try {
                await router.post('/need-help', formData, {
                    onError: (error) => {
                        Object.assign(this.errors, error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Please check the form for errors.',
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            showConfirmButton: false,
                        });
                    },
                    onSuccess: () => {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Help request submitted successfully!',
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            showConfirmButton: false,
                        });
                    },
                });
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An unexpected error occurred.',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false,
                });
            }
        },
    },
};
</script>

<style>
/* Style the select and file input to match other form elements */
form.donate-page__form select,
form.donate-page__form input[type="file"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 16px;
}

/* Adjust the title to have space above and below */
.donate-page__form__title {
    margin-top: 20px;
    margin-bottom: 20px;
    font-weight: bold;
}
</style>
