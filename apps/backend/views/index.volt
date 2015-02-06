<!doctype html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" data-useragent="Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0)">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    {{ get_title() }}
    {{ stylesheet_link('css/foundation.min.css') }}
    {{ stylesheet_link('css/style.css') }}
    {{ javascript_include('js/vendor/modernizr.js') }}
</head>
<body>
{{ content() }}
{{ javascript_include('js/vendor/jquery.js') }}
{{ javascript_include('js/foundation.min.js') }}
<script>
    $(document).foundation();
</script>
</body>
</html>