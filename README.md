<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 🧾 Guía de Ejercicios query builder

Este proyecto fue desarrollado con **Laravel 11** utilizando **Laravel Herd**.  
Su objetivo es practicar la implementación de **consultas SQL** mediante **Eloquent ORM**, basándose en un modelo de datos simple con las tablas `usuarios` y `pedidos`.

---

## 🧩 Diagrama de la Base de Datos

### Tabla `usuarios`
| Campo     | Tipo     | Descripción                   |
|------------|----------|-------------------------------|
| id         | BIGINT   | Llave primaria (autoincrement) |
| nombre     | VARCHAR  | Nombre del usuario             |
| correo     | VARCHAR  | Correo electrónico (único)     |
| telefono   | VARCHAR  | Número de teléfono             |

### Tabla `pedidos`
| Campo       | Tipo     | Descripción                              |
|--------------|----------|------------------------------------------|
| id           | BIGINT   | Llave primaria (autoincrement)           |
| producto     | VARCHAR  | Nombre del producto                      |
| cantidad     | INT      | Cantidad solicitada                      |
| total        | DECIMAL  | Monto total del pedido                   |
| id_usuario   | BIGINT   | Llave foránea → `usuarios.id`            |

Relación: **Un usuario puede tener varios pedidos.**

## 🚀 Endpoints Disponibles (API)

| #  | Ruta            | Descripción                                                              |
|----|-----------------|--------------------------------------------------------------------------|
| 1  | /api/consulta1  | Inserta los registro y los borra los anterioes si existen                |
| 2  | /api/consulta2  | Muestra todos los pedidos del usuario con ID = 2                         |
| 3  | /api/consulta3  | Muestra los pedidos con el nombre y correo del usuario asociado          |
| 4  | /api/consulta4  | Recupera los pedidos con total entre $100 y $250.                        |
| 5  | /api/consulta5  | Muestra los usuarios cuyos nombres comienzan con “R”.                    |
| 6  | /api/consulta6  | Calcula cuántos pedidos tiene el usuario con ID = 5                      |
| 7  | /api/consulta7  | Lista los pedidos con datos del usuario, ordenados por total descendente |
| 8  | /api/consulta8  | Muestra la suma total del campo total en todos los pedidos               |
| 9  | /api/consulta9  | Muestra el pedido más económico y el nombre del usuario que lo realizó   |
| 10 | /api/consulta10 | Agrupa pedidos por usuario, mostrando cantidad total y suma de totales   |

