<?php

namespace App\Controllers\Networking;

use App\Models\User;

class SendMessage
{
    public static function sendEmail($title, $description, $postId)
    {
        $emails = User::where('id', $_SESSION['userId'])->first()->subscribers->toArray();

        $profile_link = User::where('id', $_SESSION['userId'])->pluck('profile_link')->all()[0];

        foreach ($emails as $email) {
            $log = 'Mail to ' . $email['email'] . PHP_EOL;
            $log .= 'User ' . $profile_link . ' added a new article: ' . $title . PHP_EOL;

            $log .= 'New review: ' . $title . PHP_EOL;
            $log .= cutString($description, 30) . PHP_EOL;
            $log .= 'Read more: https://localhost/post/' . $postId . PHP_EOL;
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/log.txt', $log . PHP_EOL, FILE_APPEND);
        }
    }
}