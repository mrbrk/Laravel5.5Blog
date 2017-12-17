<?php $__env->startSection('template_title'); ?>
  Showing Users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_linked_css'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <style type="text/css" media="screen">
        .users-table {
            border: 0;
        }
        .users-table tr td:first-child {
            padding-left: 15px;
        }
        .users-table tr td:last-child {
            padding-right: 15px;
        }
        .users-table.table-responsive,
        .users-table.table-responsive table {
            margin-bottom: .15em;
        }

    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            Showing Deleted Users

                            <a href="/users/" class="btn btn-primary btn-xs pull-right">
                                <i class="fa fa-fw fa-reply" aria-hidden="true"></i>
                                <span class="hidden-xs">Back to Users</span>
                            </a>
                        </div>
                    </div>

                    <div class="panel-body">

                        <?php if(count($users) === 0): ?>

                            <tr>
                                <p class="text-center margin-half">
                                    No Records Found
                                </p>
                            </tr>

                        <?php else: ?>

                            <div class="table-responsive users-table">
                                <table class="table table-striped table-condensed data-table">
                                    <thead>
                                        <tr>
                                            <th class="hidden-xxs">ID</th>
                                            <th>Username</th>
                                            <th class="hidden-xs hidden-sm">Email</th>
                                            <th class="hidden-xs hidden-sm hidden-md">First Name</th>
                                            <th class="hidden-xs hidden-sm hidden-md">Last Name</th>
                                            <th class="hidden-xs hidden-sm">Role</th>
                                            <th class="hidden-xs">Deleted</th>
                                            <th class="hidden-xs">Deleted IP</th>
                                            <th>Actions</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td class="hidden-xxs"><?php echo e($user->id); ?></td>
                                                <td><?php echo e($user->name); ?></td>
                                                <td class="hidden-xs hidden-sm"><a href="mailto:<?php echo e($user->email); ?>" title="email <?php echo e($user->email); ?>"><?php echo e($user->email); ?></a></td>
                                                <td class="hidden-xs hidden-sm hidden-md"><?php echo e($user->first_name); ?></td>
                                                <td class="hidden-xs hidden-sm hidden-md"><?php echo e($user->last_name); ?></td>
                                                <td class="hidden-xs hidden-sm">
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
                                                </td>
                                                <td class="hidden-xs"><?php echo e($user->deleted_at); ?></td>
                                                <td class="hidden-xs"><?php echo e($user->deleted_ip_address); ?></td>
                                                <td>
                                                    <?php echo Form::model($user, array('action' => array('SoftDeletesController@update', $user->id), 'method' => 'PUT', 'data-toggle' => 'tooltip')); ?>

                                                        <?php echo Form::button('<i class="fa fa-refresh" aria-hidden="true"></i>', array('class' => 'btn btn-success btn-block btn-sm', 'type' => 'submit', 'data-toggle' => 'tooltip', 'title' => 'Restore User')); ?>

                                                    <?php echo Form::close(); ?>

                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-info btn-block" href="<?php echo e(URL::to('users/deleted/' . $user->id)); ?>" data-toggle="tooltip" title="Show User">
                                                        <i class="fa fa-eye fa-fw" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo Form::model($user, array('action' => array('SoftDeletesController@destroy', $user->id), 'method' => 'DELETE', 'class' => 'inline', 'data-toggle' => 'tooltip', 'title' => 'Destroy User Record')); ?>

                                                        <?php echo Form::hidden('_method', 'DELETE'); ?>

                                                        <?php echo Form::button('<i class="fa fa-user-times" aria-hidden="true"></i>', array('class' => 'btn btn-danger btn-sm inline','type' => 'button', 'style' =>'width: 100%;' ,'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => 'Delete User', 'data-message' => 'Are you sure you want to delete this user ?')); ?>

                                                    <?php echo Form::close(); ?>

                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </tbody>
                                </table>
                            </div>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('modals.modal-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

    <?php if(count($users) > 10): ?>
        <?php echo $__env->make('scripts.datatables', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php endif; ?>
    <?php echo $__env->make('scripts.delete-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('scripts.save-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('scripts.tooltips', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>