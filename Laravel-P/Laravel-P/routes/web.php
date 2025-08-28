<?php
use App\Http\Controllers\Frontend\AuthController;

use App\Http\Controllers\MapaController;
use App\Http\Controllers\ObrasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminUserController;


Route::get('/', function () {
    return redirect()->route('login');
});

// Registro
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');





Route::middleware(['auth'])->group(function () {
    Route::get('/admin/usuarios/crear', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/usuarios', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/usuarios/lista', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/usuarios/{id}', [AdminUserController::class, 'show'])->name('admin.users.show');
    Route::get('/{id}/editar', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');



});



Route::post('/login', [AuthController::class, 'login']);
// Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Obras
    Route::get('/obras', [ObrasController::class, 'index'])->name('obras.index');
    Route::get('/obras/lista', [ObrasController::class, 'lista'])->name('obras.lista');
    Route::get('/obras/mapa', [ObrasController::class, 'mapa'])->name('obras.mapa');
    Route::get('/obras/participa', [ObrasController::class, 'participa'])->name('obras.participa');
    Route::get('/obras/alta', [ObrasController::class, 'create'])->name('obras.create');
    Route::post('/obras', [ObrasController::class, 'store'])->name('obras.store');

    Route::get('/obras/{id}/edit', [ObrasController::class, 'edit'])->name('obras.edit');
    Route::put('/obras/{id}', [ObrasController::class, 'update'])->name('obras.update');
    Route::delete('/obras/{id}', [ObrasController::class, 'destroy'])->name('obras.destroy');
    Route::get('/obras/{id}', [ObrasController::class, 'show'])->name('obras.show');
    
    Route::get('/dashboard', [ObrasController::class, 'dashboard'])->name('dashboard');




    // Mapa
    Route::get('/mapa', [MapaController::class, 'index'])->name('mapa');

});

require __DIR__.'/auth.php';


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::get('/mapa', [MapaController::class, 'index']);