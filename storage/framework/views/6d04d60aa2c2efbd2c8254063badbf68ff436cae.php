    <section class="content-header">
      <h1>
        Create New Post
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="active"><i class="fa fa-dashboard"></i> Home</a></li>

      </ol>
    </section>
    <br/>
<div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo $users->count(); ?></h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $posts->count(); ?></h3>

              <p>Posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-paper-outline"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>          
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $categories->count(); ?></h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-albums-outline"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $tags->count(); ?></h3>

              <p>Tags</p>
            </div>
            <div class="icon">
              <i class="ion ion-pin"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?php echo $likes->count(); ?></h3>

              <p>Likes</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-favorite"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo $counter; ?></h3> 

              <p>View of posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-black">
            <div class="inner">
              <h3><?php echo $counter; ?></h3> 

              <p>View of posts</p>
            </div>
            <div class="icon">
              <i class="ion ion-eye"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>        
        <!-- ./col -->
      </div>
<?php

    $levelAmount = 'level';

    if (Auth::User()->level() >= 2) {
        $levelAmount = 'levels';

    }

?>

<div class="row">
<div class="panel panel-primary <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?> panel-info  <?php endif; ?>">
    <div class="panel-heading">

        Welcome <?php echo e(Auth::user()->name); ?>


        <?php if (Auth::check() && Auth::user()->hasRole('admin', true)): ?>
            <span class="pull-right label label-primary" style="margin-top:4px">
            Admin Access
            </span>
        <?php else: ?>
            <span class="pull-right label label-warning" style="margin-top:4px">
            User Access
            </span>
        <?php endif; ?>

    </div>
    <div class="panel-body">
        <h2 class="lead">
            <?php echo e(trans('auth.loggedIn')); ?>

        </h2>
        <p>
            <em>Thank you</em> for checking this project out. <strong>Please remember to star it!</strong>
        </p>

        <p>
            <iframe src="https://ghbtns.com/github-btn.html?user=jeremykenedy&repo=laravel-auth&type=star&count=true" frameborder="0" scrolling="0" width="170px" height="20px" style="margin: 0px 0 -3px .5em;"></iframe>
        </p>

        <p>
            This page route is protected by <code>activated</code> middleware. Only accounts with activated emails are able pass this middleware.
        </p>
        <p>
            <small>
                Users registered via Social providers are by default activated.
            </small>
        </p>

        <hr>

        <h4>
            You have
                <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>
                   Admin
                <?php endif; ?>
                <?php if (Auth::check() && Auth::user()->hasRole('user')): ?>
                   User
                <?php endif; ?>
            Access
        </h4>

        <hr>

        <h4>
            You have access to <?php echo e($levelAmount); ?>:
            <?php if (Auth::check() && Auth::user()->level() >= 5): ?>
                <span class="label label-primary margin-half">5</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 4): ?>
                <span class="label label-info margin-half">4</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 3): ?>
                <span class="label label-success margin-half">3</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 2): ?>
                <span class="label label-warning margin-half">2</span>
            <?php endif; ?>

            <?php if (Auth::check() && Auth::user()->level() >= 1): ?>
                <span class="label label-default margin-half">1</span>
            <?php endif; ?>
        </h4>

        <?php if (Auth::check() && Auth::user()->hasRole('admin')): ?>

            <hr>

            <h4>
                You have permissions:
                <?php if (Auth::check() && Auth::user()->hasPermission('view.users')): ?>
                    <span class="label label-primary margin-half margin-left-0"">
                        <?php echo e(trans('permsandroles.permissionView')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('create.users')): ?>
                    <span class="label label-info margin-half margin-left-0"">
                        <?php echo e(trans('permsandroles.permissionCreate')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('edit.users')): ?>
                    <span class="label label-warning margin-half margin-left-0"">
                        <?php echo e(trans('permsandroles.permissionEdit')); ?>

                    </span>
                <?php endif; ?>

                <?php if (Auth::check() && Auth::user()->hasPermission('delete.users')): ?>
                    <span class="label label-danger margin-half margin-left-0"">
                        <?php echo e(trans('permsandroles.permissionDelete')); ?>

                    </span>
                <?php endif; ?>

            </h4>

        <?php endif; ?>

    </div>
</div>
</div>