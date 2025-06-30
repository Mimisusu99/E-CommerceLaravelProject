<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>
<body>
@csrf
<form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="description" placeholder="Description"><br>
    <input type="number" name="price" placeholder="Price"><br>
    <input type="number" name="stock" placeholder="Stock"><br>
    <input type="text" name="image"><br>
    <button type="submit">Submit data</button>
</form>    
</body>
</html>