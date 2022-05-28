<?php

namespace App\Services;

class UsersManager
{
	public static function pagination($kol): float|int
    {
		$arr = explode('/', $_SERVER['REQUEST_URI']); // Вычисления для пагинации
        if (count($arr) > 2) {
            $currentPage = array_pop($arr);
            return ($currentPage * $kol) - $kol;
        } else {
            return 0; 
        }
	}

    public static function setBrowserSettings(array $user)
    {
        setcookie('password', '', time() - 14800);
        setcookie('email', '', time() - 14800);

        setcookie("authorization", 'yes', time()+86400 * 30 * 12);
        $_SESSION['profile_link'] = $user['profile_link'];
        $_SESSION['userId'] = $user['id'];
        $_SESSION['role'] = $user['role_id'];
        $_SESSION['authorization'] = true;
    }

    public static function setBrowserSettingsIfError($email, $password)
    {
        setcookie("email", $email, time()+3600);
        setcookie("password", $password, time()+3600);
    }
}