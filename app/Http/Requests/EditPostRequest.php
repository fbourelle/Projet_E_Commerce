<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      // par exmple si l'utilisateur a l'id 1, on compare avec l'utilisateur autorisé dans l'article en cours
      // $post = Post::findOrFail($this->route('news'));
      // return $post->user_id == 1;
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
                'title' => 'required|min:5,aaaa',
                'content' => 'required|min:10'
        ];
    }
}
