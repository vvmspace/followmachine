@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Key</th>
                            <th scope="col">Secret</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($apps as $app)
                            <tr>
                                <td>{{ $app->id }}</td>
                                <td>{{ $app->name }}</td>
                                <td>{{ $app->description }}</td>
                                <td>{{ $app->key }}</td>
                                <td>{{ $app->secret }}</td>
                                <td>  <a href="{{ route('apps.edit', ['app' => $app->id])  }}" class="btn btn-default rb" role="button">Редактировать</a>
                                    {!! Form::open( ['method' => 'delete', 'url' => route('apps.destroy', ['app' => $app->id]), 'style' => 'display: inline', 'onSubmit' => 'return confirm("Вы уверены, что хотите удалить?")']) !!}
                                    <button type="submit" class="btn btn-danger rb">Удалить</button>
                                    {!! Form::close() !!}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection