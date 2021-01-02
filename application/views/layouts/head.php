<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$title?> </title>

    <!-- Bootstrap -->
    <link href="<?=templates('/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=templates('/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=templates('/vendors/nprogress/nprogress.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?=templates('build/css/custom.min.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
  <link rel="stylesheet" href="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
  <style type="text/css">
    #map { height: 100vh; }
    .icon {
  display: inline-block;
  margin: 2px;
  height: 16px;
  width: 16px;
  background-color: #ccc;
  }
  .icon-bar {
    background: url('assets/js/leaflet-panel-layers-master/examples/images/icons/bar.png') center center no-repeat;
}
.leaflet-tooltip.no-background{
  background: transparent;
  border:0;
  box-shadow:none;
  font-weight: bold;
}
</style>
  </head>