<style>
    table, th, td {
    border: 1px solid;
    padding: 6px;
    width="100px"
    class="table table-stripped"
    scope="col
    scope"row";
    }
</style>

@extends('partial.base')

@section('title', 'Home Page')

@section('style')
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')

    <div class="w-100 d-flex justify-content-center align-items-center flex-column gap-4" style="min-height: 50vh">
        <h3 class="fw-semibold">Want to Order a New Toy?</h3>
        <div class="w-50">
            {{-- Search form --}}
            <form action="{{ route('home.search') }}" class="d-flex justify-content-center align-items-center gap-4">
                @csrf
                <input type="text" class="form-control" placeholder="Search for a toy ..." name="keyword"
                    value="{{ $search ?? '' }}">
                <button class="btn btn-outline-dark">Search</button>
            </form>

        </div>
    </div>

    <h3 class="mb-4">Recomendation</h3>
    <div class="d-flex justify-content-around align-items-center flex-wrap gap-4 my-5">


        <table class="table table-bordered">
            <thead>
                <tr class="table-dark">
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($toys as $toy)
                <tr>
                    <td>{{ $toy->name }}</td>
                    <td>{{ $toy->description }}</td>
                    <td class="text-semibold text-danger">Rp {{ number_format($toy->price) }}</td>
                    <td>
                        <img style="width: 150px; height: 150px display:block;" src="{{ $toy->image ? asset('img/' . $toy->image) : 'https://placehold.co/400/blue/white?text=Toy' }}" alt="toy-image">
                    </td>
                    <td>
                        <a class="btn btn-primary btn-lg active"href="{{ route('toy.detail', $toy->id) }}">Detail</a>
                        <a class="btn btn-Success btn-lg active" href="{{ route('toy.order', $toy->id) }}">Order</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
