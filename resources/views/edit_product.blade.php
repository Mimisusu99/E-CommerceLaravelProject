<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit {{$product->name}}</title>
</head>
<body>
    <form action="{{route('update_product', $product)}}" method="post" enctype="multipart/form-data">
        @method(patch)
        @csrf
        <label for="">Name</label>
        <br>
        <input type="text" name="name" value="{{$product->name}}">
        <br>
        <Label for="">Description</Label>
        <br>
        <input type="text" name="description" value="{{$product->description}}">
        <br>
        <Label for="">Price</Label>
        <br>
        <input type="number" name="price" value={{$product->price}}>
        <br>
        <Label for="">Stock</Label:for>
        <br>
        <input type="number" name="stock" value={{$product->stock}}>
        <br>
        <label for="">Image</label>
        <br>
        <input type="file" name="image">
        <br>
        <button type="submit">Update data</button>
    </form>
</body>
</html>