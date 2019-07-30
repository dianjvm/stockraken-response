# stockraken-response
Stockraken standard response

### Requirements

Ini merupakan response yang digunakan sebagai librari pada Laravel 5.X secara tidak langsung tanpa adanya Laravel 5.X maka librari ini tidak dapatdigunakan.

### Return Response

Respon yang dihasilkan secara default adalah JSON

### Instalasi atau Pemasangan

1. Masuk pada folder root Laravel anda melalui Terminal / Command Prompt
2. Pasang dengan code berikut :
`composer require stockraken/response`
3. Setelah selesai buka file composer.json pada folder laravel project anda
4. Tambahkan Autoload `"Stockraken\\Response\\": "vendor/stockraken/response/src"` pada psr-4:

> Sebelum

```json
autoload": {
        "psr-4": {
        // psr-4 bawaan package lain seperti App\\app
        }
}
```

> Sesudah

```json
autoload": {
        "psr-4": {
        // psr-4 bawaan package lain seperti App\\app
        "Stockraken\\Response\\": "vendor/stockraken/response/src"
        }
}
```

5. Masuk pada root folder project laravel anda dengan terminal
6. Jalankan perintah ini `composer dump-autoload`
7. Pastikan proses berjalan tanpa error, jika anda mengalami error maka ajukan ISSUE pada project ini
8. Jalan kan project laravel anda dengan perintah `serve` : `php artisan serve`
9. Cek apakah library response terpasang dengan mengakses url project laravel anda (misal `http://127.0.0.1:8000`) dan tambahkan url `skresponse` menjadi `http://127.0.0.1:8000/skresponse`

### Penggunaan library

* Buatlah controller baru
* Tambahkan librari stockraken pada controller tersebut dengan menambahkan `use Stockraken\Response\Response;`. Tambahkan alias bila perlu untuk memendekan dan mempermudah pengkodean.

Contoh :
```php
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Stockraken\Response\Response as skresponse; // menggunakan alias skresponse, anda bisa mengubah alias sesuai keinginan anda

class PassportController extends Controller
{

    public function contoh()
    {
    }

}
 
```

* Menjalankan Response :

Contoh:
```php
<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Stockraken\Response\Response as skresponse; // menggunakan alias skresponse, anda bisa mengubah alias sesuai keinginan anda

class PassportController extends Controller
{

    public function contoh()
    {
        $ar = array(
            "contohdata" => "contoh isi data",
            "nilai" => 123,
            "test" => [1,2,3,4,5,9,10]
        );
        
        skresponse::$status = true; // status response terserah anda bisa true/false atau 'ok'/'no'
        skresponse::$message= "Berhasil ambil data"; // pesan yang akan ditampilkan pada response
        skresponse::$code   = 200; // kode response header, misal 200 untuk sukses, 404 untuk data tidak ditemukan, 501 untuk server error dll
        skresponse::$data   = $ar; // set data ke response
        
        return skresponse::run(); // mengmebalikan nilai
    }

}
 
```
* Test dengan menambahkan routes pada laravel anda dan arahkan ke controller yang baru saja di buat, contoh :
```php
Route::get('contoh', 'PassportController@contoh');
```
