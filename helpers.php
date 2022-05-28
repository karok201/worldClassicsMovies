<?php

function array_get(array $data, string $key, $default = null)
{
    if (!strpos($key, '.')) {
        return $data[$key] ?? $default;
    }

    $keys = explode('.', $key);
    foreach ($keys as $key) {
        if (is_array($data[$key]) || array_key_exists($key, $data)) {
            $data = $data[$key];
        } else {
            return $default;
        }
    }
    return $data;
}

function cutString ($line, $length = 12, $appends = '...' ) : string
{
    if (strlen($line) > $length) {
        $lineCut = substr($line, 0, $length);
        return $lineCut . $appends;
    } else {
        return $line;
    }
}

function makeProfileLink($email): string
{
    $arr = explode('@', $email);
    return ltrim($arr[0]);
}

function loadPhoto (string $type,int $id)
{
    // Название <input type="file">
    $input_name = $type;

// Разрешенные расширения файлов.
    $allow = array();

// Запрещенные расширения файлов.
    $deny = array(
        'phtml', 'php', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'cgi', 'pl', 'asp',
        'aspx', 'shtml', 'shtm', 'htaccess', 'htpasswd', 'ini', 'log', 'sh', 'js', 'html',
        'htm', 'css', 'sql', 'spl', 'scgi', 'fcgi', 'exe'
    );

// Директория куда будут загружаться файлы(и удаляем файлы);
    if ($type == 'avatar') {
        $imgLink = '/img/avatars/user-' . $id . '.jpg';
        unset($imgLink);
        $path = $_SERVER['DOCUMENT_ROOT'] . '/img/avatars/';
    } elseif($type == 'post') {
        $imgLink = '/img/posts/post-' . $id . '.jpg';
        unset($imgLink);
        $path = $_SERVER['DOCUMENT_ROOT'] . '/img/posts/';
    }

    $data = array();

    if (!isset($_FILES[$input_name])) {
        $error = 'Файлы не загружены.';
    } else {
        // Преобразуем массив $_FILES в удобный вид для перебора в foreach.
        $files = array();
        $diff = count($_FILES[$input_name]) - count($_FILES[$input_name], COUNT_RECURSIVE);
        if ($diff == 0) {
            $files = array($_FILES[$input_name]);
        } else {
            foreach($_FILES[$input_name] as $k => $l) {
                foreach($l as $i => $v) {
                    $files[$i][$k] = $v;
                }
            }
        }

        foreach ($files as $file) {
            $error = $success = '';

            // Проверим на ошибки загрузки.
            if (!empty($file['error']) || empty($file['tmp_name'])) {
                $error = 'Не удалось загрузить файл.';
            } elseif ($file['tmp_name'] == 'none' || !is_uploaded_file($file['tmp_name'])) {
                $error = 'Не удалось загрузить файл.';
            } else {
                // Оставляем в имени файла только буквы, цифры и некоторые символы.
                $pattern = "[^a-zа-яё0-9,~!@#%^-_\$\?\(\)\{\}\[\]\.]";
                if ($type == 'avatar') {
                    $name = 'user-' . $id . '.jpg';
                } elseif ($type == 'post') {
                    $name = 'post-' . $id . '.jpg';
                }
                $parts = pathinfo($name);

                if (empty($name) || empty($parts['extension'])) {
                    $error = 'Недопустимый тип файла';
                } elseif (!empty($allow) && !in_array(strtolower($parts['extension']), $allow)) {
                    $error = 'Недопустимый тип файла';
                } elseif (!empty($deny) && in_array(strtolower($parts['extension']), $deny)) {
                    $error = 'Недопустимый тип файла';
                } else {
                    // Перемещаем файл в директорию.
                    if (move_uploaded_file($file['tmp_name'], $path . $name)) {
                        // Далее можно сохранить название файла в БД и т.п.
                        $success = 'Файл «' . $name . '» успешно загружен.';
                    } else {
                        $error = 'Не удалось загрузить файл.';
                    }
                }
            }

            if (!empty($success)) {
                $data[] = '<p style="color: green">' . $success . '</p>';
            }
            if (!empty($error)) {
                $data[] = '<p style="color: red">' . $error . '</p>';
            }
        }
    }
}