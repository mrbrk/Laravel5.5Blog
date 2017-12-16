<?php
	$data = \risul\LaravelLikeComment\Controllers\LikeController::getLikeViewData($like_item_id);
?>
<div class="laravel-like">
	<i id="<?php echo e($like_item_id); ?>-like"
	   class="icon <?php echo e($data[$like_item_id.'likeDisabled']); ?> <?php echo e($data[$like_item_id.'likeIconOutlined']); ?> laravelLike-icon thumbs up"
	   data-item-id="<?php echo e($like_item_id); ?>"
	   data-vote="1">
    </i>
	<span id="<?php echo e($like_item_id); ?>-total-like"><?php echo e($data[$like_item_id.'total_like']); ?></span>
	<i id="<?php echo e($like_item_id); ?>-dislike"
	   class="icon <?php echo e($data[$like_item_id.'likeDisabled']); ?> <?php echo e($data[$like_item_id.'dislikeIconOutlined']); ?> laravelLike-icon thumbs down"
	   data-item-id="<?php echo e($like_item_id); ?>"
	   data-vote="-1">
   </i>
   <span id="<?php echo e($like_item_id); ?>-total-dislike"><?php echo e($data[$like_item_id.'total_dislike']); ?></span>
</div>
