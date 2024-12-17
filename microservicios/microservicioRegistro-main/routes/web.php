<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\MatriculadoController;
use App\Http\Controllers\MatriculadoController1;
use App\Http\Controllers\CertificadosController;

use App\Http\Controllers\PageController;

Route::get('/', [RegistroController::class, 'create'])->name('registro.create');
Route::post('/', [RegistroController::class, 'store'])->name('registro.store');
Route::post('/search/dni', [RegistroController::class, 'searchDNI'])->name('search.dni');

//landing para seleccion de accion registro - administrador:login
//Route::get('/', [AlumnoController::class, 'landing'])->name('landing');

// LOGIN
Route::get('loginM', [AdminLoginController::class, 'showLoginForm'])->name('loginM');
Route::post('loginM', [AdminLoginController::class, 'login']);

// Rutas protegidas por autenticación
Route::group(['middleware' => 'auth'], function () {

    Route::get('/sistema_Matricula', function () {
        return view('sistema_Matricula');
    })->name('sistema_Matricula');

    Route::get('registrar-alumno', [MatriculadoController::class, 'showForm'])->name('form.registrar.alumno');
    Route::post('registrar-alumno', [MatriculadoController::class, 'registrarAlumno']);

    // Rutas para mostrar matriculados
    Route::get('/matriculados', [MatriculadoController1::class, 'showMatriculados'])->name('matriculados.index');

    // Rutas para mostrar registros
    Route::get('/registros', [MatriculadoController1::class, 'showRegistros'])->name('registros.index');

    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Rutas para mostrar certificados

Route::get('/certificados', [CertificadosController::class, 'listarAlumnos'])->name('certificados.index');  // Cambio aquí para que apunte al método listarAlumnos()

Route::get('/certificados', [CertificadosController::class, 'listarAlumnos'])->name('certificados.index');  // Cambio aquí para que apunte al método listarAlumnos()
Route::get('/certificados/create', [CertificadosController::class, 'create'])->name('certificados.create');   // Esto lo dejas igual si tienes un método create
Route::get('/certificados/generar/{id}', [CertificadosController::class, 'generarCertificado'])->name('certificados.generar');  // Añadido {id} para pasar el parámetro

});

