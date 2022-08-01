@extends('layout')
@section('content')

@if(Request::is('*/edit/*'))
    <h1>Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{url('sales/update') }}/{{ $edit->id_sale }}" method="post">
                @csrf
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="name_client">Nome do cliente</label>
                    <input type="text" class="form-control @error('name_client') is-invalid @enderror" id="name_client" name="name_client" value="{{$edit->name_client}}" >
                    @error('name_client')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email_client">Email</label>
                    <input type="text" class="form-control @error('email_client') is-invalid @enderror" id="email_client" name="email_client" value="{{ $edit->email_client }}" >
                    @error('email_client')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cpf_client">CPF</label>
                    <input type="text" class="form-control cpf @error('cpf_client') is-invalid @enderror" id="cpf_client" name="cpf_client" placeholder="99999999999" value="{{ $edit->cpf_client }}">
                    @error('cpf_client')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product_id">Produto</label>
                    <select id="product_id" name="product_id" class="form-control" >
                        <option selected>Escolha...</option>
                        @foreach($editProduct as $p)
                        <option value="{{$p->id_product}}">{{$p->name_product}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_sale">Data</label>
                    <input type="date" class="form-control @error('date_sale') is-invalid @enderror" id="date_sale" name="date_sale" value="{{ $edit->date_sale }}" >
                    @error('date_sale')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity_sale">Quantidade</label>
                    <input type="text" class="form-control @error('quantity_sale') is-invalid @enderror" id="quantity_sale" name="quantity_sale" placeholder="1 a 10" value="{{ $edit->quantity_sale }}" >
                    @error('quantity_sale')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="discounts_sale">Desconto</label>
                    <input type="text" class="form-control discounts @error('discounts_sale') is-invalid @enderror" id="discounts_sale" name="discounts_sale" placeholder="99,99 ou menor" value="{{ $edit->discounts_sale }}">
                    @error('discounts_sale')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_sale">Status</label>
                    <select id="status_sale" name="status_sale" class="form-control">
                        <option selected>Escolha...</option>
                        <option value="Aprovado">Aprovado</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="Devolvido">Devolvido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@else
    <h1>Adicionar</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{ url('sales') }}" method="post">
                @csrf
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="name_client">Nome do cliente</label>
                    <input type="text" class="form-control @error('name_client') is-invalid @enderror" id="name_client" name="name_client" value="{{ old('name_client') }}" >
                    @error('name_client')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email_client">Email</label>
                    <input type="text" class="form-control @error('email_client') is-invalid @enderror" id="email_client" name="email_client" value="{{ old('email_client') }}">
                    @error('email_client')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cpf_client">CPF</label>
                    <input type="text" class="form-control cpf @error('cpf_client') is-invalid @enderror" id="cpf_client" name="cpf_client" placeholder="99999999999" value="{{ old('cpf_client') }}">
                    @error('cpf_client')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <h5 class='mt-5'>Informações da venda</h5>
                <div class="form-group">
                    <label for="product_id">Produto</label>
                    <select id="product_id" name="product_id" class="form-control" >
                        <option selected>Escolha...</option>
                        @foreach($product as $p)
                        <option value="{{$p->id_product}}">{{$p->name_product}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="date_sale">Data</label>
                    <input type="date" class="form-control @error('date_sale') is-invalid @enderror" id="date_sale" name="date_sale" value="{{ old('date_sale') }}" >
                    @error('date_sale')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="quantity_sale">Quantidade</label>
                    <input type="number" class="form-control @error('quantity_sale') is-invalid @enderror" id="quantity_sale" name="quantity_sale" placeholder="1 a 10" value="{{ old('quantity_sale') }}" >
                    @error('quantity_sale')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="discounts_sale">Desconto</label>
                    <input type="text" class="form-control discounts @error('discounts_sale') is-invalid @enderror" id="discounts_sale" name="discounts_sale" placeholder="99,99 ou menor" value="{{ old('discounts_sale') }}">
                    @error('discounts_sale')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_sale">Status</label>
                    <select id="status_sale" name="status_sale" class="form-control">
                        <option selected>Escolha...</option>
                        <option value="Aprovado">Aprovado</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="Devolvido">Devolvido</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endif
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('vendor/salesJs/sales.js') }}">
        
    </script>
@endsection
