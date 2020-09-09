@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
       
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Algo aqui</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Algo  aqui</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Algo aqui</th>
                                    <th scope="col">Algo aqui</th>
                                    <th scope="col">Algo aqui</th>
                                    <th scope="col">Algo aqui</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        Algo aqui
                                    </th>
                                    <td>
                                        ..
                                    </td>
                                    <td>
                                        ..
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Algo aqui
                                    </th>
                                    <td>
                                        ....
                                    </td>
                                    <td>
                                        ...
                                    </td>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Algo aqui
                                    </th>
                                    <td>
                                        ....
                                    </td>
                                    <td>
                                        ...
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Algo aqui
                                    </th>
                                    <td>
                                        ...
                                    </td>
                                    <td>
                                        ...
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        Algo aqui
                                    </th>
                                    <td>
                                        ...
                                    </td>
                                    <td>
                                        ...
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Algo aqui</h6>
                                <h2 class="mb-0">Algo aqui</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush