<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
{
    public function authorize()
     {
         return true;
     }

     public function rules()
     {
         return [
             'email' => 'required|email|max:255|unique:subscribes'
         ];
     }
 
     public function messages()
     {
         return [
             'email.required' => 'Введите Вашу почту!',
             'email.email' => 'Ваша почта некорректна!',
             'email.max' => 'Ваша почта слишком длинная!',
             'email.unique' => 'Вы уже подписаны на нашу рассылку!',
         ];
     }
}
