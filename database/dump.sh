#!/bin/bash
set -o pipefail

echo "Введите логин пользователя БД:"
read -s USER

echo "Подключение к БД"
mysql -u $USER -p basic < ./database/sql/tables/posts.sql
mysql basic < ./database/sql/tables/comments.sql
mysql basic < ./database/sql/tables/view.sql

if [[ $? -eq 0 ]]; then
  echo "Таблицы созданы"
else
  echo "Ошибка создания таблиц"
fi