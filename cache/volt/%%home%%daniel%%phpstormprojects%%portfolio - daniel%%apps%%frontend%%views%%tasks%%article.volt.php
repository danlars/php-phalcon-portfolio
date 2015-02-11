<div class="row">
    <dl class="sub-nav"> <dt>Kategorier:</dt>
        <dd><?php echo $this->tag->linkTo(array('tasks/index/', 'Alle')); ?></dd>

        <?php foreach ($newsTitle as $titlePage) { ?>
            <dd <?php if ($titlePage->titleID == $newsArticle->newsTitleID) { ?> class="active" <?php } ?> >
                <?php echo $this->tag->linkTo(array('tasks/index/' . $titlePage->titleID, $titlePage->title)); ?>
            </dd>
        <?php } ?>
    </dl>
    <hr/>
</div>

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <h1><?php echo $newsArticle->title; ?></h1>
        </div>
        <div class="large-12 medium-12 small-12 columns">
            <div class="right large-5 medium-5 small-12">
                <ul class="small-block-grid-1">
                    <li>
                        <?php echo $this->tag->image(array('img/' . $newsArticle->img, 'alt' => $newsArticle->title, 'class' => 'th')); ?>
                    </li>
                </ul>
            </div>
            <?php echo $newsArticle->txt; ?>
        </div>
</div>

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <hr/>
        <ul class="small-block-grid-4">
            <?php foreach ($articles as $item) { ?>
            <li>
                <?php echo $this->tag->linkTo(array('tasks/article/' . $item->newsID, $this->tag->image(array('img/' . $item->img, 'alt' => $item->title, 'class' => 'th')))); ?>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>