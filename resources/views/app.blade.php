<!DOCTYPE html>
<html lang="pt-PT">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title inertia>{{config('app.name','LaraVue Inertia JS')}}</title>
    @vite('resources/js/app.js')
    @inertiaHead
  </head>
  <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
      @inertia
  </body>
</html>