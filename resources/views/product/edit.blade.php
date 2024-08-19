@extends("layout.index")
@section('title',"editer un produit")
@section("content")
<form method="POST" action="{{ route('product.update',$product->id) }}">
    @csrf
    @method("PUT")
    <div class="form-group">
      <label for="title"> title</label>
      <input type="text" class="form-control w-50" id="title" value="{{ $product->title }}"  name="title" placeholder="Enter title">
    </div>
    <div class="form-group">
      <label for="body">body</label>
      <input type="text" class="form-control w-50" id="body" value="{{ $product->body }}" name="body" placeholder="enter body">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection