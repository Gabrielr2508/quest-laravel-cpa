<?php

namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;

class CoordenadorRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
          'coordenador_id' => 'required|string',
      ];
    }

    public function messages(){
      return [
        'required' => 'A :attribute é obrigatória.',
        'string' => 'A :attribute precisa ser string.',
      ];
    }
}