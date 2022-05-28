<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="/CSS/style.css">

    <script src="/js/script.js" defer=""></script>

    <title>World Classics</title>
</head>
<body>
    <!--  Шапка сайта  -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container">
            <a href="/" class="navbar-brand">World Classics</a>
            <ul class="navbar-nav me-auto">
                <?php if(isset($_SESSION['authorization'])): ?>
                <li>
                    <a class="nav-link" href="/profile/<?= $_SESSION['profile_link'] ?>">
                        My page
                    </a>
                </li>
                <?php if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Admin panel
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                        <?php if ($_SESSION['role'] == 1): ?>
                            <li><a class="dropdown-item" href="/admin/moderation/users">Users</a></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item" href="/admin/moderation/posts/1">Posts</a></li>
                        <li><a class="dropdown-item" href="/admin/moderation/comments">Comments</a></li>
                        <li><a class="dropdown-item" href="/admin/moderation/staticPages">Static pages</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/admin/main">Main page</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                <li>
                    <a class="nav-link" href="/<?= $_SESSION['profile_link'] ?>/subscribes">My subscribes</a>
                </li>
                <?php else:?>
                    <li>
                        <a class="nav-link" href="/registration">Sign in</a>
                    </li>
                    <li>
                        <a class="nav-link" href="/authorization">Log in</a>
                    </li>
                <?php endif;?>
                    <li class="nav-item">
                        <a class="nav-link" href="/posts/1">All posts</a>
                    </li>
                <?php if(isset($_SESSION['authorization'])): ?>
                    <li>
                        <a class="nav-link" href="/exit"><b>Exit</b></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>