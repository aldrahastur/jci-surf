<?php

namespace App\Http\Requests;

use App\Models\Listing;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreListingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('listing_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'tags.*' => [
                'integer',
            ],
            'tags' => [
                'array',
            ],
        ];
    }
}
