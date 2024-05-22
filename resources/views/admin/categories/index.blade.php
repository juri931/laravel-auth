@extends('layouts.admin')

@section('content')
    <h2>Categorie</h2>

    <div class="d-flex my4">
        <input class="form-control me-2" type="search" placeholder="Nuova Categoria" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Invia</button>
    </div>

    <table class="table crud-table">
        <thead>
            <tr>
                <th scope="col">Categoria</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>
                        <input type="text" value="{{ $category->name }}">
                    </td>

                    <td>
                        <button class="btn btn-warning"><i class="fa-solid fa-pencil"></i></button>
                        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
