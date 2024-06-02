@extends('home')

@section('content')
<div class="container">
    <h1>Search Results</h1>
    @if($products->isEmpty() && $spareparts->isEmpty())
        <p>No results found.</p>
    @else
        @if(!$products->isEmpty())
            <h2>Products:</h2>
            <ul>
                @foreach($products as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </ul>
        @endif
        @if(!$spareparts->isEmpty())
            <h2>Spare Parts:</h2>
            <ul>
                @foreach($spareparts as $sparepart)
                    <li>{{ $sparepart->name }}</li>
                @endforeach
            </ul>
        @endif
    @endif
</div>
@endsection
