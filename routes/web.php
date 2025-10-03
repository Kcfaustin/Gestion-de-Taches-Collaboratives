<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HealthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

// Health check endpoint for Railway
Route::get('/health', [HealthController::class, 'check']);


// Route pour demander une nouvelle vérification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Route pour vérifier l'email via un lien envoyé
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill(); // Vérifie l'email
    return redirect('/dashboard')->with('success', 'Votre email a été vérifié avec succès.');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/notifications/mark-as-read/{id}', function ($id) {
    $notification = auth()->user()->notifications->find($id);
    if ($notification) {
        $notification->markAsRead();
    }
    return redirect()->back();
})->name('notifications.markAsRead');

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Tableau de Bord affichage User
    Route::get('dashboard/projects', [ProjectController::class, 'index'])->name('dashboard.projects');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');  // Route manquante ajoutée
    Route::get('dashboard/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects/store', [ProjectController::class, 'store'])->name('projects.store');

    Route::get('projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::delete('projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::put('projects/{id}', [ProjectController::class, 'update'])->name('projects.update');

    Route::get('dashboard/tasks', [TaskController::class, 'index'])->name('dashboard.tasks');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');  // Route manquante ajoutée

    Route::get('dashboard/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('dashboard/tasks/', [TaskController::class, 'store'])->name('tasks.store');
   /*  Route::get('dashboard/tasks/{id}', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('dashboard/tasks/update', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('dashboard/tasks/delete', [TaskController::class, 'destroy'])->name('tasks.destroy'); */

    Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/projects/{project}/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

});



Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('admin/users', [HomeController::class, 'listUsers'])->name('admin.users.index');
    Route::get('admin/users/{id}/edit', [HomeController::class, 'editUser'])->name('admin.users.edit');
    Route::put('admin/users/{id}', [HomeController::class, 'updateUser'])->name('admin.users.update');
    Route::get('/admin/projects/{id}', [HomeController::class, 'listUserProjects'])->name('admin.users.projects');
    Route::delete('admin/users/{id}', [HomeController::class, 'deleteUser'])->name('admin.users.destroy');

    Route::get('/admin/projects/', [HomeController::class, 'listProjects'])->name('admin.projects.index');



    Route::get('admin/projects/{id}/edit', [HomeController::class, 'edit'])->name('admin.projects.edit');
    Route::get('projects/create', [HomeController::class, 'create'])->name('admin.projects.create');
    /* Route::get('projects/create', function () {
        return view('admin.projects.create');
    }); */
    Route::post('/admin/projects/store', [HomeController::class, 'store'])->name('admin.projects.store');
    Route::put('admin/projects/{id}', [HomeController::class, 'update'])->name('admin.projects.update');

    Route::delete('admin/projects/{id}', [HomeController::class, 'deleteProject'])->name('admin.projects.destroy');
    Route::delete('admin/users/projects/{id}', [HomeController::class, 'deleteUsersProject'])->name('admin.users.projects.destroy');

});

require __DIR__.'/auth.php';


