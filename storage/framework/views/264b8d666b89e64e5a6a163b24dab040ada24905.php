<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php if(trim($__env->yieldContent('template_title'))): ?><?php echo $__env->yieldContent('template_title'); ?> | <?php endif; ?> <?php echo e(config('app.name', Lang::get('titles.app'))); ?></title>
    <meta name="description" content="">
    <meta name="author" content="Burak Kalkuz">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('/blog/vendor/bootstrap/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo e(asset('/blog/vendor/font-awesome/css/font-awesome.min.css')); ?>">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="<?php echo e(asset('/blog/css/fontastic.css')); ?>">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="<?php echo e(asset('/blog/vendor/@fancyapps/fancybox/jquery.fancybox.min.css')); ?>">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo e(asset('/blog/css/style.default.css')); ?>" id="theme-stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo e(asset('/blog/css/custom.css')); ?>">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <?php echo $__env->yieldContent('template_linked_fonts'); ?>    
    <?php echo $__env->yieldContent('template_linked_css'); ?>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <?php echo $__env->yieldContent('header'); ?>
    
    <div class="container">
      <div class="row">
        <!-- Latest Posts -->
        <?php echo $__env->yieldContent('main'); ?>
        <?php echo $__env->yieldContent('aside'); ?>
        
      </div>
    </div>
    <!-- Page Footer-->
    <?php echo $__env->yieldContent('footer'); ?>

    <!-- Javascript files-->
    <?php echo $__env->yieldContent('footer_js'); ?>
  </body>
</html>