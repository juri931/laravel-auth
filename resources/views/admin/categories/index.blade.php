@extends('layouts.admin')

@section('content')
    <h2>Categorie</h2>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="my-4">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="d-flex">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Nuova Categoria" name="name">
            <button class="btn btn-outline-success" type="submit">Invia</button>
        </form>
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
                        <form
                            action="{{ route('admin.categories.update', $category) }}"
                            method="POST"
                            id="form-edit-{{ $category->id }}">
                            @csrf
                            @method('PUT')
                            <input type="text" value="{{ $category->name }}">
                        </form>
                    </td>

                    <td>
                        <button
                            class="btn btn-warning"
                            onclick="submitForm({{ $category->id }})">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function submitForm(id) {
            const form = document.getElementById(`form-edit-${id}`);
            form.submit();
        }
    </script>
@endsection
