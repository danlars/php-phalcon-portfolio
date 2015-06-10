{{ content() }}
<script>

    $(document).ready(function(){
        //ID'er header, image, text
        var id = {{ item.pageTitleID }};

        //Get
        $("h1").on('click', function(){
            $.ajax({
                url: "/admin/PageApi/get/" + id,
                method: "GET",
                dataType: "json",
                success: function (data) {
                    alert(data.txt);
                }
            });
        });

        //PUT

        //DELETE


        //Show form (edit, delete)
        $('#edit').on('click', function(){
           $('#form').toggle();
        });
    });
</script>