<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class serviceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'add':
                        $rules = [
                            'name' => "required|unique:services",
                            'image' => 'required|required|mimes:jpeg,png,jpg|max:10000',
                            'describe' => "required",
                            'price' => "required|numeric|min:1",
                        ];
                        break;
                    default:
                        break;
                }
                break;
            case 'PUT':
                switch ($currentAction) {
                    case 'edit':
                        $rules = [
                            'name' => "required|unique:services,name," . request()->id,
                            'describe' => "required",
                            'price' => "required|numeric|min:1",
                        ];
                        break;
                    default:
                        break;
                }
                break;
            default:
                break;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được bỏ trống',
            'price.required' => 'Giá không được bỏ trống',
            'price.min' => 'Tối thiếu phải là 1',
            'price.numeric' => 'Giá phải là dạng số',
            'name.unique' => 'Tên đã tồn tại',
            'image.mimes' => 'Sai định dạng !',
            'image.required' => 'Ảnh không được bỏ trống !',
            'image.max' => 'Dung lượng ảnh không được vượt quá 10MB !',
            'describe.required' => 'Mô tả không được bỏ trống',
        ];
    }
}
