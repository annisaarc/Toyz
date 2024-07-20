@extends('partial.base')

@section('title', 'Create a Toy')

@section('content')
    <div class="row" style="min-height: 100vh">
        <div class="col-4 d-flex justify-content-center align-items-center flex-column border-1 border-end border-dark">
            <div style="max-width: 350px; max-height: 350px">
                <img class="w-100 h-100" style="display:block;" src="{{ $toy->image ? asset('img/' . $toy->image) : 'https://placehold.co/300/orange/white?text=Toy' }}"
                alt="toy-image">
            </div>
        </div>
        <div class="col-8 d-flex justify-content-center align-items-start flex-column ps-5">
            <h3 class="mb-3">Toy Detail</h3>
            <div class="mb-3">
                <h3>Name</h3>
                <p>
                    {{ $toy->name }}
                </p>
            </div>
            <div class=" mb-3">
                <h3>Category</h3>
                <p>
                    {{ $toy->category->name }}
                </p>
            </div>
            <div class="mb-3">
                <h3>Description</h3>
                <p>
                    {{ $toy->description }}
                </p>
            </div>
            <div class="mb-3">
                <h3>Price</h3>
                <p>
                    Rp {{ number_format($toy->price) }}
                </p>
            </div>
        </div>
    </div>
@endsection
