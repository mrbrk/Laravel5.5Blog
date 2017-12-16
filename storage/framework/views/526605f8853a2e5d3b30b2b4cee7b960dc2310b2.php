<?php $__env->startSection('template_title'); ?>
  Create New Post
<?php $__env->stopSection(); ?>

<?php $__env->startSection('template_fastload_css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('head'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<script type="text/javascript">
  tinymce.init({
    selector : "textarea",
    plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
    toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
  }); 
</script>
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <div class="panel-heading">

            Create New Post

            <a href="/blog/posts" class="btn btn-info btn-xs pull-right">
              <i class="fa fa-fw fa-mail-reply" aria-hidden="true"></i>
              Back <span class="hidden-xs">to</span><span class="hidden-xs"> Posts</span>
            </a>

          </div>
          <div class="panel-body">

            <?php echo Form::open(array('action' => 'PostController@store','files' => true)); ?>


              <div class="form-group has-feedback row <?php echo e($errors->has('title') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('title', 'Title', array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::text('title', NULL, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Descript to post')); ?>

                    <label class="input-group-addon" for="title"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_username')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('title')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('title')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('image_name') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('image_name', 'Post Pictrue', array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::file('image_name', ['id'=>'image_name' ,'class' => 'form-control']); ?>

                    <label class="input-group-addon" for="image_name"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_username')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('image_name')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('image_name')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>              

              <div class="form-group has-feedback row <?php echo e($errors->has('body') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('body', 'Content', array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <?php echo Form::textarea('body', NULL, array('id' => 'body', 'class' => 'form-control', 'placeholder' => 'Be Creative :)')); ?>

                  </div>
                  <?php if($errors->has('body')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('body')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <div class="form-group has-feedback row <?php echo e($errors->has('category') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('category', 'Category', array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <select class="form-control" name="category_id" id="category_id">
                      <option value="">Select a Category</option>
                      <?php if($categories->count()): ?>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </select>
                    <label class="input-group-addon" for="name"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_role')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('category')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('category')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group has-feedback row <?php echo e($errors->has('tags') ? ' has-error ' : ''); ?>">
                <?php echo Form::label('tags', 'Tags', array('class' => 'col-md-3 control-label'));; ?>

                <div class="col-md-9">
                  <div class="input-group">
                    <checkbox class="form-control"  name="tags" id="tags">
                      <?php if($tags->count()): ?>
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <label>
                            <input type="checkbox" name="tags[]" value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?>

                        </label>
                         <!-- <option value="<?php echo e($tag->id); ?>"><?php echo e($tag->name); ?></option> -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    </checkbox>
                    <label class="input-group-addon" for="name"><i class="fa fa-fw <?php echo e(trans('forms.create_user_icon_role')); ?>" aria-hidden="true"></i></label>
                  </div>
                  <?php if($errors->has('tags')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('tags')); ?></strong>
                    </span>
                  <?php endif; ?>
                </div>
              </div>

              <?php echo Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . 'Create a new post', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )); ?>


            <?php echo Form::close(); ?>


          </div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>