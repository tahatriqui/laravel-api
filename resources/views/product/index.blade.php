@extends("layout.index")
@section('title',"les produit")
@section("content")
<div class="mt-2 mb-5 ">
   <a href="{{ route('product.create') }}" class=" ms-3 btn btn-success">create post</a>
</div>
<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">body</th>
            <th scope="col">process</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $product )
            <tr>
                <th scope="row">{{ $product->id }}</th>
                <td >{{ $product->title }}</td>
                <td>{{ $product->body }}</td>
                <td><a href="{{ route('product.edit',$product->id)}}" class="btn btn-primary">edit</a>
                    <form method="POST" class="d-inline" action="{{ route('product.destroy',$product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">delete</button>
                    </form>
               </td>
              </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection