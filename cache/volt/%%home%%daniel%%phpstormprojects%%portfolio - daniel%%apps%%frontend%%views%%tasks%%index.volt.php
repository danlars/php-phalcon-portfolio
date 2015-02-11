
<div class="row">

    <dl class="sub-nav"> <dt>Kategorier:</dt>
        <dd <?php if ($pageID == 0) { ?> class="active" <?php } ?> ><?php echo $this->tag->linkTo(array('tasks/index/', 'Alle')); ?></dd>

        <?php foreach ($newsTitle as $titlePage) { ?>
            <dd <?php if ($titlePage->titleID == $pageID) { ?> class="active" <?php } ?> >
                <?php echo $this->tag->linkTo(array('tasks/index/' . $titlePage->titleID, $titlePage->title)); ?>
            </dd>
        <?php } ?>

    </dl>
</div>

<?php $v118271808908843380361iterator = $page->items; $v118271808908843380361incr = 0; $v118271808908843380361loop = new stdClass(); $v118271808908843380361loop->length = count($v118271808908843380361iterator); $v118271808908843380361loop->index = 1; $v118271808908843380361loop->index0 = 1; $v118271808908843380361loop->revindex = $v118271808908843380361loop->length; $v118271808908843380361loop->revindex0 = $v118271808908843380361loop->length - 1; ?><?php foreach ($v118271808908843380361iterator as $item) { ?><?php $v118271808908843380361loop->first = ($v118271808908843380361incr == 0); $v118271808908843380361loop->index = $v118271808908843380361incr + 1; $v118271808908843380361loop->index0 = $v118271808908843380361incr; $v118271808908843380361loop->revindex = $v118271808908843380361loop->length - $v118271808908843380361incr; $v118271808908843380361loop->revindex0 = $v118271808908843380361loop->length - ($v118271808908843380361incr + 1); $v118271808908843380361loop->last = ($v118271808908843380361incr == ($v118271808908843380361loop->length - 1)); ?>

    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <hr>
        </div>

        <div class="large-8 <?php if ($v118271808908843380361loop->index % 2 == 0) { ?>right<?php } ?> columns">
            <h4><?php echo $item->title; ?></h4>
            <p>
                <?php echo $item->txt; ?>
                <?php echo $this->tag->linkTo(array('tasks/article/' . $item->newsID, 'Læs mere')); ?>
            </p>
        </div>

        <div class="large-4 columns">
            <?php echo $this->tag->image(array('img/' . $item->img, 'alt' => $item->title)); ?>
        </div>
    </div>
<?php $v118271808908843380361incr++; } ?>
<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <hr/>
        <ul class="pagination">
            <li class="arrow <?php if ($page->current <= 1) { ?>unavailable <?php } ?>">
                <?php echo $this->tag->linkTo(array('tasks/index/' . $pageID . '?page=' . $page->before, '&laquo')); ?>
            </li>
            <?php $v118271808908843380361iterator = range(1, $page->total_pages); $v118271808908843380361incr = 0; $v118271808908843380361loop = new stdClass(); $v118271808908843380361loop->length = count($v118271808908843380361iterator); $v118271808908843380361loop->index = 1; $v118271808908843380361loop->index0 = 1; $v118271808908843380361loop->revindex = $v118271808908843380361loop->length; $v118271808908843380361loop->revindex0 = $v118271808908843380361loop->length - 1; ?><?php foreach ($v118271808908843380361iterator as $i) { ?><?php $v118271808908843380361loop->first = ($v118271808908843380361incr == 0); $v118271808908843380361loop->index = $v118271808908843380361incr + 1; $v118271808908843380361loop->index0 = $v118271808908843380361incr; $v118271808908843380361loop->revindex = $v118271808908843380361loop->length - $v118271808908843380361incr; $v118271808908843380361loop->revindex0 = $v118271808908843380361loop->length - ($v118271808908843380361incr + 1); $v118271808908843380361loop->last = ($v118271808908843380361incr == ($v118271808908843380361loop->length - 1)); ?>
            <li <?php if ($page->current == $i) { ?> class="current" <?php } ?>>
                <?php echo $this->tag->linkTo(array('tasks/index/' . $pageID . '?page=' . $i, $i)); ?>
            </li>
            <?php $v118271808908843380361incr++; } ?>

            <li class="arrow <?php if ($page->current == $page->total_pages) { ?>unavailable <?php } ?>">
                <?php echo $this->tag->linkTo(array('tasks/index/' . $pageID . '?page=' . $page->next, '&raquo')); ?>
            </li>
        </ul>
    </div>
</div>