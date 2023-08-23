<template>
  <div class="wrapper">
    <!-- Preloader -->
    <!-- <div
      class="preloader flex-column justify-content-center align-items-center"
    >
      <img
        class="animation__shake"
        src=""
        alt="AdminLTELogo"
        height="60"
        width="60"
      />
    </div> -->

    <Navbar />
    <Sidebar />
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">
                <slot name="title" />
              </h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
              <slot name="rightActions" />
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">
          <slot />
        </div>
      </section>
    </div>
    <AppFooter />
  </div>
</template>

<script>
import "admin-lte/dist/css/adminlte.min.css";
import "admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css";
import "admin-lte/plugins/daterangepicker/daterangepicker.css";
import "admin-lte/plugins/fontawesome-free/css/all.min.css";
import "material-design-icons/iconfont/material-icons.css";

import "admin-lte/plugins/jquery/jquery.min.js";
import "admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js";
import "admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js";
import "admin-lte/dist/js/adminlte.min.js";
import "admin-lte/plugins/toastr/toastr.min.css";
import toastr from "admin-lte/plugins/toastr/toastr.min.js";

import Navbar from "../Components/BaseLayout/Navbar.vue";
import Sidebar from "../Components/BaseLayout/Sidebar.vue";
import AppFooter from "../Components/BaseLayout/AppFooter.vue";

export default {
  name: "BaseLayout",
  components: { Navbar, Sidebar, AppFooter },
  watch: {
    $page: {
      handler() {
        const flash = this.$page.props.flash;
        if (flash.success) {
          toastr.success(flash.success);
        } else if (flash.error) {
          toastr.error(flash.error);
        }
      },
    },
  },
};
</script>

<style>
</style>