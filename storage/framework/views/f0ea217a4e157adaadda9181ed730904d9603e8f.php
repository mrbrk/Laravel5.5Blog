<?php
$GLOBALS['commentDisabled'] = "";
if(!Auth::check())
    $GLOBALS['commentDisabled'] = "disabled";
$GLOBALS['commentClass'] = -1;
?>
<div class="laravelComment" id="laravelComment-<?php echo e($comment_item_id); ?>">
    <h3 class="ui dividing header">Comments</h3>
    <div class="ui threaded comments" id="<?php echo e($comment_item_id); ?>-comment-0">
        <button class="ui basic small submit button" id="write-comment" data-form="#<?php echo e($comment_item_id); ?>-comment-form">Write comment</button>
        <form class="ui laravelComment-form form" id="<?php echo e($comment_item_id); ?>-comment-form" data-parent="0" data-item="<?php echo e($comment_item_id); ?>" style="display: none;">
            <div class="field">
                <textarea id="0-textarea" rows="2" <?php echo e($GLOBALS['commentDisabled']); ?>></textarea>
                <?php if(!Auth::check()): ?>
                    <small>Please Log in to comment</small>
                <?php endif; ?>
            </div>
            <input type="submit" class="ui basic small submit button" value="Comment" <?php echo e($GLOBALS['commentDisabled']); ?>>
        </form>
<?php
$GLOBALS['commentVisit'] = array();

function dfs($comments, $comment){
    $GLOBALS['commentVisit'][$comment->id] = 1;
    $GLOBALS['commentClass']++;
?>
    <div class="comment show-<?php echo e($comment->item_id); ?>-<?php echo e((int)($GLOBALS['commentClass'] / 5)); ?>" id="comment-<?php echo e($comment->id); ?>">
        <a class="avatar">
            <img src="<?php echo e($comment->avatar); ?>">
        </a>
        <div class="content">
            <a class="author" url="<?php echo e(isset($comment->url) ? $comment->url : ''); ?>"> <?php echo e($comment->name); ?> </a>
            <div class="metadata">
                <span class="date"><?php echo e($comment->updated_at->diffForHumans()); ?></span>
            </div>
            <div class="text">
                <?php echo e($comment->comment); ?>

            </div>
            <div class="actions">
                <a class="<?php echo e($GLOBALS['commentDisabled']); ?> reply reply-button" data-toggle="<?php echo e($comment->id); ?>-reply-form">Reply</a>
            </div>
            <?php echo e(\risul\LaravelLikeComment\Controllers\CommentController::viewLike('comment-'.$comment->id)); ?>

            <form id="<?php echo e($comment->id); ?>-reply-form" class="ui laravelComment-form form" data-parent="<?php echo e($comment->id); ?>" data-item="<?php echo e($comment->item_id); ?>" style="display: none;">
                <div class="field">
                    <textarea id="<?php echo e($comment->id); ?>-textarea" rows="2" <?php echo e($GLOBALS['commentDisabled']); ?>></textarea>
                    <?php if(!Auth::check()): ?>
                        <small>Please Log in to comment</small>
                    <?php endif; ?>
                </div>
                <input type="submit" class="ui basic small submit button" value="Comment" <?php echo e($GLOBALS['commentDisabled']); ?>>
            </form>
        </div>
        <div class="comments" id="<?php echo e($comment->item_id); ?>-comment-<?php echo e($comment->id); ?>">
<?php
    foreach ($comments as $child) {
        if($child->parent_id == $comment->id && !isset($GLOBALS['commentVisit'][$child->id])){
            dfs($comments, $child);
        }
    }
    echo "</div>";
    echo "</div>";
}

$comments = \risul\LaravelLikeComment\Controllers\CommentController::getComments($comment_item_id);
foreach ($comments as $comment) {
    if(!isset($GLOBALS['commentVisit'][$comment->id])){
        dfs($comments, $comment);
    }
}
?>
    </div>
    <button class="ui basic button" id="showComment" data-show-comment="0" data-item-id="<?php echo e($comment_item_id); ?>">Show comments</button>
</div>
