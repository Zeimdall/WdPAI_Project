create table IF NOT EXISTS cars
(
    id                serial
        constraint cars_pk
            primary key,
    car_name          varchar(255) not null,
    car_year          integer      not null,
    car_specification varchar(255) not null,
    image             varchar(255) not null
);

CREATE or REPLACE function process_cars() RETURNS TRIGGER AS $cars$
    BEGIN
        IF (TG_OP = 'DELETE') THEN
            INSERT INTO cars SELECT 'D', now(), user, OLD.*;
        ELSIF (TG_OP = 'UPDATE') THEN
            INSERT INTO cars SELECT 'U', now(), user, NEW.*;
        ELSIF (TG_OP = 'INSERT') THEN
            INSERT INTO cars SELECT 'I', now(), user, NEW.*;
        END IF;
        RETURN NULL;
    END;
$cars$ LANGUAGE plpgsql;

CREATE TRIGGER cars
    AFTER INSERT OR UPDATE OR DELETE ON cars
    FOR EACH ROW EXECUTE FUNCTION process_cars();

create unique index IF NOT EXISTS cars_id_uindex
    on cars (id);

create table IF NOT EXISTS role
(
    role_id   serial
        constraint role_pk
            primary key,
    role_name varchar(255) not null
);

create table IF NOT EXISTS users
(
    id       serial
        constraint users_pk
            primary key,
    email    varchar(50)  not null,
    password varchar(100) not null,
    role_id  integer
        constraint role_id
            references role
);

create unique index IF NOT EXISTS users_id_uindex
    on users (id);

create unique index IF NOT EXISTS role_role_id_uindex
    on role (role_id);

create table IF NOT EXISTS rented_cars
(
    user_id integer
        constraint user_id
            references users,
    car_id  integer
        constraint car_id
            references cars
);