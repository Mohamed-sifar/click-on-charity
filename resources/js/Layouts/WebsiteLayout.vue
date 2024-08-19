<template>
  <div id="website-layout">
    <div class="custom-cursor boxed-wrapper">
      <div class="custom-cursor__cursor"></div>
      <div class="custom-cursor__cursor-two"></div>

      <div class="preloader" v-if="loading">
        <div class="preloader__image" style="background-image: url('/assets/images/loader.png');"></div>
      </div>
      <!-- /.preloader -->
      <div class="page-wrapper">
        <Topbar />
        <Header />
        <main>
          <slot @loaded="handleLoaded"></slot>
        </main>
        <Footer />
      </div><!-- /.page-wrapper -->
      <Mobilesidebar />

      <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__text">back top</span>
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
      </a>
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import Topbar from '../Components/Website/Topbar.vue';
import Header from '../Components/Website/Header.vue';
import Footer from '../Components/Website/Footer.vue';
import Mobilesidebar from '../Components/Website/Mobilesidebar.vue';
import { Link } from '@inertiajs/vue3';

export default {
  components: {
    Topbar,
    Header,
    Footer,
    Mobilesidebar,
    Link,
  },
  setup() {
    const loading = ref(true);

    const handleLoaded = () => {
      loading.value = false;
    };

    onMounted(() => {
      // Custom cursor logic
      if (document.querySelector(".custom-cursor")) {
        const cursor = document.querySelector(".custom-cursor__cursor");
        const cursorinner = document.querySelector(".custom-cursor__cursor-two");
        const aElements = document.querySelectorAll("a");

        document.addEventListener("mousemove", function (e) {
          const x = e.clientX;
          const y = e.clientY;
          cursor.style.transform = `translate3d(calc(${x}px - 50%), calc(${y}px - 50%), 0)`;
        });

        document.addEventListener("mousemove", function (e) {
          const x = e.clientX;
          const y = e.clientY;
          cursorinner.style.left = `${x}px`;
          cursorinner.style.top = `${y}px`;
        });

        document.addEventListener("mousedown", function () {
          cursor.classList.add("click");
          cursorinner.classList.add("custom-cursor__innerhover");
        });

        document.addEventListener("mouseup", function () {
          cursor.classList.remove("click");
          cursorinner.classList.remove("custom-cursor__innerhover");
        });

        aElements.forEach((item) => {
          item.addEventListener("mouseover", () => {
            cursor.classList.add("custom-cursor__hover");
          });
          item.addEventListener("mouseleave", () => {
            cursor.classList.remove("custom-cursor__hover");
          });
        });
      }

      // Fallback to hide the loader after a certain period
      setTimeout(() => {
        loading.value = false;
      }, 1000); // Adjust the timeout as necessary
    });

    return {
      loading,
      handleLoaded,
    };
  },
};
</script>
