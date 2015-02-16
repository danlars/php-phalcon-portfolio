<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php echo $this->tag->getTitle(); ?>
    <?php echo $this->tag->stylesheetLink('css/foundation.min.css'); ?>
    <?php echo $this->tag->stylesheetLink('css/style.css'); ?>
    <?php echo $this->tag->javascriptInclude('js/vendor/modernizr.js'); ?>
</head>
<body>
<?php echo $this->getContent(); ?>
<?php echo $this->tag->javascriptInclude('js/vendor/jquery.js'); ?>
<?php echo $this->tag->javascriptInclude('js/foundation.min.js'); ?>
<script>
    $(document).foundation();
    $(".linkTxt").on('click', function(){
        $(this).closest(".large-12").find(".hideTxt").toggle();
    });

    $(".notRead").on('click', function(){
        $.get('editMsg/' + $(this).attr('data'));
        $(this).contents().unwrap()
    });
</script>
</body>
</html>