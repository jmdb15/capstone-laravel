<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php print_r($posts) @endphp
    <br><br><br>
    @foreach ($posts as $post)
        {{-- @php echo ($post->comments); @endphp --}}
        {{ $post->comments }}
        {{-- @foreach ($post->comments as $comment)
            {{  $comment }}
            <br>
        @endforeach --}}
        <br>
    @endforeach
</body>
</html>