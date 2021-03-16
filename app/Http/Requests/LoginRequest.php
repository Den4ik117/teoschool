<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
     public function authorize()
     {
         return true;
     }

     public function rules()
     {
         return [
             'login' => 'required',
             'password' => 'required'
         ];
     }
 
     public function messages()
     {
         return [
             'login.required' => 'Поле «Логин» является обязательным!',
             'password.required' => 'Поле «Пароль» является обязательным!',
         ];
     }
}
