@extends('layouts.admin')

@section('content')
<div class="content">
    <h3 class="page-title">@lang('quickadmin.results.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($results) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                   
                        <th>@lang('quickadmin.results.fields.user')</th>
                    
                        <th>@lang('quickadmin.results.fields.date')</th>
                        <th>Result</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @if (count($results) > 0)
                        @foreach ($results as $result)
                            <tr>
                           
                                <td>{{ $result->user->name}} ({{ $result->user->email}})</td>
                           
                                <td>{{ $result->created_at }}</td>
                                <td>{{ $result->result }}/10</td>
                                <td>
                                    <a href="{{ route('admin.results.show',[$result->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
