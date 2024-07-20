@extends('partial/base')

@section('title', 'Invoice')

@section('style')
    {{-- bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection

@section('content')
    <div class="card my-5 p-3">
        <div class="card-body">
            <div class="col-md-12">
                <div class="col-6">
                    <h3 class="fw-bold">Invoice ID : Invoice ID</h3>
                </div>
                <div class="text-center">
                    <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <ul class="list-unstyled">
                        <li class="text-muted">To: <span class="fw-bold">Username</span></li>
                        <li class="text-muted">payment: <span class="fw-bold">Cash</span></li>
                        <li class="text-muted"><i class="fas fa-phone"></i> Date: <span class="fw-bold">12-12-2024</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row my-2 mx-1 justify-content-center">
                <table class="table table-striped table-borderless">
                    <thead style="background-color:#84B0CA ;" class="text-white text-center">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Title</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>Heloo</td>
                            <td>Heloo</td>
                            <td>Heloo</td>
                            <td>Heloo</td>
                            <td>Heloo</td>
                        </tr>
                        <tr>
                            <td>Heloo</td>
                            <td>Heloo</td>
                            <td>Heloo</td>
                            <td>Heloo</td>
                            <td>Heloo</td>
                        </tr>
                        <tr>
                            <td>Heloo</td>
                            <td>Heloo</td>
                            <td>Heloo</td>
                            <td>Heloo</td>
                            <td>Heloo</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between text-muted ms-3"><span
                                class="text-black me-4">Total</span>Rp 5000}</li>
                        <li class="d-flex justify-content-between text-muted ms-3 mt-2"><span
                                class="text-black me-4">Delivery Fee</span>Rp 5000</li>
                        <li class="d-flex justify-content-between text-muted ms-3 mt-2"><span
                                class="text-black me-4">Administration Fee</span>Rp 5000</li>
                    </ul>
                </div>
                <h3 class="text-black float-start fw-bold d-flex justify-content-between">
                    <span class="text-black me-3"> Total Price</span>
                    <span style="font-size: 25px;">Rp 50000</span>
                </h3>
            </div>
        </div>
    </div>
@endsection
