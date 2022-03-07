@extends('master')
@section('content')
    <div class="container">
        <br><h3 class="text-secondary">Cadastro de Imóvel</h3>
        <hr>
        <form method="POST" action="{{ route('property.store') }}">
            @csrf
            @if(session()->exists('message'))
              <div class="alert alert-{{ session()->get('color') }}">
                {{ session()->get('message') }}
              </div>
            @endif
            <div class="form-row">
              <div class="col-12 form-group">
                <label for="title"> Título</label>
                <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" name="title">
                @if($errors->has('title'))
                  <div class="invalid-feedback">
                    {{ $errors->first('title') }}
                  </div>
                @endif
              </div>
              <div class="col-12 form-group">
                <label for="description"> Descrição</label>
                <textarea class="form-control" name="description" rows="4"></textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="col-6 form-group">
                <label for="rental-price"> Valor Locação</label>
                <input type="text" class="form-control" name="rental_price">
              </div>
              <div class="col-6 form-group">
                <label for="sale-price"> Valor Compra</label>
                <input type="text" class="form-control" name="sale_price">
              </div>
              <button class="btn btn-dark" type="submit">Cadastrar</button>
            </div>
          </form>
    </div>
@endsection
