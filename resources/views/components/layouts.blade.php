<!DOCTYPE html>
<html lang="ar" dir="rtl" data-theme="slack">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(  ['resources/css/app.css' , 'resources/js/app.js'])
</head>
<body class="max-w-4xl mx-auto px-4 ">
    

@stack('scripts')

{{ $slot }}

<div class="mt-4">



</div>


</body>
</html>