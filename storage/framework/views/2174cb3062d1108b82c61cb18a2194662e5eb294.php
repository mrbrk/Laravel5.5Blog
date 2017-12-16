<?php $__env->startSection('template_title'); ?>
  Showing Tags
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .posts-table {
            border: 0;
        }
        .posts-table tr td:first-child {
            padding-left: 15px;
        }
        .posts-table tr td:last-child {
            padding-right: 15px;
        }
        .posts-table.table-responsive,
        .posts-table.table-responsive table {
            margin-bottom: 0;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            Showing All Tags

                            <div class="btn-group pull-right btn-group-xs">
                                <a href="/blog/tags/create">
                                <button type="button" class="btn btn-info btn-xs">
                                    Create New Tag</button></a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/blog/posts/create">
                                            <i class="fa fa-fw fa-post-plus" aria-hidden="true"></i>
                                            Create New Tag
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/posts/deleted">
                                            <i class="fa fa-fw fa-group" aria-hidden="true"></i>
                                            Show Deleted Tag
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="table-responsive posts-table">
                            <table class="table table-striped table-condensed data-table">
                                <thead>
                                    Showing attached posts to tag
                                </thead>
                                <tbody>
                                    <br>
                                  <?php $__currentLoopData = $tag->post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $posts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            Post title is:  <?php echo e($posts->title); ?><br>
                                    
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>