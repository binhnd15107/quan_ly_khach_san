<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class typeRoomRequest extends FormRequest
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
        // dd($currentAction);
        switch ($this->method()):
            case 'POST':
                switch ($currentAction) {
                    case 'store':
                        $rules = [
                            'name' => "required|unique:type_rooms",
                            'price' => "required|numeric|min:1",
                            'describe' => "required",
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
                            'name' => "required|unique:type_rooms,name," . request()->id,
                            'price' => "required|numeric|min:1",
                            'describe' => "required",
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
            'name.unique' => 'Tên đã tồn tại',
            'price.required' => 'name không được bỏ trống',
            'price.min' => 'Tối thiếu phải là 1',
            'price.numeric' => 'Giá phải là dạng số',
            'describe.required' => 'Mô tả không được bỏ trống',
        ];
    }
}
