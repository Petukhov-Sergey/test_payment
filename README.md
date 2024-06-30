Шаги для установки и запуска проекта:
1. git clone git@github.com:Petukhov-Sergey/test_payment.git
2. cd repo
3. composer install
4. Конфигурация .env
5. php artisan migrate --seed
6. php artisan serve
7. Для проверки работоспособности проекта отправляйте запросы в Postman или прочих похожих программах:
POST /api/user/{id}/credit - для зачисления средств на баланс
POST /api/user/{id}/debit - для списания средств с баланса