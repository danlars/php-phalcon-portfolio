<?php $sideNav = array('index' => 'Indbakke', 'sentMsgs' => 'Sendte beskeder', 'delMsgs' => 'Slettede beskeder'); ?>

<div class="row">
    <h1>Feedback</h1>

    <div class="large-3 medium-3 small-12 columns">
        <ul class="side-nav">
            <?php foreach ($sideNav as $key => $value) { ?>
                <?php if ($key == $this->router->getActionName()) { ?>
                    <li>
                        <strong><?php echo $this->tag->linkTo(array('admin/contact/' . $key, $value)); ?></strong>
                    </li>
                <?php } else { ?>
                    <li><?php echo $this->tag->linkTo(array('admin/contact/' . $key, $value)); ?></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </div>

    <div class="large-9 medium-9 small-12 columns">

        <?php foreach ($contacts as $item) { ?>
            <hr/>
            <div class="large-12 medium-12 small-12 columns">

                <h4 class="linkTxt" title="<?php echo $item->email; ?>" >
                    <?php if ($item->status == 'N') { ?>
                        <strong data="<?php echo $item->id; ?>" class="notRead">
                            <?php echo $item->fullname; ?>
                            <span class="right"><?php echo $item->dato; ?></span>
                        </strong>
                    <?php } else { ?>
                        <?php echo $item->fullname; ?>
                        <span class="right"><?php echo $item->dato; ?></span>
                    <?php } ?>
                </h4>

                <span class="hideTxt">
                    <div class="large-12 medium-12 small-12 columns">
                        <h5 class="subheader">
                            <?php echo $item->title; ?>
                        </h5>
                        <?php echo $item->txt; ?>
                    </div>
                </span>
            </div>

        <?php } ?>
    </div>
</div>