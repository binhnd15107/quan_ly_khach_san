<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bannerRequest extends FormRequest
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
                            'image' => 'required|mimes:jpeg,png,jpg|max:10000',
                            'bannerable_id' => "required",
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
                            'image' => 'mimes:jpeg,png,jpg|max:10000',
                            'bannerable_id' => "required",
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

            'bannerable_id.required' => 'Thành phần không được bỏ trống',
            'image.mimes' => 'Sai định dạng !',
            'image.required' => 'Banner không được bỏ trống !',
            'image.max' => 'Dung lượng ảnh không được vượt quá 10MB !',

        ];
    }
}
