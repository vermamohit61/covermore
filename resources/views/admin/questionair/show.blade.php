@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.lead.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.leads.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $lead->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $lead->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $lead->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $lead->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $lead->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.gender') }}
                                    </th>
                                    <td>
                                        {{ App\Lead::GENDER_SELECT[$lead->gender] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.date_of_birthday') }}
                                    </th>
                                    <td>
                                        {{ $lead->date_of_birthday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $lead->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $lead->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lead.fields.reference_number') }}
                                    </th>
                                    <td>
                                        {{ $lead->reference_number }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.leads.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection