<template>
    <footer>
        <div id="kt_app_footer"
            class="app-footer  align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3 ">
            <!--begin::Copyright-->
            <div class="text-gray-900 order-2 order-md-1">
                <span class="text-muted fw-semibold me-1">2024&copy;</span>
                <a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
            </div>
            <!--end::Copyright-->

            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                <li class="menu-item"><a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                </li>

                <li class="menu-item"><a href="https://devs.keenthemes.com" target="_blank"
                        class="menu-link px-2">Support</a></li>

                <li class="menu-item"><a href="https://keenthemes.com/products/saul-html-pro" target="_blank"
                        class="menu-link px-2">Purchase</a></li>
            </ul>
            <!--end::Menu-->
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