<h1>Product And Form</h1>
@if ($errors->any())
 @foreach($errors->all() as $error)
   <div class="w-full bg-red-500 text-white p-4">{{$error}}</div>
 @endforeach
@endif

@if(session()->has('successMessage'))
<div class = "">{{ session()->get('successMessage')}}</div>
@endif

<form action="/photo/store" method="post" enctype="multipart/form-data">
@csrf
<label for="">Product ID</label>
<input type="text" name="photo_id" id="">

<label for="">Product File</label>
<input type="file" name="photo" id="">

<input type="submit" value="submit">
</form>