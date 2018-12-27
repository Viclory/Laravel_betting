<div class="simple-popup authorization hidden">
    <p class="h2" data-text="Авторизация">Авторизация</p>
    <div class="max-w">
        <form class="form login-form" id="login_form" action="{{ Url::to('/player/login') }}" method="post">
            <div class="field">
                <input type="text" name="login_username" id="login_username" class="form-control icon-login" placeholder="Ваш логин">
            </div>
            <div class="field error-field">
                <input type="password" class="form-control icon-password" name="login_password" id="login_password" placeholder="Ваш пароль">
                <p><a href="" data-popup="recover-password" class="js-open-popup">Забыли пароль?</a></p>
            </div>
            <button type="button" class="btn full-width">Войти</button>
        </form>
    </div>
    <footer class="footer">
        <div class="max-w">
            <p>Вы еще не зарегистрированы? <a href="#" data-popup="registration-popup" class="js-open-popup">Создать&nbsp;аккаунт</a></p>
        </div>
    </footer>
    <span class="js-close-popup" title="Закрыть"></span>
</div>