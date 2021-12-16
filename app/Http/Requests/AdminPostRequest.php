<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminPostRequest extends FormRequest
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
        $this->post ??= new Post();

        return [
            'title' => 'required',
            'user_id' => Rule::exists('users', 'id'),
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($this->post)],
            'thumbnail' => $this->post->exists ? 'image' : 'required|image',
            'excerpt' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'status_id' => Rule::exists('statuses', 'id'),
            'body' => 'required'
        ];
    }
}
