<template>
    <div id="kt_header" class="header " data-kt-sticky="true" data-kt-sticky-name="header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">

        <!--begin::Container-->
        <div class=" container-fluid  d-flex align-items-stretch justify-content-between" id="kt_header_container">

            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-2 pb-lg-0"
                data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">

                <!--begin::Heading-->

                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title--->


            <!--begin::Wrapper-->
            <div class="d-flex d-lg-none align-items-center ms-n2 me-2">
                <!--begin::Aside mobile toggle-->
                <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                    <i class="ki-duotone ki-abstract-14 fs-1"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Aside mobile toggle-->

                <!--begin::Logo-->
                <a href="index.html" class="d-flex align-items-center">
                    <img alt="Logo" :src="`${publicPath}admin-assets/media/logos/logo-dark.png`" class="h-45px">
                </a>
                <!--end::Logo-->
            </div>
            <!--end::Wrapper-->


            <!--begin::Toolbar wrapper-->
            <div class="d-flex align-items-center flex-shrink-0">


                <!--begin::Theme mode-->
                <div class="d-flex align-items-center ms-2 ms-lg-3">

                    <!--begin::Menu toggle-->
                    <a href="#" class="btn btn-icon btn-active-light-primaryw-35px h-35px w-md-40px h-md-40px"
                        data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <i class="ki-duotone ki-night-day theme-light-show fs-2"><span class="path1"></span><span
                                class="path2"></span><span class="path3"></span><span class="path4"></span><span
                                class="path5"></span><span class="path6"></span><span class="path7"></span><span
                                class="path8"></span><span class="path9"></span><span class="path10"></span></i> <i
                            class="ki-duotone ki-moon theme-dark-show fs-2"><span class="path1"></span><span
                                class="path2"></span></i></a>
                    <!--begin::Menu toggle-->

                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-night-day fs-2"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span><span class="path5"></span><span
                                            class="path6"></span><span class="path7"></span><span
                                            class="path8"></span><span class="path9"></span><span
                                            class="path10"></span></i> </span>
                                <span class="menu-title">
                                    Light
                                </span>
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-moon fs-2"><span class="path1"></span><span
                                            class="path2"></span></i> </span>
                                <span class="menu-title">
                                    Dark
                                </span>
                            </a>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-3 my-0">
                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                <span class="menu-icon" data-kt-element="icon">
                                    <i class="ki-duotone ki-screen fs-2"><span class="path1"></span><span
                                            class="path2"></span><span class="path3"></span><span
                                            class="path4"></span></i> </span>
                                <span class="menu-title">
                                    System
                                </span>
                            </a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::Menu-->

                </div>
                <!--end::Theme mode-->

                <!--begin::User-->
                <div class="d-flex align-items-center ms-2 ms-lg-3" id="kt_header_user_menu_toggle">
                    <!--begin::Menu wrapper-->
                    <div class="cursor-pointer symbol symbol-35px symbol-md-40px"
                        data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end">
                        <img alt="user" :src="`${publicPath}storage/profile_images/${$page.props.auth.user.profile_image}`">
                    </div>

                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                        data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="user" :src="`${publicPath}storage/profile_images/${$page.props.auth.user.profile_image}`">
                                </div>
                                <!--end::Avatar-->

                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div class="fw-bold d-flex align-items-center fs-5">
                                        {{ $page.props.auth.user.name }} 
                                    </div>

                                    <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                        {{ $page.props.auth.user.email }} </a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->

                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <Link href="/admin/my-profile" class="menu-link px-5">
                                My Profile
                            </Link>
                            
                        </div>
                        <!--end::Menu item-->


                        <!--begin::Menu item-->
                        <!-- Update sign-out link in your component -->
                        <div class="menu-item px-5">
                            <a href="#" class="menu-link px-5" @click.prevent="logout">
                                Sign Out
                            </a>
                        </div>

                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User -->
            </div>
            <!--end::Toolbar wrapper-->
        </div>
        <!--end::Container-->
    </div>
</template>

<script>
import { ref } from 'vue';
import { Link, router } from '@inertiajs/vue3';

export default {
    name: 'Header',
    components:{Link},
    setup() {
        const publicPath = ref(import.meta.env.VITE_APP_URL || '/');

        const logout = () => {
            router.post('/logout', {}, {
                onSuccess: () => {
                    router.visit('/login'); // Redirect to login page after successful logout
                },
                onError: (error) => {
                    console.error('Logout error:', error);
                }
            });
        };

        return {
            publicPath,
            logout
        };
    }
};
</script>

<style scoped>
/* Add your scoped styles here */
</style>
