<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'login' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'agree' => 'accepted',
            'password' => 'required|min:6|confirmed|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле «Имя» является обязательным!',
            'name.max' => 'Поле «Имя» слишком длинное!',
            'surname.required' => 'Поле «Фамилия» является обязательным!',
            'surname.max' => 'Поле «Фамилия» слишком длинное!',
            'login.required' => 'Поле «Логин» является обязательным!',
            'login.unique' => 'Пользователь с таким логином уже существует!',
            'login.max' => 'Поле «Логин» слишком длинное!',
            'email.required' => 'Поле «Почта» является обязательным!',
            'email.unique' => 'Пользователь с такой почтой уже существует!',
            'email.max' => 'Поле «Почта» слишком длинное!',
            'agree.accepted' => 'Чтобы зарегистрироваться, вы должны дать согласие на обработку Ваших данных!',
            'password.required' => 'Поле «Пароль» является обязательным!',
            'password.min' => 'Поле «Пароль» должно быть не короче 6-ти символов!',
            'password.confirmed' => 'Пароли не совпадают!',
            'password.max' => 'Слишком длинный пароль',
        ];
    }
}
