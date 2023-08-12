<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\AvatarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use OpenAI\Laravel\Facades\OpenAI;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
     return view('welcome');
    //select or return dbfacade, query builder and eloquent
    //$users = DB:: select ("Select * from users");
    // $users = DB::table('users')->get();
    // $users = DB::table('users')->first();
    //$users = User::where('id', 1)->first();
    //$users = User::all();
    // $users = User::find(16);

    //test
    //insert dbfacade, query builder and eloquen
    // $users = DB:: insert ('insert into users (name, email, password) values (?,?,?)', [
    // 'Jules',
    // 'carmelomarilag4@yahoo.com',
    // 'password',
    // ]);
    // $users = DB::table('users')->insert([
    //    'name' => 'jules',
    //    'email' => 'jules1@yahoo.com',
    //    'password' => 'password',
    // ]);
    // $users =User::create([
    //     'name' => 'jules',
    //     'email' => '12sdfsd12asd312jules121234@yahoo.com',
    //     'password' => 'password',
    // ]);

    //update dbfacade, query builder and eloquen
    //$user = DB:: update ("update users set email = ? where id = ?", [
    //'zxcvbn@gmail.com',
    // 2,
    // ]);
    //$users = DB::table('users')->where('id', 3)->update([
    //       'name' => 'melojules'
    //    ]);
    // $users = User::find(4);
    // $users ->update([
    //     'name' => 'melojules1'
    // ]);

    //delete dbfacade, query builder and eloquen
    //$user = DB:: select ("delete from users where id =?", [
    //2
    //]);
    //$users = DB::table('users')->where('id', 3)->delete();
    // $users = User::find(4);
    // $users->delete();
    
//    dd($users->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
});

require __DIR__.'/auth.php';

Route::get('openai', function(){

    $result = OpenAI::images()->create([
        "prompt" => "create avatar for user with name",
        'n'      => 1,
        'size'   => "256x256",


    ]);

    return response([$result->data[0]->url]);
});
