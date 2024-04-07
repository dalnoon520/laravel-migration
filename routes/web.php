<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

MVC: Models - View - Controllers

- Controllers: handle request
- Model: Handle data logic and interaction with database
- View: what should be shown to users (HTML&CSS/blade file)

Những routes được viết trong ruotes/web.php là dành cho giao diện website
Với hầu hết các ứng dụng, chúng ta sẽ bắt đầu định nghĩa routes bên trong file web.php
*/

/*
File web.php thường được sử dụng trong các framework PHP như Laravel để định nghĩa các tuyến đường (routes) cho ứng dụng web của bạn. Dưới đây là các trường hợp khi bạn có thể cần viết trong file web.php:

Định nghĩa các tuyến đường cho các trang web: File web.php thường chứa các định nghĩa cho các tuyến đường của ứng dụng web của bạn. Các tuyến đường này xác định cách các URL được liên kết với các controller hoặc hành động cụ thể trong ứng dụng của bạn.

Xử lý yêu cầu HTTP từ trình duyệt web: Khi một người dùng truy cập vào một URL trên trình duyệt web, các tuyến đường trong web.php sẽ xác định điều gì xảy ra khi yêu cầu đó được nhận.

Xử lý các biến yêu cầu GET hoặc POST: File web.php cũng có thể được sử dụng để xử lý dữ liệu được gửi từ trình duyệt web thông qua phương thức GET hoặc POST.

Thiết lập middleware: Middleware là các lớp trung gian được thực thi trước hoặc sau khi một yêu cầu được xử lý. File web.php có thể được sử dụng để đăng ký các middleware cho các tuyến đường cụ thể.

Thực hiện xác thực và phân quyền: Bạn có thể sử dụng file web.php để xác thực người dùng và kiểm tra các quyền truy cập cho các tuyến đường cụ thể của ứng dụng web của bạn.

Khi viết trong web.php, hãy nhớ rằng các tuyến đường được định nghĩa trong file này thường được sử dụng cho các yêu cầu từ trình duyệt web và cung cấp giao diện người dùng cho ứng dụng của bạn.

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/overview', function () {
    return view('welcome');
})->middleware(['auth', 'auth.basic']);

Route::get('/greeting', function() {
    return "Hello world!";
})->middleware('auth');

Route::get('/user', [UserController::class, 'index']);

Route::redirect('/old', '/new');

Route::get('/profile', [ProfileController::class, 'index']);

# Các phương thức methods trong router
/*
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);
/*

/*
Thỉnh thoảng, chúng ta cần tạo ra 1 route trả lời lại nhiều hành động HTTP. Ta có thể sử dụng method match.
Hặc có thể đăng kí  route mà respond lại tất cả các HTTP verbs bằng cách sử dụng method any
*/

//cái này thật ra phải viết bên trong api.php
Route::match(['get', 'post'], '/match', function() {
    return view('profile');
});

#Response
Route::get('/dashboard', function () {
    return redirect('home/dashboard');
});


