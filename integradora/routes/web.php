<?php

use App\Models\Libro;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Proveedor;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/libros', function () {
    $libros = Libro::all();
    return view('libros.index', compact('libros'));
});

Route::get('/libros/nuevo', function () {
    return view('libros.create');
});

Route::post('/libros/nuevo', function () {
    request()->validate([
        'titulo' => 'required',
        'precio' => 'required|integer',
    ], [
        'titulo.required' => 'Falta el título del libro.',
        'precio.required' => 'Falta el precio del libro.',
        'precio.integer'  => 'Ese precio no es un número entero.',
    ]);
    Libro::create([
        'titulo' => request()->input('titulo'),
        'precio' => request()->input('precio'),
    ]);
    return redirect('/libros');
});

Route::get('/', function () {
    $productos = Producto::with('categoria')->latest()->take(6)->get();
    $categorias = Categoria::all();
    return view('inicio', compact('productos', 'categorias'));
})->name('home');

Route::get('/inicio', function () {
    return redirect('/');
});

Route::get('/productos', function () {
    $productos = Producto::with('categoria')->paginate(12);
    $categorias = Categoria::all();
    return view('productos.index', compact('productos', 'categorias'));
})->name('productos.index');

Route::get('/producto/{slug}', function ($slug) {
    $producto = Producto::where('slug', $slug)->firstOrFail();
    return view('productos.show', compact('producto'));
})->name('productos.show');

Route::get('/categoria/{slug}', function ($slug) {
    $categoria = Categoria::where('slug', $slug)->firstOrFail();
    $productos = $categoria->productos()->paginate(12);
    return view('productos.index', compact('productos', 'categoria'));
})->name('categoria.show');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('productos', ProductoController::class)->except(['show'])->names('admin.productos');
    Route::resource('categorias', CategoriaController::class)->except(['show'])->names('admin.categorias');
    Route::resource('proveedores', ProveedorController::class)->except(['show'])->names('admin.proveedores');
});