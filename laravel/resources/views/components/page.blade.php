
<html lang="en">
<head>
    <meta charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PPQTPP - cause we can</title>
    <meta name="description" content="Presentation Participant Question Tool Program Potato">
    <meta name="author" content="ppqtpp">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    @stack('styles')
    @stack('scripts')
</head>

<body>
    {{$slot}}
</body>
</html>
