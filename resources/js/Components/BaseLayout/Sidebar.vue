<template>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <Link href="/" class="brand-link">
      <img
        src=""
        alt="Logo"
        class="brand-image img-circle elevation-3"
        style="opacity: 0.8"
      />
      <span class="brand-text font-weight-light">TODO LIST</span>
    </Link>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="" class="img-circle elevation-2" alt="User" />
        </div>
        <div class="info">
          <Link href="/" class="d-block">{{ $page.props.user.full_name }}</Link>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul
          class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview"
          role="menu"
          data-accordion="false"
        >
          <li class="nav-header">MENU</li>
          <li class="nav-item">
            <Link
              href="/"
              class="nav-link"
              :class="{ active: $page.component === 'Home' }"
            >
              <i class="nav-icon fas fa-th"></i>
              <p>
                Home
                <span class="badge badge-info right">2</span>
              </p>
            </Link>
          </li>
          <li class="nav-item">
            <Link
              href="/tasks"
              class="nav-link"
              :class="{ active: $page.component.startsWith('Tasks') }"
            >
              <i class="nav-icon fas fa-th"></i>
              <p>Tasks</p>
            </Link>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Drop down example
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <Link href="/" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Drop down item</p>
                </Link>
              </li>
            </ul>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link" @click.prevent="toggleTheme()">
              <i class="nav-icon fas fa-moon"></i>
              <p>{{ themeName }}</p>
            </a>
          </li> -->
          <li class="nav-item">
            <Link href="/logout" class="nav-link btn text-left" method="post" as="button">
              <i class="nav-icon fas fa-cog"></i>
              <p>Sair</p>
            </Link>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script setup>
import { ref, computed } from "vue";

const theme = ref("light");
const themeName = computed(() =>
  theme.value == "light" ? "Dark Mode" : "Light Mode"
);

const toggleTheme = () => {
  const navbar = document.getElementsByClassName("main-header");
  const sidebar = document.getElementsByClassName("main-sidebar");
  if (theme.value == "light") {
    theme.value = "dark";
    document.body.classList.add("dark-mode");

    sidebar.className = "sidebar-dark-primary";
    // sidebar.add("sidebar-light-primary");

    // navbar.classList.remove("navbar-white navbar-light");
    // navbar.classList.add("navbar-dark");
  } else {
    theme.value = "light";
    document.body.classList.remove("dark-mode");
    // sidebar.remove("sidebar-light-primary");
    // sidebar.add("sidebar-dark-primary");
  }
};
</script>

<script>
import { Link } from "@inertiajs/vue3";
export default {
  name: "Sidebar",
  components: { Link },
};
</script>

<style>
</style>