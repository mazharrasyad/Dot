<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template</h1>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```

## Cara Penggunaan

1. Klik tombol hijau "Clone or download" di atas kanan
2. Pilih Download ZIP dan tunggu sampai selesai
3. Jika sudah maka zipnya bernama "Dot-master"
4. Ekstrak zip tersebut supaya menjadi folder dan rename menjadi "dot"
5. Pastikan memiliki localhost (disarankan XAMPP versi >= 7.0.0 dan PHP versi >= 7.0.0)
6. Copy dan paste folder "basmalah" ke htdocs
7. Buat database db_dot dan import file db_dot.sql
8. Buka Terminal atau Command Line (CMD) dan arahkan direktori ke project dot (ex : cd C:\xampp\htdocs\dot)
9. Ketikkan di command line "composer install"
10. Buka browser dan jalankan http://localhost/dot/frontend/web atau http://localhost/dot/backend/web

Catatan : 
- Jika pengguna linux maka lakukan perintah chmod, contohnya :
<br>$ cd /opt/lampp/htdocs
<br>$ sudo chmod -R 777 /dot
  
## Development

- Design
- User Friendly
- Validation
