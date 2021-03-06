<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroRequest extends FormRequest
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
            'Titulo'    =>'required|max:50',
            'Ano'       =>'required|size:4',
            'CDU'       =>'required|max:20',
            'CDD'       =>'required|max:10',
            'ISBN'      =>'required|max:13',
            'NumEdicao' =>'required|max:3',
            'NumVolume' =>'required|max:3',
            'IdAutor'   =>'required',
            'IdEditora' =>'required',
            'IdGenero'  =>'required',
            'codLivro'  =>'required',
          
            
        ];
    }
    public function messages(){
            return [
                'Titulo.max'=>'O titulo não pode ter mais que 50 caracteres.',
                'IdAutor.required'=>"Selecione um Autor.",
                'IdGenero.required'=>"Selecione um Genero.",
                'IdEditora.required'=>"Selecione uma Editora.", 
                '*.required'=> 'O campo :attribute não pode ficar vazio.',
                'Ano.size' =>  'O campo :attribute deve ter 4 caracteres.',
                
            ];
    }
}
