<h2>Тестовое задание на Laravel</h2>

<p><b>Основные команды</b></p>
<p>После миграции можно запустить seeder коммандой:<br>
php artisan db:seed<br>
Создается пользователь с доступами:<br>
test@example.com<br>
password<br>
Так же к нему добавятся 20 операций с случайным текстом
</p>
<br>
<p>Добавление нового пользователя через консоль осуществляется при помощи команды:
<br>
php artisan app:create-user "{email}" "{password}"<br>
где email - почта, password - пароль<br>
Пример:<br>
php artisan app:create-user "test@test.ru" "qwerty"
</p>
<br>
<p>Добавление новой операции через консоль осуществляется при помощи команды:<br>
php artisan app:create-operation "{email}" "{amount}" "{description}"<br>
где email - почта, amount - сумма операции, description - описание операции (необязательно)<br>
Пример:<br>
php artisan app:create-operation "test@test.ru" "1000" "Пример описания"<br>
Для ввода отрицательной суммы нужно перед суммой поставить "--"<br>
Пример:<br>
php artisan app:create-operation "test@test.ru" -- "-1000" "Пример описания"
</p>
<br>
<p>При создании операции через консоль - операция попадает в очередь на создание<br>
По умолчанию QUEUE_CONNECTION=sync и команда выполняется сразу
</p>
