<template>
    <footer>
        <div class="footer py-4 d-flex flex-lg-column " id="kt_footer">
            <!--begin::Container-->
            <div class=" container-fluid  d-flex flex-column flex-md-row flex-stack">
                <!--begin::Copyright-->
                <div class="text-dark order-2 order-md-1">
                    <span class="text-gray-400 fw-semibold me-1">Created by</span>
                    <a href="#" target="_blank"
                        class="text-muted text-hover-primary fw-semibold me-2 fs-6">Click on charity</a>
                </div>
                <!--end::Copyright-->

                <!--begin::Menu-->
              
                <!--end::Menu-->
            </div>
            <!--end::Container-->
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    data() {
        return {
            publicPath: import.meta.env.APP_URL || '/' // Use environment variable or default to root
        };
    }
};
</script>