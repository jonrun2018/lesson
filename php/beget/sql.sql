    create table users (
     users_id int not null auto_increment primary key,
     first_name varchar(20) not null,
     last_name varchar(30) not null,
     email varchar(50) not null,
     facebook_url varchar(100),
     twitter_handle varchar(20),
     image_data mediumblob not null //позволяет хранить двоичные данные (картинка) 
    )
    
    -- добовляем поле в таблицу
    ALTER TABLE users
    ADD bio varchar(1000);