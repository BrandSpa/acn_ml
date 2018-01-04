<?php
  header("Access-Control-Allow-Origin: *");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1 initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">

  <title><?php echo wp_title(); ?></title>
  <meta property="og:title" content="<?php echo get_the_title(); ?>" />
<!--  <meta property="og:image" content="//acninternational.org/wp-content/uploads/sites/4/2016/11/slider1.jpg" />-->
  <meta property="og:url" content="<?php echo the_permalink() ?>" />
   <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','<?php echo get_option('gta_id') ?>');</script>
  <!-- End Google Tag Manager -->
  <?php wp_head(); ?>

  <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/public/css/vendor.css?v=<?php echo filemtime(get_template_directory() . '/public/css/vendor.css') ?>">
  <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">-->
  <!--<link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/public/css/base.css">-->
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.3/flexslider.min.css">-->
  <!--<link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.light.min.css">   -->

  <script> 
    function onLoad(cb) {
      if (window.addEventListener)
        window.addEventListener("load", cb, false);
      else if (window.attachEvent) {
        window.attachEvent("onload", cb);
      } else {
        window.onload = cb;
      }
    }
  </script>

  <!-- ConvertLoop -->
<script>
  !function(t,e,n,s) { t.DPEventsFunction=s,t[s]=t[s] || function() { (t[s].q=t[s].q||[]).push(arguments) }; var c=e.createElement("script"),o=e.getElementsByTagName("script")[0]; c.async=1,c.src=n,o.parentNode.insertBefore(c,o); }(window, document, "https://www.convertloop.co/v1/loop.min.js", "_dp");

  _dp("configure", { appId: "746fffe4", autoTrack: true });
 _dp("pageView");
</script>
<!-- End ConvertLoop -->
<style>
body {
    padding-top: 0 !important;
}    
</style>

</head>

<body>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo get_option('gta_id') ?>"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="app-ml">



<div class="hidden country">
  <?php echo get_the_ID(); ?>
  <?php echo get_user_location()->names['en'] ?>
  <?php echo get_client_ip_server() ?>
</div>
