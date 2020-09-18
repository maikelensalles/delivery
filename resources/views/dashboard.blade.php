@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Carrinho</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $carrinho->sum('quantidade') }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                        <i class="ni ni-cart"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Total de Vendas</h5>
                                    <span class="h2 font-weight-bold mb-0">$ {{ $vendas->sum('total') }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Usuários Cadastrados</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $cliente->count('id') }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>    
<div class="container-fluid mt--7">
    <div class="header-body">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Pedidos</h3>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Total Pago</th>
                                    <th scope="col">Troco</th>
                                    <th scope="col">Tipo-Pagamento</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Pago</th>
                                    <th scope="col" width="100">Observação</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($vendas as $venda)
                                    <tr>
                                        <td>{{ $venda->nome_cliente }}</td>
                                        <td>{{ $venda->total }}</td>
                                        <td>{{ $venda->total_pago }}</td>
                                        <td>{{ $venda->troco }}</td>
                                        <td>{{ $venda->tipo_pgto }}</td>
                                        <td>{{ $venda->data }}</td>
                                        <td>{{ $venda->hora }}</td>
                                        <td>{{ $venda->status }}</td>
                                        <td>{{ $venda->pago }}</td>
                                        <td>{{ $venda->obs }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (isset($filters))
                        {!! $vendas->appends($filters)->links() !!}
                        @else
                        {!! $vendas->links() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush