@extends('layout')

@section('content')
{{-- FORM EDITAR --}}
@if(Request::is('*/edit/*'))
    <h1>Editar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{ url('products/update') }}/{{ $edit->id_product }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name_product">Nome do produto</label>
                    <input type="text" class="form-control @error('name_product') is-invalid @enderror" id="name_product" name="name_product" value="{{ $edit->name_product }}">
                    @error('name_product')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description_product">Descrição</label>
                    <textarea type="text" rows='5' class="form-control @error('description_product') is-invalid @enderror" id="description_product" name="description_product" value="{{ $edit->description_product }}"></textarea>
                    @error('description_product')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price_product">Preço</label>
                    <input type="text" class="form-control price @error('price_product') is-invalid @enderror" id="price_product" name="price_product" placeholder="100,00 ou maior (Lembre-se de adicionar o valor ate as casas decimais)" value="{{ $edit->price_product }}" >
                    @error('price_product')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                <div class="form-group">
                    <label for="image_product">Imagem Do Produto (jpg, jpeg)</label>
                    <input type="file" class="form-control-file  @error('image_product') is-invalid @enderror" id="image_product" name="image_product" value="{{ $edit->image_product}}">
                    @error('image_product')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
{{-- FORM ADICIONAR --}}
@else
    <h1>Adicionar</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{ url('products') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name_product">Nome do produto</label>
                    <input type="text" class="form-control @error('name_product') is-invalid @enderror" id="name_product" name="name_product" value="{{ old('name_product') }}">
                    @error('name_product')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description_product">Descrição</label>
                    <textarea type="text" rows='5' class="form-control @error('description_product') is-invalid @enderror" id="description_product" name="description_product" ></textarea>
                    @error('description_product')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price_product">Preço</label>
                    <input type="text" class="form-control price @error('price_product') is-invalid @enderror" id="price_product" name="price_product" placeholder="100,00 ou maior (Lembre-se de adicionar o valor ate as casas decimais)" value="{{ old('price_product') }}">
                    @error('price_product')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image_product">Imagem Do Produto (jpg, jpeg)</label>
                    <input type="file" class="form-control-file" id="image_product" name="image_product"  >
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endif
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-mask/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('vendor/productJs/product.js') }}"></script>
@endsection
