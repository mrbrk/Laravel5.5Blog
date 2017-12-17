<?php $__env->startSection('template_title'); ?>
  Edit New Category
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
      <h1>
        Edit Category
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="#">Categoried</li>
        <li class="active">Edit</li>
      </ol>
    </section>
    <br/>

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">

            Edit New Category

            <a href="/blog/posts" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              Back <span class="hidden-xs">to</span><span class="hidden-xs"> Categories</span>
            </a>

          </div>
          <div class="panel-body">


          <?php echo Form::model($category, array('action' => array('CategoryController@update', $category->id), 'method' => 'PUT')); ?>


            <?php echo csrf_field(); ?>

              <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('name', 'Title', array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('name', NULL, array('id' => 'name', 'class' => 'form-control', 'placeholder' => $category->name )); ?>

                    <label class="input-group-addon" for="name"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_username')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('name')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('slug') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('slug', 'Slug', array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('slug', NULL, array('id' => 'slug', 'class' => 'form-control', 'placeholder' => $category->slug )); ?>

                    <label class="input-group-addon" for="slug"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_username')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('slug')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('slug')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>
              <?php echo Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . 'Edit category', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )); ?>


            <?php echo Form::close(); ?>


          </div>
        </div>
      </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>