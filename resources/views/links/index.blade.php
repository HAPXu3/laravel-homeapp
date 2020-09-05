@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    New Link
                </div>

                <div class="panel-body">
                    @include('common.errors')

                    <form action="{{ url('link') }}" method="POST">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="link-name" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="link-name" class="form-control" value="{{ old('name') }}">
                            </div>

                            <label for="link-url" class="col-sm-3 control-label">Url</label>

                            <div class="col-sm-6">
                                <input type="text" name="url" id="link-url" class="form-control" value="{{ old('url') }}">
                            </div>

                            <label for="link-description" class="col-sm-3 control-label">Description</label>

                            <div class="col-sm-6">
                                <input type="text" name="description" id="link-description" class="form-control" value="{{ old('description') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus fa-lg"></i> Add Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (count($links) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Stored Links
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                            <th>Link</th>
                            <th>Description</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach ($links as $link)
                                <tr>
                                    <td class="table-text"><div><a href="{{ $link->url }}" target="_blank">{{ $link->name }}</a></div></td>
                                    <td class="table-text"><div>{{ $link->description }}</div></td>
                                    <td>
                                        <form action="{{url('link/' . $link->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-task-{{ $link->id }}" class="btn btn-danger">
                                                <i class="fa fa-trash-o fa-lg"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
            {{--<link-list v-bind:items="[
            {id: 5, name: 'локалхост', description: 'локалхост', url: 'http://laravel.homestead/links'},
            {id: 10, name: 'Хабр', description: 'Хабрахабр', url: 'http://habr.com'},
            {id: 11, name: 'sdfsf', description: 'kjhghjkhk', url: 'http://habr.com'},
            {id: 12, name: 'sdfsdf', description: 'kugkjhkkmk', url: 'http://habr.com'},
            {id: 13, name: 'ssssd', description: ',nm,n,nb,', url: 'http://habr.com'},
            {id: 14, name: 'Хаvvvvvcvxvбр', description: ',bn,,kghjkhk', url: 'http://habr.com'},
            {id: 15, name: 'xcvxcvxv', description: 'kjhghjkgjkhgkj', url: 'http://habr.com'},
            {id: 16, name: 'kjklylj', description: 'knbmbnmnm', url: 'http://habr.com'},
            {id: 17, name: 'Хhjklgjkgkjабр', description: 'fjgjhjgn', url: 'http://habr.com'},
            {id: 18, name: 'ghkgjkgjkhg', description: 'jhgfghnbv', url: 'http://habr.com'},
            {id: 19, name: 'ghkghkgk', description: 'jhgfghjfhfjh', url: 'http://habr.com'}
            ]"></link-list>--}}
            <link-list v-bind:items="{{ $jsonLinks }}"></link-list>
        </div>
    </div>
@endsection
