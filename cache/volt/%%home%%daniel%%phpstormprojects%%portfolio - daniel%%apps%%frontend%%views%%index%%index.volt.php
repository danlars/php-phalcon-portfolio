<div class="row">
    <div class="large-12 columns">
        <?php echo $this->tag->image(array('img/computer.jpg', 'alt' => 'Computer')); ?>
    </div>
</div>

<div class="row">
    <div class="large-12 medium-12 small-12 columns">
        <hr>
    </div>

    <div class="large-8 columns">
        <h4>About</h4>
        <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
        <i class="fi-social-twitter"></i>
    </div>

    <div class="large-4 columns">
        <img src="http://placehold.it/400x300&text=[img]">
    </div>
</div>

<div class="row">

    <div class="large-12 columns">
        <hr>
        <h4>Nyeste billeder</h4>

        <ul class="clearing-thumbs small-block-grid-1 medium-block-grid-2 large-block-grid-4" data-clearing>
            <?php foreach ($Billeder as $item) { ?>
            <li>
                <?php echo $this->tag->linkTo(array('img/' . $item->img, $this->tag->image(array('img/' . $item->img, 'data-caption' => '<h3>' . $item->title . '<h3>' . $item->txt)))); ?>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>