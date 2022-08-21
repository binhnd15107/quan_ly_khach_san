<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>{{ $mailData['title'] }}</h2>
        <hr>
        <h2>Họ Tên : {{ $mailData['contact']['name'] }} </h2>
        <h2>Email : {{ $mailData['contact']['email'] }}</h2>
        <h3>Thời gian gửi: {{ $mailData['contact']['created_at'] }}</h3>
        <h3>Nội dung : {{ $mailData['contact']['content'] }} </h3>
    </div>
</body>

</html>
