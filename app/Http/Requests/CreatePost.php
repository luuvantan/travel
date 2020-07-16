<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePost extends FormRequest
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
            'category_id' =>'required',
            'provincial_id' =>'required',
            'place' =>'required',
            'title' => 'required|unique:posts|max:255',
            'image' => 'image|mimes:jpeg,jpg,png,gif|required|max:5120'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Thể loại không được để trống',
            'provincial_id.required' => 'Địa điểm không được để trống',
            'place.required' => 'Địa danh cụ thể không được để trống',
            'title.required' => 'Tiêu đề không được để trống',
            'image.required' => 'Ảnh tiêu đề không được để trống',
            'image.image' => 'Ảnh tiêu đề phải là ảnh',
            'image.mimes' => 'Ảnh tiêu đề phải đúng định dạng'
        ];
    }
}
