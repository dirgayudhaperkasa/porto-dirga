<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Models\Skill;
use App\Models\Project;

use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectController;
use function PHPUnit\Framework\isEmpty;

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
    $skills = Skill::all();
    $projects = Project::all();
    return view('welcome-meyawo')->with('skills', $skills)->with('projects', $projects);
})->name('homepage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/skill', [SkillController::class, 'Index'])->name('skill.index');
    Route::get('/skill/create', [SkillController::class, 'Create'])->name('skill.create');
    Route::post('/skill/create', [SkillController::class, 'InputSkill'])->name('skill.InputSkill');
    Route::get('/skill/{skill}/edit', [SkillController::class, 'Edit'])->name('skill.edit');
    Route::put('/skill/{skill}/update', [SkillController::class, 'UpdateSkill'])->name('skill.UpdateSkill');
    Route::delete('/skill/{skill}/delete', [SkillController::class, 'DeleteSkill'])->name('skill.DeleteSkill');

    Route::get('/project', [ProjectController::class, 'Index'])->name('project.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
