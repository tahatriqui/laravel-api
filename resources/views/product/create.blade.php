@extends("layout.index")
@section('title',"creer un produit")
@section("content")
<form method="POST" action="{{ route('product.store') }}">
    @csrf
    <div class="form-group">
      <label for="title"> title</label>
      <input type="text" class="form-control w-50" id="title"  name="title" placeholder="Enter title">
    </div>
    <div class="form-group">
      <label for="body">body</label>
      <input type="text" class="form-control w-50" id="body" name="body" placeholder="enter body">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection