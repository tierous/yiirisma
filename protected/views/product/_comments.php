<?php foreach ($comments as $comment): ?>
    <div class="comment">
        <div class="author">
            <?php echo CHtml::encode($comment->customer_id); ?>:
        </div>
        <div class="time">
            on <?php echo date('F j, Y \a\t h:i a', strtotime($comment->date_added));
            ?>
        </div>
        <div class="content">
    <?php echo nl2br(CHtml::encode($comment->comment_text)); ?>
        </div>
        <hr>
    </div><!-- comment -->
<?php endforeach; ?>