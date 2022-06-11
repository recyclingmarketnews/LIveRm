<div class="favorite-list-item">
    <div data-id="<?php echo e($user->id); ?>" data-action="0" class="avatar av-m">
        <img class="av-m" src="<?php echo e(asset('uploads/userimg/'.$user->image)); ?>" />
    </div>
    <p><?php echo e(strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name); ?></p>
</div>
<?php /**PATH /home/wu6wt82f25ae/public_html/test.recyclingmarketnews.com/resources/views/vendor/Chatify/layouts/favorite.blade.php ENDPATH**/ ?>