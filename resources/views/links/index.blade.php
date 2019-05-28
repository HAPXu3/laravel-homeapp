@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
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
                            </thead>
                            <tbody>
                            @foreach ($links as $link)
                                <tr>
                                    <td class="table-text"><div><a href="{{ $link->url }}" target="_blank">{{ $link->name }}</a></div></td>
                                    <td class="table-text"><div>{{ $link->description }}</div></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
