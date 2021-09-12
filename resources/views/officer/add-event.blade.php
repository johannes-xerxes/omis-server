<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data" action="{{ route('add-event') }}">
        @csrf
{{--        MAKE SURE THE LIMIT OF THE TITLE WONT GO BEYOND 200--}}
        <input type="text" name="title" placeholder="enter title" maxlength="200"/><br/>
        <input type="date" name="event_date" placeholder="enter event date"/><br/>
        <textarea type="text" rows="20" name="description" placeholder="enter description"></textarea><br/>
        <input type="file" multiple name="images[]"><br/>
        <button>Submit</button>
    </form>
</body>
</html>
