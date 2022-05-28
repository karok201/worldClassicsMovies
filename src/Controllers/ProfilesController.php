<?php

namespace App\Controllers;

use App\Controllers\AbstractClasses\AbstractController;
use App\Models\Subscribers;
use App\Models\User;
use JetBrains\PhpStorm\NoReturn;
use Tamtamchik\SimpleFlash\Flash;

class ProfilesController extends AbstractController
{
    #[NoReturn] public function edit()
    {
        $flash = new Flash();
        $name = $_POST['name'] ?? null;
        $id = (int)$_POST['id'] ?? null;
        $surname = $_POST['surname'] ?? null;
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;
        $profile_link = makeProfileLink($email);

        if (!$name || !$surname || !$email || !$password) {
            $flash->error('Something went wrong');

            $this->redirectTo('/');
        }

        $pass = User::where('id', $id)->pluck('password')->all();

        if (password_verify($password, $pass[0]) == false) {
            $flash->error('Invalid password');

            $this->redirectTo('/profile/' . $profile_link);
        }

        if ((isset($_FILES['avatar'])) && ($_FILES['avatar']['size'] < 2097152)) {
            loadPhoto('avatar', $id);
        }

        $_SESSION['profile_link'] = $profile_link;
        User::where('id', $id)->update(['name' => $name, 'surname' => $surname, 'email' => $email, 'description' => '', 'profile_link' => $profile_link]);

        $flash->success('Successful change!');

        $this->redirectTo('/profile/' . $profile_link);
    }

    #[NoReturn] public function subscribe()
    {
        $authorId = (int)$_POST['authorId'] ?? null;
        $authorProfileLink = $_POST['authorProfileLink'] ?? null;

        if (!$authorId || !$authorProfileLink) {
            Flash::error('Something went wrong');

            $this->redirectTo('/');
        }

        Subscribers::create(['subscriber_id' => $_SESSION['userId'], 'author_id' => $authorId]);

        Flash::success('You have successfully subscribed!');
        $this->redirectTo('/profile/' . $authorProfileLink);
    }

    #[NoReturn] public function unSubscribe()
    {
        $authorId = (int)$_POST['authorId'] ?? null;
        $authorProfileLink = $_POST['authorProfileLink'] ?? null;

        if (!$authorId || !$authorProfileLink) {
            Flash::error('Something went wrong');

            $this->redirectTo('/');
        }

        Subscribers::where(['subscriber_id' => $_SESSION['userId'], 'author_id' => $authorId])->delete();

        Flash::warning('You have successfully unsubscribed!');

        $this->redirectTo('/profile/' . $authorProfileLink);
    }

    #[NoReturn] public function changeRole()
    {
        var_dump($_POST);
        User::where('id', (int)$_POST['id'])->update(['role_id' => (int)$_POST['roleId']]);

        Flash::success('Role successfully changed!');

        $this->redirectTo('/admin/moderation/users');
    }

    #[NoReturn] public function unAuthorize()
    {
        setcookie('authorization', '', time() - 14800);
        session_destroy();

        $this->redirectTo('/');
    }
}
