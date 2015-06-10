{{ content() }}
<script>
    $(document).foundation();
    $(".linkTxt").on('click', function(){
        $(this).closest(".large-12").find(".hider").toggle();
    });

    $(".notRead").on('click', function(){
        $.get('editMsg/' + $(this).attr('data'));
        $(this).contents().unwrap()
    });
</script>