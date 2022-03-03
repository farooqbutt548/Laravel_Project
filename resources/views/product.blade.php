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
    <form action="{{route('uploadproduct')}}" method="POST" enctype="multipart/form-data" ><br>
        @csrf
        Product Name : <input type="text" name="name" placeholder="Product Name..."><br><br>
        Description : <input type="text" name="description" placeholder="Description..."><br><br>
        File :<input type="file" name="file"><br><br>
        <input type="submit">
        <a href="{{route('showproduct')}}" >Show Product</a>
    </form>
</body>
</html>
