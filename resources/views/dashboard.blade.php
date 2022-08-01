@extends('layout')

@section('content')
{{-- FORM EDITAR --}}
    <h1>Dashboard de vendas</h1>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Tabela de vendas
                <a href="{{ url('sales') }}" class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Nova venda</a></h5>
            <form action="{{ url('/')}}" method="GET">
                <div class="form-row align-items-center">
                    <div class="col-sm-5 my-1">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Clientes</div>
                            </div>
                            <select class="form-control" id="inlineFormInputName" name="search" >
                                <option value="0">Todos Clientes</option>
                                @foreach($sale as $s)
                                <option value="{{$s->id_sale}}">{{$s->name_client}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-1 my-1">
                        <button type="submit" class="btn btn-primary" style='padding: 14.5px 16px;'>
                            <i class='fa fa-search'></i></button>
                    </div>
                </div>
            </form>
            <table class='table'>
                <tr>
                    <th scope="col">
                       <p> Produto </p>
                    </th>
                    <th scope="col">
                        <p> Data </p>
                    </th>
                    <th scope="col">
                        <p> Valor </p>
                    </th>
                    <th scope="col">
                        <p style="text-align: right">Ações</p>
                    </th>
                    <th scope="col">
                    </th>
                </tr>
                @foreach($sale as $s)
                <tr>
                    <td>
                        <p> {{$s->name_product}} <p>
                    </td>
                    <td>
                        <p> {{$s->date_sale}} <p>
                    </td>
                    <td>
                        R$ <span class="price_sale">{{(($s->price_product * $s->quantity_sale)-$s->discounts_sale)}}</span>
                    </td>
                    <td>
                        <a href="/sales/edit/{{$s->id_sale}}" class='btn btn-primary'  style=" float: left; margin-left:50px; margin-right: -30px" >Editar</a>
                    </td>
                    <td>
                        <form action="/sales/delete/{{$s->id_sale}}" method="post" class="formulario">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" style=" float: left;">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Resultado de vendas</h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        <p> Status </p>
                    </th>
                    <th scope="col">
                        <p> Quantidade </p>
                    </th>
                    <th scope="col">
                        <p> Valor Total </p>
                    </th>
                </tr>
                @foreach($results as $r)
                <tr>
                    <td>
                        <p> {{$r->status_sale}} <p>
                    </td>
                    <td>
                        <p> {{$r->total_quantity}} <p>
                    </td>
                    <td>
                       R$ <span class="price_product_total" >{{$r->price_product_total}}</span>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
{{-- FORM ADICIONAR --}}
    <div class='card mt-3'>
        <div class='card-body'>
            <h5 class="card-title mb-5">Produtos
                <a href="{{ url('products') }}" class='btn btn-secondary float-right btn-sm rounded-pill'><i class='fa fa-plus'></i>  Novo produto</a></h5>
            <table class='table'>
                <tr>
                    <th scope="col">
                        <p> Imagem </p>
                    </th>
                    <th scope="col">
                        <p> Nome </p>
                    </th>
                    <th scope="col">
                        <p> Valor </p>
                    </th>
                    <th scope="col">
                        <p style="text-align: right"> Ações </p>
                    </th>
                    <th scope="col">
                    </th>
                </tr>
                @foreach ($product as $p)
                <tr>
                    <td>
                        <img src="/storage/image/{{$p->image_product}}" style="max-width: 75px" />
                    </td>
                    <td>
                        {{$p->name_product}}
                    </td>
                    <td>
                       R$ <span class="price_product"> {{$p->price_product}}</span>
                    </td>
                    <td>
                        <a href="/products/edit/{{$p->id_product}}" class='btn btn-primary' style=" float: left; margin-left:50px; margin-right: -30px">Editar</a>
                    </td>
                    <td>
                        <form action="/products/delete/{{$p->id_product}}" method="post" class="formulario">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" style=" float: left;">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('vendor/dashboardJs/dashboard.js') }}"></script>
@endsection
