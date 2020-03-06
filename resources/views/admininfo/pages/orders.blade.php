@extends('admininfo/main')
@section('content')
    <div class="main-content-container container-fluid px-4">
        <!-- Page Header -->
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <table class="table table-bordered table-dark">
                    <thead>
                    <tr>
                        <th scope="col">Nr.</th>
                        <th scope="col">Vardas</th>
                        <th scope="col">Paštas</th>
                        <th scope="col">Tel. nr</th>
                        <th scope="col">Adresas</th>
                        <th scope="col">Kiekis</th>
                        <th scope="col">Statusas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->progress}}</td>
                            <td>
                                @if($order->progress == "Naujas")
                                    <a href="/order/{{$order->id}}">Ruošti</a>
                                    @elseif($order->progress == "Ruošiamas")
                                    <a href="/order/{{$order->id}}">Siųsti</a>
                                    @endif
                            </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
