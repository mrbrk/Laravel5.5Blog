<?php $__env->startSection('template_title'); ?>
  Editing User <?php echo e($user->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
  <style type="text/css">
    .btn-save,
    .pw-change-container {
      display: none;
    }
  </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">

            <strong>Editing User:</strong> <?php echo e($user->name); ?>


            <a href="/users/<?php echo e($user->id); ?>" class="btn btn-primary btn-xs pull-right" style="margin-left: 1em;">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
             Back  <span class="hidden-xs">to User</span>
            </a>

            <a href="/users" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              <span class="hidden-xs">Back to </span>Users
            </a>

          </div>

          <?php echo Form::model($user, array('action' => array('UsersManagementController@update', $user->id), 'method' => 'PUT')); ?>


            <?php echo csrf_field(); ?>


            <div class="panel-body">

              <div class="form-group has-feedback row <?php echo e($errors->has('name') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('name', 'Username' , array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('name', old('name'), array('id' => 'name', 'class' => 'form-control', 'placeholder' => trans('forms.ph-username'))); ?>

                    <label class="input-group-addon" for="name"><i class="fa fa-fw fa-user }}" aria-hidden="true"></i></label>
                  </div>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('email') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('email', 'E-mail' , array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('email', old('email'), array('id' => 'email', 'class' => 'form-control', 'placeholder' => trans('forms.ph-useremail'))); ?>

                    <label class="input-group-addon" for="email"><i class="fa fa-fw fa-envelope " aria-hidden="true"></i></label>
                  </div>
                </div>
              </div>


              <div class="form-group has-feedback row <?php echo e($errors->has('first_name') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('first_name', trans('forms.create_user_label_firstname'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('first_name', NULL, array('id' => 'first_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_firstname'))); ?>

                    <label class="input-group-addon" for="first_name"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_firstname')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('first_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('first_name')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('last_name') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('last_name', trans('forms.create_user_label_lastname'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('last_name', NULL, array('id' => 'last_name', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_lastname'))); ?>

                    <label class="input-group-addon" for="last_name"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_lastname')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('last_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('last_name')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('role') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('role', trans('forms.create_user_label_role'), array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <select class="form-control" name="role" id="role">
                      <option value=""><?php echo e(trans('forms.create_user_ph_role')); ?></option>
                      <?php if($roles->count()): ?>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($role->id); ?>" <?php echo e($currentRole->id == $role->id ? 'selected="selected"' : ''); ?>><?php echo e($role->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                    <label class="input-group-addon" for="role"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_role')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('role')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('role')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="pw-change-container">
                <div class="form-group has-feedback row">
                  <?php echo Form::label('password', trans('forms.create_user_label_password'), array('class' => 'col-md-3 control-label'));; ?>

                  <div class="col-md-9">
                    <div class="input-group">
                      <?php echo Form::password('password', array('id' => 'password', 'class' => 'form-control ', 'placeholder' => trans('forms.create_user_ph_password'))); ?>

                      <label class="input-group-addon" for="password"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_password')); ?>" aria-hidden="true"></i></label>
                    </div>
                  </div>
                </div>

                <div class="form-group has-feedback row">
                  <?php echo Form::label('password_confirmation', trans('forms.create_user_label_pw_confirmation'), array('class' => 'col-md-3 control-label'));; ?>

                  <div class="col-md-9">
                    <div class="input-group">
                      <?php echo Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => trans('forms.create_user_ph_pw_confirmation'))); ?>

                      <label class="input-group-addon" for="password_confirmation"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_pw_confirmation')); ?>" aria-hidden="true"></i></label>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="panel-footer">

              <div class="row">

                <div class="col-xs-6">
                  <a href="#" class="btn btn-default btn-block margin-bottom-1 btn-change-pw" title="Change Password">
                    <i class="fa fa-fw fa-lock" aria-hidden="true"></i>
                    <span></span> Change Password
                  </a>
                </div>
                <div class="col-xs-6">
                  <?php echo Form::button('<i class="fa fa-fw fa-save" aria-hidden="true"></i> Save Changes', array('class' => 'btn btn-success btn-block margin-bottom-1 btn-save','type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmSave', 'data-title' => trans('modals.edit_user__modal_text_confirm_title'), 'data-message' => trans('modals.edit_user__modal_text_confirm_message'))); ?>

                </div>
              </div>
            </div>

          <?php echo Form::close(); ?>


        </div>
      </div>
    </div>
  </div>

  <?php echo $__env->make('modals.modal-save', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('modals.modal-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <?php echo $__env->make('scripts.delete-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('scripts.save-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('scripts.check-changed', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>