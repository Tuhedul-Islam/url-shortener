<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Shortener</title>
</head>
<body>
<h1>URL Shortener</h1>
<p>{{ request()->getSchemeAndHttpHost() }}/{{ $link->short_url }}</p>
<a href="{{ $originalUrl }}" target="new">Click to go Original Url</a>

</body>
</html>
