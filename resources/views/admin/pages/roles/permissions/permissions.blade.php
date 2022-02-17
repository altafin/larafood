@extends('adminlte::page')

@section('title', 'Permissões do cargo {$role->name}')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('roles.index') }}" class="active">Perfis</a></li>
    </ol>
    <h1>Permissões do cargo <strong>{{ $role->name }}</strong>

        <a href="{{ route('roles.permissions.available', $role->id) }}" class="btn btn-dark"><i class="fas fa-plus-square"></i> ADD NOVA PERMISSÃO</a>
    </h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($permissions as $permission)
                    <tr>
                        <td>
                            {{ $permission->name }}
                        </td>
                        <td>
                            {{-- <a href="{{ route('details.plan.index', $role->url) }}" class="btn btn-primary">Detalhes</a> --}}
                            <a href="{{ route('roles.permission.detach', [$role->id, $permission->id]) }}" class="btn btn-danger">DESVINCULAR</a>
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
