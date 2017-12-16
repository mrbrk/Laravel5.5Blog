<?php $__env->startSection('template_title'); ?>
  <?php echo e(trans('titles.adminThemesAdd')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">

            <?php echo e(trans('titles.adminThemesAdd')); ?>


            <a href="/themes" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              Back <span class="hidden-xs">to</span><span class="hidden-xs"> Themes</span>
            </a>

          </div>
          <div class="panel-body">

            <?php echo Form::open(array('action' => 'ThemesManagementController@store', 'method' => 'POST', 'role' => 'form')); ?>


              <?php echo csrf_field(); ?>


              <div class="form-group has-feedback row <?php echo e($errors->has('status') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('status', trans('themes.statusLabel') , array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <label class="switch checked" for="status">
                    <span class="active"><i class="fa fa-toggle-on fa-2x"></i> <?php echo e(trans('themes.statusEnabled')); ?></span>
                    <span class="inactive"><i class="fa fa-toggle-on fa-2x fa-rotate-180"></i> <?php echo e(trans('themes.statusDisabled')); ?></span>
                    <input type="radio" name="status" value="1" checked>
                    <input type="radio" name="status" value="0">
                  </label>

                  <?php if($errors->has('status')): ?>
                    <span class="help-block">
                      <strong><?php echo e($errors->first('status')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('name', trans('themes.nameLabel') , array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                    <div class="input-group">
                      <?php echo Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('themes.namePlaceholder'))); ?>

                      <label class="input-group-addon" for="name"><i class="fa fa-fw fa-pencil }}" aria-hidden="true"></i></label>
                    </div>
                <?php if($errors->has('name')): ?>
                  <span class="help-block">
                    <strong><?php echo e($errors->first('name')); ?></strong>
                  </span>
                <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('link') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('link', trans('themes.linkLabel'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                    <div class="input-group">
                      <?php echo Form::text('link', old('link'), array('id' => 'link', 'class' => 'form-control', 'placeholder' => trans('themes.linkPlaceholder'))); ?>

                      <label class="input-group-addon" for="link"><i class="fa fa-fw fa-link fa-rotate-90" aria-hidden="true"></i></label>
                    </div>
                <?php if($errors->has('link')): ?>
                  <span class="help-block">
                    <strong><?php echo e($errors->first('link')); ?></strong>
                  </span>
                <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('notes') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('notes', trans('themes.notesLabel') , array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                    <div class="input-group">
                      <?php echo Form::textarea('notes', old('notes'), array('id' => 'notes', 'class' => 'form-control', 'placeholder' => trans('themes.notesPlaceholder'))); ?>

                      <label class="input-group-addon" for="notes"><i class="fa fa-fw fa-pencil }}" aria-hidden="true"></i></label>
                    </div>
                <?php if($errors->has('notes')): ?>
                  <span class="help-block">
                    <strong><?php echo e($errors->first('notes')); ?></strong>
                  </span>
                <?php endif; ?>
                </div>
              </div>

              <?php echo Form::button('<i class="fa fa-plus" aria-hidden="true"></i>&nbsp;' . trans('themes.btnAddTheme'), array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )); ?>


            <?php echo Form::close(); ?>


          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <?php echo $__env->make('scripts.toggleStatus', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>