<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="{{ asset('js/events/events.js') }}"></script>
    <title>Document</title>
</head>
<body>
    @foreach($post_images as $post_image)
        <img src="{{ $image_path . $post_image['image_name'] }}"/><br/>
        <button onclick="Events.UpdateFormAction(
            '{{ url('/events/edit/') . '/' . $post_details['id'] . '/' . $post_details['descriptions'] . '/'  }}',
            {{ $post_image['id'] }}
        )" >Remove</button><br/>
    @endforeach

    <form
        action="{{ url('/events/edit/') . '/' . $post_details['id'] . '/' . $post_details['descriptions'] . '/' }}"
        enctype="multipart/form-data"
        id="edit_event_form" method="POST">
        @csrf
        <input type="text" name="title" maxlength="200" placeholder="enter title" value="{{ $post_details['title'] }}" /> <br/>
        <input type="date" name="event_date" placeholder="enter event date" value="{{ $post_details['event_date'] }}" /><br/>
        <textarea rows="20" name="description" placeholder="enter description">{{ $description }}</textarea><br/>
        <input type="file" multiple name="images[]"><br/>
        <button>Update Post</button>
    </form>
</body>
</html>
