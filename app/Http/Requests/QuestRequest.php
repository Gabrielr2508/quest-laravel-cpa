<?php

namespace estoque\Http\Requests;

use estoque\Http\Requests\Request;

class QuestRequest extends Request
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
          'quest1' => 'required|string|max:1',
          'quest2' => 'required|string|max:1',
          'quest3' => 'required|string|max:1',
          'quest4' => 'required|string|max:1',
          'quest5' => 'required|string|max:1',
          'quest6' => 'required|string|max:1',
          'quest7' => 'required|string|max:1',
          'quest8' => 'required|string|max:1',
          'quest9' => 'required|string|max:1',
          'quest10' => 'required|string|max:1',
          'quest11' => 'required|string|max:1',
          'quest12' => 'required|string|max:1',
          'quest13' => 'required|string|max:1',
          'quest14' => 'required|string|max:1',
          'quest15' => 'required|string|max:1',
      ];
      return [];
    }

    public function messages(){
      return [
        'required' => 'A :attribute é obrigatória.',
        'numeric' => 'A :attribute precisa ser numérica.',
        'max' => 'A :attribute precisa ter no máximo :max caracter.'
      ];
    }
}
