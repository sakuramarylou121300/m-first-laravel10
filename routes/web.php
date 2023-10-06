<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
    // return view('welcome');
    //select all
    // $getAllUser = DB::select("select * from users");
    // dd($getAllUser);

    //fetch users where the email is 
    // $users = DB::select("select * from users where email=?", ['maryloucortez12@gmail.com']);

    // create new user
    // $createUser = DB::insert('insert into users (name, email, password) values (?, ?, ?)',
    // [
    //     'Michelle',
    //     'michelle@gmail.com',
    //     '12345678'
    // ]);
    // dd($createUser);

    //update user
    // $updateUser = DB::update("update users set email=? where id=?",[
    //     'abcde@gmail.com',
    //     1
    // ]);
    // dd($updateUser);

    //delete user
    // $deleteUser = DB::delete("delete from users where id=1");
    // dd($deleteUser);

    // LARAVEL QUERY
    // get all user
    // $laravelGetUser = DB::table('users')->get();
    // dd($laravelGetUser);

    // get the first
    // $laravelGetFirstUser = DB::table('users')->first();
    // dd($laravelGetFirstUser);

    //similar to getone where id is 2
    // $laravelGetFirstUser2 = DB::table('users')->find(2);
    // dd($laravelGetFirstUser2);

    // getOne user
    // $laravelGetOneUser = DB::table('users')->where('id', 2)->get();
    // dd($laravelGetOneUser);

    //insert
    // $laravelInsertUser = DB::table('users')->insert([
    //     'name' => 'Mary Lou',
    //     'email' => 'marylou@gmail.com',
    //     'password' => '123456'
    // ]);
    // dd($laravelInsertUser);

    //update
    // $laravelUpdateUser = DB::table('users')-> where('id', 3)->update(['email' => 'maryloudccortez12@gmail.com']);
    // dd($laravelUpdateUser);

    //delete
    // $laravelDeleteUser = DB::table('users')->where('id', 3)->delete();
    // dd($laravelDeleteUser);

    //ELOQUENT
    //get all
    // $eloquentGetAll = User::get();
    // dd($eloquentGetAll);

    //get all second option
    // $eloquentGetAll2 = User::all();
    // dd($eloquentGetAll2);

    //get one
    // $eloquentGetFirst = User::where('id',2)->first();
    // dd($eloquentGetFirst);

    //get one second option
    $eloquentGetOne2 = User::find(4);
    dd($eloquentGetOne2);

    //insert
    // $eloquentInsertUser = User::create([
    //     'name' => 'thisisaccessormutator',
    //     'email' => 'thisisaccessormutator@gmail.com',
    //     'password' => '123456'
    // ]);
    // dd($eloquentInsertUser);

    //update, first option
    // get the first one first
    // $eloquentUpdateUser = User::where('id', 2)->first();
    // //then update
    // $eloquentUpdateUser -> update(['email' => 'michellenewulit@gmail.com']);
    // dd($eloquentUpdateUser);

    //update, second option
    //get the user first
    // $eloquentUpdateUser2 = User::find(2);
    // //then update
    // $eloquentUpdateUser2 -> update(['email' => 'michelleanotheropt@gmail.com']);
    // dd($eloquentUpdateUser2);

    //delete user
    // get the user first
    // $eloquentDeleteUser = User::find(2);
    // //then delete
    // $eloquentDeleteUser -> delete();
    // dd($eloquentDeleteUser);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
