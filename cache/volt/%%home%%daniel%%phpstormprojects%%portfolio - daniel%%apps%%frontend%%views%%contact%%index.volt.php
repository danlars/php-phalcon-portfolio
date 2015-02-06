<div class="row">
    <div class="large-6 medium-6 small-12 columns">
    <?php echo $this->tag->form(array('contact/send', 'method' => 'post')); ?>
        <?php foreach ($form as $item) { ?>
            <div class="large-12 columns">
                <?php echo $item->Label(); ?>
                <?php echo $item; ?>
            </div>
        <?php } ?>
        <div class="large-12 medium-12 small-12 columns">
            <?php echo $this->tag->submitButton(array('SEND', 'class' => 'button radius right')); ?>
        </div>
    <?php echo $this->tag->endForm(); ?>

    </div>
</div>