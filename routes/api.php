<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Bạn có thể cần viết vào tệp api.php khi bạn muốn tạo một API endpoint để tương tác với ứng dụng của mình. File api.php thường được sử dụng để xử lý các yêu cầu HTTP từ phía client, thực hiện các thao tác như truy vấn cơ sở dữ liệu, xử lý dữ liệu và trả về kết quả dưới dạng JSON hoặc XML.

Các trường hợp cụ thể khi bạn có thể cần viết vào file api.php có thể bao gồm:

Xây dựng một RESTful API: Khi bạn muốn cung cấp các endpoint cho ứng dụng của mình để cho phép client gửi và nhận dữ liệu từ server theo mô hình RESTful.

Xử lý yêu cầu AJAX: Khi bạn muốn gửi yêu cầu từ một trang web mà không cần phải tải lại trang đó, bạn có thể sử dụng file api.php để xử lý các yêu cầu AJAX từ phía client.

Xử lý yêu cầu từ ứng dụng di động hoặc ứng dụng desktop: Khi bạn muốn ứng dụng của mình giao tiếp với server để lấy dữ liệu hoặc thực hiện các thao tác khác.

Thực hiện các tác vụ đặc biệt: Bạn cũng có thể viết vào api.php để thực hiện các tác vụ đặc biệt như xử lý thanh toán, gửi email, xử lý tệp tải lên, và nhiều hơn nữa.

Khi viết vào api.php, hãy đảm bảo rằng bạn đang xử lý dữ liệu đầu vào một cách an toàn để tránh các vấn đề bảo mật như injection tấn công.

*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/greeting', function () {
    echo 'Hello World';
});

//get user that has ID XXX
Route::get('/user/{id}', [UserController::class, 'show']);
// https://prnt.sc/1_0K_hd80Qf9

//get list of users
Route::get('/users', [UserController::class, 'index']);

Route::get('/list/users', function() {

});

Route::match(['get', 'post'], '/match', function() {
    return view('profile');
});

Route::get('/', function(Request $req) {

});

#Dependency Injection & Route Parameters
Route::put('/user/{id}', [UserController::class, 'update']);

##response
Route::get('/user/list/{id}', function(User $user) {
    echo $user;
});
