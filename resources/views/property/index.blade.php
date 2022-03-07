@extends('master')
@section('content')
    <div class="container my-3">
        <h3 class="text-muted">Listagem de Imóveis</h3>
        <hr>
        <table class="table table-bordered table-striped table-hover">
            <thead class="bg-secondary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição do Imóvel</th>
                <th scope="col">Valor de Locação</th>
                <th scope="col">Valor de Venda</th>
                <th scope="col" class="text-center">Opções de Manipulação</th>
            </tr>
            </thead>

      
            <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <th scope="row">{{  $property->id }}</th>
                        <td>{{  $property->title}}</td>
                        <td>{{  $property->description}}</td>
                        <td>R$ {{ number_format($property->rental_price, 2, ',', '.') }}</td>
                        <td>R$ {{ number_format($property->sale_price, 2, ',', '.')}}</td>
                        <td class="d-flex justify-content-space-beetween">
                            <a class="btn btn-sm btn-outline-secondary pl-3 pr-3 ml-3" href="{{ route('property.edit', ['name' => $property->name_uri])}}" role="button">Editar</a>
                            <form action="{{ route('property.destroy', ['name' => $property->name_uri])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-sm btn-outline-danger pl-2 ml-3" role="button">Remover</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
