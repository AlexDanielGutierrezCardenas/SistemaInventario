@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Products</h2>
                @can('product-create')
                    <a class="btn btn-success" href="{{ route('products.create') }}">Create New Product</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <label>{{ $message }}</label>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Details</th>
                <th scope="col" width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->detail }}</td>
                    <td>
                        <div class="d-flex gap-2" role="group" aria-label="User Actions">
                            <a class="btn btn-primary flex-fill" href="{{ route('products.show', $product->id) }}">Show</a>
                            @can('product-edit')
                                <a class="btn btn-success flex-fill" href="{{ route('products.edit', $product->id) }}">Edit</a>
                            @endcan
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-flex flex-fill">
                                @csrf
                                @method('DELETE')
                                @can('product-delete')
                                    <button type="submit" class="btn btn-danger flex-fill">Delete</button>
                                @endcan
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No records found</td>
                </tr>
            @endforelse

        </tbody>
    </table>

    {!! $products->links() !!}
@endsection
