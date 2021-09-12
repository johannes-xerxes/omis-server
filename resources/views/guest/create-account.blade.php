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
    <form method="POST" action="{{ route('create-account') }}">
        @csrf
        <input type="text" name="first_name" placeholder="enter first name" autocomplete="off"><br/>
        <input type="text" name="middle_name" placeholder="enter middle name" autocomplete="off"><br/>
        <input type="text" name="last_name" placeholder="enter last name" autocomplete="off"><br/>
        <input type="text" name="email" placeholder="enter email" autocomplete="off"><br/>
        <input type="password" name="password" placeholder="enter password"><br/>
        <input type="password" name="confirm_password" placeholder="confirm your password"><br/>
        <button>Create account</button>
    </form>
</body>
</html>
