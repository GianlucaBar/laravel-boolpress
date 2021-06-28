<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification</title>
</head>
<body>
    <h1>Ciao Admin</h1>

    <p>Un nuovo post "{{ $new_post->title }}" stato creato, clicca <a href="{{ route('admin.posts.show', ['post' => $new_post->id]) }}">QUI</a> per vedere il post</p>

    <a href=""></a>
</body>
</html>