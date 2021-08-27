@extends('adminlte::page')

@section('title', 'Permissões do perfil {$profile->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
    </ol>
    <h1>Permissões do perfil <strong>{{ $profile->name }}</strong>
        <a href="{{ route('profiles.create') }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> ADD NOVA PERMISSÃO</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action=" {{ route('profiles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="250">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            {{ $permission->name }}
                        </td>
                        <td>
                            {{-- <a href="{{ route('details.plan.index', $profile->url) }}" class="btn btn-primary">Detalhes</a> --}}
                            <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
