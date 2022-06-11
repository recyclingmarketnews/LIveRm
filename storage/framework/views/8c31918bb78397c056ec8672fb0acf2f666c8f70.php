
<div class="messenger-sendCard my-sendCard">
    <form id="message-form" method="POST" action="<?php echo e(route('send.message')); ?>" enctype="multipart/form-data" style="position: absolute; top: 0;">
        <?php echo csrf_field(); ?>
        <label><span class="classsw font-size-20 fa fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled'><span class="classsw fa fa-paper-plane font-size-20"></span></button>
    </form>
</div>
<?php /**PATH /home/wu6wt82f25ae/public_html/test.recyclingmarketnews.com/resources/views/vendor/Chatify/layouts/sendForm.blade.php ENDPATH**/ ?>