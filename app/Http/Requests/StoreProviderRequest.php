<?php

namespace App\Http\Requests;

use App\Provider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreProviderRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('provider_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'    => [
                'min:2',
                'max:50',
            ],
            'website' => [
                'min:5',
                'max:100',
            ],
        ];
    }
}
