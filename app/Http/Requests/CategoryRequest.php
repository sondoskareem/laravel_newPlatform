<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use LaravelLocalization;
class CategoryRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if(request()->id){

            $rule['img'] = 'required|image|mimes:jpeg,png,jpg,gif|max:10048';
            $rule['name'] ='required|string|min:2|max:191';
            $rule['parent_id'] ='nullable|exists:categories,id';
                

        }else{
            
            $rule['img'] = 'required|image|mimes:jpeg,png,jpg,gif|max:10048';
            $rule['name'] ='required|string|min:2|max:191';
            $rule['parent_id'] ='nullable|exists:categories,id';

        }

        return $rule;
    
    }
}
