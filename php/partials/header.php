<?php

    namespace partials;

    use lib\Msg;
    use lib\Auth;

    // 後々引数を渡したいので関数化しておく
    function header()
    {
        ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo BASE_CSS_PATH ?>style.css">
</head>

<body>
<div id="container">
    <header class="container my-2">
        <nav class="row align-items-center py-2">
            <a href="<?php the_url('/');?>"
                class="col-md d-flex align-items-center mb-3 mb-md-0"
            >
                <img width="50" class="mr-2" src="" alt="" />
                <span class="h2 font-weight-bold mb-0"
                    >みんなのアンケート</span
                >
            </a>
            <div class="col-md-auto">
                <?php if(Auth::isLogin()) :  ?>
                    <!-- ログイン中 -->
                        <a href="<?php the_url('topic/create');?>" class="btn btn-primary mr-2">投稿</a>
                        <a href="<?php the_url('topic/archive');?>" class="mr-2">過去の投稿</a>
                        <a href="<?php the_url('logout');?>" class="mr-2">ログアウト</a>
                    <?php else : ?>
                        <!-- ログインしている時と出し分ける -->
                        <a href="<?php the_url('register');?>" class="btn btn-primary mr-2">登録</a>
                        <a href="<?php the_url('register');?>">ログイン</a>
                <?php endif ; ?>
            </div>
        </nav>
    </header>
    <main class="container py-3">
    <?php
                    Msg::flush();
    }
    ?>
