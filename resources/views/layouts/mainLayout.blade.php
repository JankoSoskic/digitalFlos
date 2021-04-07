<!doctype html>
<html lang="en">
<head>
   @include("fixed.head")
</head>
<body class="bg-light">
    @include("fixed.nav")
    @include("partials.greske")
    @yield("content")

    @include("fixed.footer")
    @include("fixed.scripts")
</body>
</html>
