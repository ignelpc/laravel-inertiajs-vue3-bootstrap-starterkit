<template>
  <nav class="orange lighten-1">
    <div class="nav-wrapper">
      <Link href="#" data-target="slide-out" class="sidenav-trigger">
        <i class="material-icons">menu</i>
      </Link>
      <Link href="#" class="brand-logo">Dashboard</Link>
      <ul class="right hide-on-med-and-down">
        <li>
          <Link href="#"><i class="material-icons">search</i></Link>
        </li>
        <li>
          <Link href="#"><i class="material-icons">view_module</i></Link>
        </li>
        <li>
          <Link href="#"><i class="material-icons">refresh</i></Link>
        </li>
        <li>
          <Link href="#"><i class="material-icons">more_vert</i></Link>
        </li>
      </ul>
    </div>
  </nav>
  <div>
    <ul id="slide-out" class="sidenav sidenav-fixed">
      <li>
        <div class="user-view">
          <div class="background"><img src="" alt="" /></div>
          <Link href="#"><img class="circle" src="" alt="" /></Link>
          <Link href="#"><span class="white-text name">Ignel PC</span></Link>
          <Link href="#"
            ><span class="white-text email">ignelpc@email.com</span></Link
          >
        </div>
      </li>
      <li>
        <Link href="/" class="waves-effect">
          <i class="material-icons orange-text">home</i> Home
        </Link>
      </li>
      <li>
        <Link href="#" class="waves-effect">
          <i class="material-icons orange-text">storefront</i> Productos
        </Link>
      </li>
      <li>
        <Link href="#" class="waves-effect">
          <i class="material-icons orange-text">settings</i> Configurações
        </Link>
      </li>
      <li><div class="divider"></div></li>
      <li><Link href="#" class="subheader">Menu</Link></li>
      <li><Link href="#">Aprender</Link></li>
      <li><Link href="#">Ler</Link></li>
      <li><Link href="#">Ajuda</Link></li>

      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li class="bold">
            <a href="#" class="collapsible-header">Pages</a>
            <div class="collapsible-body">
              <ul>
                <li><Link href="#">Home</Link></li>
                <li><Link href="#">User</Link></li>
                <li>
                  <Link href="#!"
                    ><i class="material-icons">view_module</i> Projects
                  </Link>
                </li>
                <li>
                  <Link href="#!"
                    ><i class="material-icons">clouds</i> Services
                  </Link>
                </li>
              </ul>
            </div>
          </li>
          <li class="bold">
            <Link href="#" class="collapsible-header">Websites</Link>
            <div class="collapsible-body">
              <ul>
                <li><Link href="#">My Portfolio</Link></li>
                <li><Link href="#">Store</Link></li>
                <li><Link href="#">Test Website</Link></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
  <main>
    <div class="container-main">
      <slot />
    </div>
  </main>
</template>

<script>
// import "materialize-css/dist/css/materialize.min.css";
// import "material-design-icons/iconfont/material-icons.css";
// import "jquery/dist/jquery.min.js";
// import "materialize-css/dist/js/materialize.min.js";
import { Link } from "@inertiajs/vue3";
export default {
  name: "MaterializeLayout",
  components: { Link },
};
</script>

<style>
nav,
header,
main,
footer {
  padding-left: 320px;
}
main {
  padding: 20px 20px 20px 270px;
}
.sidenav li > a {
  padding: 0 16px;
}
.sidenav {
  width: 250px;
}
.chart-container {
  position: relative;
  margin: auto;
  height: 300px;
  width: 100%;
}
.container-main {
  max-width: 1550px;
  margin: 0 auto;
}

@media only screen and (max-width: 992px) {
  nav,
  header,
  main,
  footer {
    padding-left: 20px;
  }
  main {
    padding: 20px;
  }
}
</style>