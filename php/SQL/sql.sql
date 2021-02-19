CREATE TABLE USERS(  -- создаем новую базу данных
	user_id int, -- имя тип
    first_name varchar(20),
    last_name varchar(30),
    email varchar(50),
    facebook_url varchar(100),
    twitter_handle varchar(20)
)

SELECT last_name, first_name FROM `USERS` WHERE 1 --выбрать столбцы

SELECT last_name, first_name, id FROM `USERS` -- какие столбцы выводить
WHERE user_id = 2 || user_id = 1   -- условие выбора

SELECT DISTINCT last_name, first_name, id FROM `USERS` -- ключивое слово DISTINCT отсеивает одинаковые поля (дубли)
WHERE user_id = 2 || user_id = 1

DROP TABLE USERS --удалить таблицу

INSERT INTO USERS  --добавить данные в таблицу
VALUES (1, "Mike", "Greenfield", "email@mail.ru", "http://facebook.com/profile.php?id=wqdqw", "@Mike_Green");

SHOW TABLES -- покозать все базы данных

Select DISTINCT product.maker, laptop.speed from product
left join laptop on product.model = laptop.model --объединяет две базы данных в одну
where laptop.hd >= 10