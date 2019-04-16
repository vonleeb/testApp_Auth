<div class="navigation">
    <div class="row">
        <div class="col-md-7">
            <?php if (! \App\Controllers\Auth::isLogin()):?>
            <a class="btn btn-default" href="/register/user" role="button">Регистрация</a>
            <a class="btn btn-default" href="/user/login" role="button">Авторизация</a>
            <?php else :?>
                <?php if (isset($_SESSION['controller']['fio']))
                { echo htmlspecialchars('You are logged in as ' . $_SESSION['controller']['fio']);};?>
            <a class="btn btn-default" href="/user/logout" role="button">Выйти</a>
            <?php endif;?>
        </div>
        <div class="col-md-5">
            <p class="text-info">
                <?php if (isset($message)) :
                    foreach ($message as $msg) :?>
                        <?=$msg?>
                        <br>
                    <?php endforeach;?>
                <?php endif;?>
            </p>
        </div>
    </div>
</div>
