<?php

namespace App\Http\Requests;

use App\Lead;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreLeadRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('lead_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'first_name'       => [
                'min:2',
                'max:50',
                'required',
            ],
            'last_name'        => [
                'min:2',
                'max:50',
            ],
            'mobile'           => [
                'min:10',
                'max:15',
            ],
            'date_of_birthday' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
