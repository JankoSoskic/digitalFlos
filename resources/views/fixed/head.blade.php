
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="@yield("keywords")"/>
<meta name="description" content="@yield("desc")"/>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="{{asset("assets/css/style.css")}}" type="text/css" rel="stylesheet">
<link rel="shortcut icon" href="{{asset("assets/images/icon.ico")}}"/>
<title>@yield("title")</title>
