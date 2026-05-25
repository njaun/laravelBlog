<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? "Emuārs" }}</title>
</head>
<body>
    <x-navigation></x-navigation>
      {{ $slot }}
</body>
</html>