<?php

namespace App\Controllers;

use App\Controllers\AbstractClasses\AbstractController;
use App\Exception\HttpException;
use App\Models\User;
use App\Services\UsersManager;
use Illuminate\Database\Capsule\Manager as Capsule;
use JetBrains\PhpStorm\NoReturn;
use Tamtamchik\SimpleFlash\Exceptions\FlashTemplateNotFoundException;
use Tamtamchik\SimpleFlash\Flash;

class UsersController extends AbstractController
{
    /**
     * @throws HttpException
     */
    #[NoReturn] public function signIn()
    {
        $flash = new Flash();
        $name = $_POST['name'] ?? null;
        $surname = $_POST['surname'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $profile_link = makeProfileLink($email);

        if (!$name || !$surname || !$email || !$password) {
            $flash->error('Data is not filled in');

            $this->redirectTo('/registration');
        }


        if (Capsule::table('users')->where('email', '=', $email)->count() !== 0)
        {
            UsersManager::setBrowserSettingsIfError($email, $password);
            $flash->error('User already exists');

            $this->redirectTo('/authorization');
        }
        
        $password = password_hash($password,PASSWORD_DEFAULT);

        $user = User::create(['role_id' => 3, 'name' => $name, 'surname' => $surname, 'description' => '', 'profile_link' => $profile_link, 'email' => $email, 'password' => $password]);

        $user = $user->toArray();

        UsersManager::setBrowserSettings($user);

        $flash->success('Successful registration!');

        $this->redirectTo('/');
    }

    /**
     * @throws FlashTemplateNotFoundException
     */
    #[NoReturn] public function logIn()
    {
        $flash = new Flash();
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$email || !$password) {
            $flash->error('Data is not filled in');

            $this->redirectTo('/authorization');
        }

        $user = User::all()->where('email', $email); // Берём данные для проверки существует ли пользователь

        foreach ($user->toArray() as $value) {
            $user = $value;
        }

        if (!is_array($user)) {
            UsersManager::setBrowserSettingsIfError($email, $password);
            $flash->error('User is not found');
            
            $this->redirectTo('/registration');
        }
            
        if (password_verify($password, $user['password']) == false) { // Сравниваем пароли
            UsersManager::setBrowserSettingsIfError($email, $password);
            $flash->error('Error! Invalid password');

            $this->redirectTo('/authorization');
        }

        UsersManager::setBrowserSettings($user); // Устанавливаем куки и значения сессии

        $flash->message('Successful login!');
        
        $this->redirectTo('/');
    }
}
