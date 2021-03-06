@extends('layouts.app_admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categoria: {{ $category->name }} </h1>

    <div class="row">

        <!-- Data Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Creata</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $category->created_at->format('d/m/Y') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Prodotti contenuti
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ count($category->products) }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-10">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Prodotti
                        <span class="badge badge-primary align-top">{{ count($category->products) }}</span>
                    </h6>
                </div>
                <div class="card-body">
                    @if ($category->products->count() != 0)
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0" style="text-align: center;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Aggiunto</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($category->products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->created_at }}</td>
                                </tr>
                                @empty
                                {{-- <p>Nessun prodotto selezionato</p> --}}
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p>Nessun prodotto selezionato</p>
                    @endif

                </div>
            </div>
        </div>

        {{-- <div class="col-md-4">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cliente
                        <span class="badge badge-primary align-top" style="font-size: 14px">
                            {{ $order->user->name }} {{ $order->user->surname }}
        </span>
        </h6>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <li class="list-group-item list-group-item-light text-dark border-bottom-0">Email:
                <a href="mailto:{{ $order->user->email }}">
                    {{ $order->user->email }}
                </a>
            </li>
            <li class="list-group-item list-group-item-light text-dark border-bottom-0">Account registrato:
                {{ $order->user->created_at }}</li>
            <li class="list-group-item list-group-item-light text-dark">Ordini effettuati:
                {{ $order->user->orders->count() }}</li>
        </ul>
    </div>
</div>
</div> --}}
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection