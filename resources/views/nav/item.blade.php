@extends('partial.base')

@section('title', 'Item')

@section('content')

    <h3 class="mb-4">Choose Your Item</h3>
    <div class="d-flex justify-content-around align-items-center flex-wrap gap-4">
        {{-- Menu Makanan 1 --}}
        @foreach ($toys as $toy)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                    src="{{ $toy->image ? asset('img/' . $toy->image) : 'https://placehold.co/400/orange/white?text=toy' }}"
                    alt="toy-image">
                <div class="card-body">
                    <span class="badge text-bg-primary">{{ $toy->category->name }}</span>
                    <h5 class="card-title">{{ $toy->name }}</h5>
                    <p class="card-text">{{ Str::limit($toy->description, 150, '...') }}</p>
                    <p class="text-semibold text-danger">Rp {{ number_format($toy->price) }}</p>
                    <div class="d-flex w-100 justify-content-around align-items-center">
                        <a class="link-dark link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                            href="{{ route('toy.detail', $toy) }}">
                            Detail
                        </a>
                        <a href="#" class="btn btn-dark">Order</a>
                    </div>
                </div>
            </div>
        @endforeach
        {{ $toys->links() }}
    </div>
@endsection
