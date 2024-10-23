<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Shortener</title>
</head>
<body>
<h1>Link Shortener</h1>

<form action="{{ route('link.store') }}" method="post">
    @csrf
    <label for="url">Enter URL:</label>
    <input type="text" name="url" id="url" required>
    <button type="submit">Shorten URL</button>
</form>
</body>
</html>
