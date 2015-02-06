<div class="row">
    <?php echo $this->flash->output(); ?>
    <div class="large-5 large-centered medium-5 medium-centered small-12 columns">
        <fieldset>
            <legend>Administrationslogin</legend>
            <?php echo $this->tag->form(array('admin/login/validate', 'method' => 'post')); ?>

            <?php foreach ($form as $item) { ?>
                <?php if (is_a($item, 'Phalcon\Forms\Element\Hidden')) { ?>
                <?php echo $item; ?>
                <?php } else { ?>
                    <?php echo $item->Label(); ?>
                    <?php echo $item; ?>
                <?php } ?>
            <?php } ?>

            <div class="large-12 medium-12 small-12 columns">
                <?php echo $this->tag->submitButton(array('LOGIN', 'class' => 'button radius right')); ?>
            </div>
            <?php echo $this->tag->endForm(); ?>
        </fieldset>
    </div>
</div>