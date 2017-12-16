<?php $__env->startSection('template_title'); ?>
  Showing Post 
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

        .panel-shadow {
            box-shadow: rgba(0, 0, 0, 0.3) 7px 7px 7px;
        }
        .panel-white {
          border: 0px solid #dddddd;
        }
        .panel-white  .panel-heading {
          color: #333;
          background-color: #fff;
          border-color: #ddd;
        }
        .panel-white  .panel-footer {
          background-color: #fff;
          border-color: #ddd;
        }

        .post .post-heading {
          height: 95px;
          padding: 20px 15px;
        }
        .post .post-heading .avatar {
          width: 60px;
          height: 60px;
          display: block;
          margin-right: 15px;
        }
        .post .post-heading .meta .title {
          margin-bottom: 0;
        }
        .post .post-heading .meta .title a {
          color: black;
        }
        .post .post-heading .meta .title a:hover {
          color: #aaaaaa;
        }
        .post .post-heading .meta .time {
          margin-top: 8px;
          color: #999;
        }
        .post .post-image .image {
          width: 100%;
          height: auto;
        }
        .post .post-description {
          padding: 15px;
        }
        .post .post-description p {
          font-size: 14px;
        }
        .post .post-description .stats {
          margin-top: 20px;
        }
        .post .post-description .stats .stat-item {
          display: inline-block;
          margin-right: 15px;
        }
        .post .post-description .stats .stat-item .icon {
          margin-right: 8px;
        }
        .post .post-footer {
          border-top: 1px solid #ddd;
          padding: 15px;
        }
        .post .post-footer .input-group-addon a {
          color: #454545;
        }
        .post .post-footer .comments-list {
          padding: 0;
          margin-top: 20px;
          list-style-type: none;
        }
        .post .post-footer .comments-list .comment {
          display: block;
          width: 100%;
          margin: 20px 0;
        }
        .post .post-footer .comments-list .comment .avatar {
          width: 35px;
          height: 35px;
        }
        .post .post-footer .comments-list .comment .comment-heading {
          display: block;
          width: 100%;
        }
        .post .post-footer .comments-list .comment .comment-heading .user {
          font-size: 14px;
          font-weight: bold;
          display: inline;
          margin-top: 0;
          margin-right: 10px;
        }
        .post .post-footer .comments-list .comment .comment-heading .time {
          font-size: 12px;
          color: #aaa;
          margin-top: 0;
          display: inline;
        }
        .post .post-footer .comments-list .comment .comment-body {
          margin-left: 50px;
        }
        .post .post-footer .comments-list .comment > .comments-list {
          margin-left: 50px;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

  <div class="container" style="border:1px solid black; background-color:white;">
    <div class="row" >
      <div class="col-md-12" style ="background-image:url('<?php echo e(asset('images/' . $post->image_name)); ?>'); background-size:cover; height:400px;">
      </div>

      <div class="col-md-12">
        <div row="col-md-12">
          <h1><center> <?php echo e($post->title); ?></center></h1>
          <small><p class="text-left">Posted by <kbd><?php echo $post->user->name; ?></kbd> in Category <kbd><?php echo $post->category->name; ?></kbd></p></small>
          <span><?php echo $post->body; ?></span>
        

        </div>

        <div class="col-md-4">
        <?php if($post->tag()->count() > 0): ?>
            Tags:
            <?php $__currentLoopData = $post->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tags): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <kbd><?php echo e($tags->name); ?></kbd>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php else: ?>
            no tag for this post.
        <?php endif; ?>
        </div>
        <div class="col-md-4">
        <span class="pull-right">
        <?php if($post->isLikedbyUser()): ?>
        <a href="<?php echo e(URL::to('unlike/' . $post->id )); ?>" title="Unlike it!">
        <i class="fa fa-heart" aria-hidden="true"></i> <?php echo $post->likes()->count(); ?><br/>
        </a>
        <?php else: ?>
        <a href="<?php echo e(URL::to('like/' . $post->id )); ?>" title="Like it!">
        <i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo $post->likes()->count(); ?><br/>
        </a>
        <?php endif; ?>
        </span>
        </div>
        <div class="col-md-4">
        <i class="fa fa-eye" aria-hidden="true"></i> <?php echo $post->view; ?>

        </div>        




      </div>

      <div class="col-md-12">
        <div class="panel panel-white post">
        <h4>what are you thinking about this post?</center></h4>
          <?php echo Form::open(array('action' => 'CommentController@postComment')); ?>

          <div class="post-heading">
              <div class="form-group has-feedback row <?php echo e($errors->has('title') ? ' has-error ' : ''); ?>">

              <div class="pull-left image">
                  <img src="<?php if($user->profile && $user->profile->avatar_status == 1): ?> <?php echo e($user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($user->email)); ?> <?php endif; ?>" alt="<?php echo e($user->name); ?>" class="img-circle avatar" alt="user profile image">
              </div>
              <div class="pull-left meta">

                  <div class="input-group">

                  <div class="title h5">
                      <a href="#"><b><?php echo $user->name; ?></b></a>
                  </div>
                  </div>

                    <?php echo Form::text('body', NULL, array('id' => 'body', 'class' => 'form-control', 'placeholder' => 'Be Creative :)')); ?>

                    <?php echo e(Form::hidden('invisible', $post->id, array('id' => 'post_id'))); ?>


              </div>
            </div>
          </div> 
          <?php echo Form::button('<i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;' . 'Send a comment', array('class' => 'btn btn-success btn-flat margin-bottom-1 pull-right','type' => 'submit', )); ?>

          <?php echo Form::close(); ?>    
        </div>
      </div>

      


      <?php if($post->comments()->count() > 0 ): ?>
      <div class="col-md-12">
        <div class="panel panel-white post">
        <h4>Comments about this post</center></h4>
        <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="post-heading">
                    <div class="pull-left image">
                        <img src="<?php if($comment->user->profile && $comment->user->profile->avatar_status == 1): ?> <?php echo e($comment->user->profile->avatar); ?> <?php else: ?> <?php echo e(Gravatar::get($comment->user->email)); ?> <?php endif; ?>" class="img-circle avatar" alt="user profile image">
                    </div>
                    <div class="pull-left meta">
                        <div class="title h5">
                            <a href="#"><b><?php echo $comment->user->name; ?></b></a>
                        </div>

                        <p><?php echo $comment->body; ?> </p>
                        <h6 class="text-muted time"><?php echo $comment->created_at; ?></h6>
                    </div>
                </div> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
      </div>
      <?php endif; ?>
    </div> 
</div>

<?php echo $__env->make('modals.modal-delete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

  <?php echo $__env->make('scripts.delete-modal-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>