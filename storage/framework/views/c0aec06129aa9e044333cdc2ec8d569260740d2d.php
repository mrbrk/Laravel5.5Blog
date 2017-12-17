<?php $__env->startSection('template_title'); ?>
  Showing User <?php echo e($user->name); ?>

<?php $__env->stopSection(); ?>

<?php
  $levelAmount = 'Level:';

  if ($user->level() >= 2) {
      $levelAmount = 'Levels:';

  }
?>

<?php $__env->startSection('content'); ?>
    <section class="content-header">
      <h1>
        Create New User
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="#">Users</li>
        <li class="active">Create</li>
      </ol>
    </section>
    <br/>
 
      <div class="col-md-12">

        <div class="panel panel-danger">

          <div class="panel-heading">
            <a href="/users/deleted/" class="btn btn-primary btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              <span class="hidden-xs"><?php echo e(trans('usersmanagement.usersBackDelBtn')); ?></span>
            </a>
            <?php echo e(trans('usersmanagement.usersDeletedPanelTitle')); ?>

          </div>
          <div class="panel-body">

            <div class="well">
              <div class="row">
                <div class="col-sm-6">
                  <img src="<?php if($user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>" id="" class="img-circle center-block margin-bottom-2 margin-top-1 user-image">
                </div>

                <div class="col-sm-6">
                  <h4 class="text-muted margin-top-sm-1 text-center text-left-tablet">
                    <?php echo e($user->name); ?>

                  </h4>
                  <p class="text-center text-left-tablet">
                    <strong>
                      <?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>

                    </strong>
                    <br />
                    <?php echo e(HTML::mailto($user->email, $user->email)); ?>

                  </p>

                  <?php if($user->profile): ?>
                    <div class="text-center text-left-tablet margin-bottom-1">

                      <?php echo Form::model($user, array('action' => array('SoftDeletesController@update', $user->id), 'method' => 'PUT', 'class' => 'form-inline')); ?>

                          <?php echo Form::button('<i class="fa fa-refresh fa-fw" aria-hidden="true"></i> Restore User', array('class' => 'btn btn-success btn-block btn-sm', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Restore User')); ?>

                      <?php echo Form::close(); ?>


                      <?php echo Form::model($user, array('action' => array('SoftDeletesController@destroy', $user->id), 'method' => 'DELETE', 'class' => 'form-inline', 'data-toggle' => 'tooltip', 'title' => 'Permanently Delete User')); ?>

                          <?php echo Form::hidden('_method', 'DELETE'); ?>

                          <?php echo Form::button('<i class="fa fa-user-times fa-fw" aria-hidden="true"></i> Delete User', array('class' => 'btn btn-danger btn-sm','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Permanently Delete User', 'data-message' => 'Are you sure you want to permanently delete this user?')); ?>

                      <?php echo Form::close(); ?>


                    </div>
                  <?php endif; ?>

                </div>
              </div>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($user->deleted_at): ?>

              <div class="col-sm-5 col-xs-6 text-larger text-warning">
                <strong>
                  <?php echo e(trans('usersmanagement.labelDeletedAt')); ?>

                </strong>
              </div>

              <div class="col-sm-7 text-warning">
                <?php echo e($user->deleted_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->deleted_ip_address): ?>

              <div class="col-sm-5 col-xs-6 text-larger text-warning">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpDeleted')); ?>

                </strong>
              </div>

              <div class="col-sm-7 text-warning">
                <?php echo e($user->deleted_ip_address); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>


            <?php if($user->name): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelUserName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->email): ?>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelEmail')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php echo e(HTML::mailto($user->email, $user->email)); ?>

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->first_name): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelFirstName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->first_name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->last_name): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelLastName')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->last_name); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelRole')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($user_role->name == 'User'): ?>
                  <?php $labelClass = 'primary' ?>

                <?php elseif($user_role->name == 'Admin'): ?>
                  <?php $labelClass = 'warning' ?>

                <?php elseif($user_role->name == 'Unverified'): ?>
                  <?php $labelClass = 'danger' ?>

                <?php else: ?>
                  <?php $labelClass = 'default' ?>

                <?php endif; ?>

                <span class="label label-<?php echo e($labelClass); ?>"><?php echo e($user_role->name); ?></span>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelStatus')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php if($user->activated == 1): ?>
                <span class="label label-success">
                  Activated
                </span>
              <?php else: ?>
                <span class="label label-danger">
                  Not-Activated
                </span>
              <?php endif; ?>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                Access <?php echo e(trans('usersmanagement.labelAccessLevel')); ?> <?php echo e($levelAmount); ?>:
              </strong>
            </div>

            <div class="col-sm-7">

              <?php if($user->level() >= 5): ?>
                <span class="label label-primary margin-half margin-left-0">5</span>
              <?php endif; ?>

              <?php if($user->level() >= 4): ?>
                 <span class="label label-info margin-half margin-left-0">4</span>
              <?php endif; ?>

              <?php if($user->level() >= 3): ?>
                <span class="label label-success margin-half margin-left-0">3</span>
              <?php endif; ?>

              <?php if($user->level() >= 2): ?>
                <span class="label label-warning margin-half margin-left-0">2</span>
              <?php endif; ?>

              <?php if($user->level() >= 1): ?>
                <span class="label label-default margin-half margin-left-0">1</span>
              <?php endif; ?>

            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <div class="col-sm-5 col-xs-6 text-larger">
              <strong>
                <?php echo e(trans('usersmanagement.labelPermissions')); ?>

              </strong>
            </div>

            <div class="col-sm-7">
              <?php if($user->canViewUsers()): ?>
                <span class="label label-primary margin-half margin-left-0"">
                  <?php echo e(trans('permsandroles.permissionView')); ?>

                </span>
              <?php endif; ?>

              <?php if($user->canCreateUsers()): ?>
                <span class="label label-info margin-half margin-left-0"">
                  <?php echo e(trans('permsandroles.permissionCreate')); ?>

                </span>
              <?php endif; ?>

              <?php if($user->canEditUsers()): ?>
                <span class="label label-warning margin-half margin-left-0"">
                  <?php echo e(trans('permsandroles.permissionEdit')); ?>

                </span>
              <?php endif; ?>

              <?php if($user->canDeleteUsers()): ?>
                <span class="label label-danger margin-half margin-left-0"">
                  <?php echo e(trans('permsandroles.permissionDelete')); ?>

                </span>
              <?php endif; ?>
            </div>

            <div class="clearfix"></div>
            <div class="border-bottom"></div>

            <?php if($user->created_at): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelCreatedAt')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->created_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->updated_at): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelUpdatedAt')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->updated_at); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->signup_ip_address): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpEmail')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->signup_ip_address); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->signup_confirmation_ip_address): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpConfirm')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->signup_confirmation_ip_address); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->signup_sm_ip_address): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpSocial')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->signup_sm_ip_address); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->admin_ip_address): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpAdmin')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->admin_ip_address); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

            <?php if($user->updated_ip_address): ?>

              <div class="col-sm-5 col-xs-6 text-larger">
                <strong>
                  <?php echo e(trans('usersmanagement.labelIpUpdate')); ?>

                </strong>
              </div>

              <div class="col-sm-7">
                <?php echo e($user->updated_ip_address); ?>

              </div>

              <div class="clearfix"></div>
              <div class="border-bottom"></div>

            <?php endif; ?>

          </div>

        </div>
      </div>
 

  <?php echo $__env->make('modals.modal-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <?php echo $__env->make('scripts.delete-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('scripts.tooltips', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>