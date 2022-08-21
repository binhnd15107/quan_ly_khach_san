<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class voucherRequest extends FormRequest
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
                            'name' => "required|unique:discount_codes",
                            'describe' => "required",
                            'start_time' => 'required|after_or_equal:today',
                            'end_time' => 'required|after:start_time',
                            'discount_rate' => 'required|min:1|max:100',
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
                            'name' => "required|unique:discount_codes,name," . request()->id,
                            'describe' => "required",
                            'start_time' => 'required|after_or_equal:today',
                            'end_time' => 'required|after:start_time',
                            'discount_rate' => 'required|min:1|max:100',
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
            'discount_rate.required' => 'Mức giảm giá không được bỏ trống',
            'discount_rate.min' => 'Tối thiếu phải là 1',
            'discount_rate.max' => 'Không được vượt quá 100',
            'name.unique' => 'Tên đã tồn tại',
            'start_time.after_or_equal' => 'Thời gian bắt đầu phải sau hoặc bằng ngày hiện tại. ',
            'start_time.required' =>  'Thời gian bắt đầu không được bỏ trống',
            'end_time.required' => 'Thời gian kết thúc không được bỏ trống',
            'end_time.after' => 'Thời gian kết thúc không được nhỏ hơn thời gian bắt đầu !',
            'describe.required' => 'Mô tả không được bỏ trống',
        ];
    }
}
