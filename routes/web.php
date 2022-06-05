<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AvaliationController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\PastController;
use App\Http\Controllers\HistoricController;
use App\Http\Controllers\SubjectiveController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\RedflagController;
use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\DynamopController;
use App\Http\Controllers\CSI_QuestionnaireController;
use App\Http\Controllers\BPCS_QuestionnaireController;
use App\Http\Controllers\FABQ_QuestionnaireController;
use App\Http\Controllers\ETC_QuestionnaireController;
use App\Http\Controllers\AEDC_QuestionnaireController;
use App\Http\Controllers\ShoulderController;
use App\Http\Controllers\Hip_KneeController;
use App\Http\Controllers\Elbow_FistController;
use App\Http\Controllers\AnkleController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\ProntuaryController;
use App\Http\Controllers\Consult_ExerciseController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AgendController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/users/change_password/{id}', [UserController::class, 'change_password'])->name('users.change_password');
});

Route::middleware(['auth', 'check.RoleUser'])->group(function () {
    Route::get('/dashboard',[Controller::class, 'dashboard'])->name('dashboard');
    Route::any('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::any('/users/patients_search', [UserController::class, 'patients_search'])->name('patients.search');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::get('/users/patients', [UserController::class, 'patients']);
    Route::post('/users/store', [UserController::class, 'store']);
    Route::get('/users/show/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    Route::put('/users/update/{id}', [UserController::class, 'update']);
   Route::get('users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
});  

Route::middleware(['auth', 'check.RoleUser'])->group(function () {
    Route::get('/avaliations/{id}', [AvaliationController::class, 'index'])->name('avaliations');
    Route::get('/avaliations/create/{id}', [AvaliationController::class, 'create']);
    Route::get('/avaliations/edit/{id}', [AvaliationController::class, 'edit']);
    Route::get('/avaliations/update/{id}', [AvaliationController::class, 'update'])->name('avaliations.update');
    Route::post('/avaliations/store/{id}', [AvaliationController::class, 'store']);
    Route::get('/avaliations/info/{id}', [AvaliationController::class, 'info'])->name('avaliations.info');
    Route::get('avaliation/{id}/destroy', [AvaliationController::class, 'destroy'])->name('avaliation.destroy');
    
    //consults
    Route::get('/consults/{id}', [ConsultController::class, 'index'])->name('consults');
    Route::get('/consults/create/{id}', [ConsultController::class, 'create']);
    Route::get('/consults/update/{id}', [ConsultController::class, 'update'])->name('consults.update');
    Route::get('consults/{id}/destroy', [ConsultController::class, 'destroy'])->name('consults.destroy');

    //prontuaries
    Route::get('/prontuaries/{id}', [ProntuaryController::class, 'index'])->name('prontuaries');
    Route::get('/prontuaries/create/{id}', [ProntuaryController::class, 'create']);
    Route::post('/prontuaries/store/{id}', [ProntuaryController::class, 'store']);
    Route::get('/prontuaries/edit/{id}', [ProntuaryController::class, 'edit']);
    Route::put('/prontuaries/update/{id}', [ProntuaryController::class, 'update'])->name('prontuaries.update');
    Route::get('/prontuaries/{id}/destroy', [ProntuaryController::class, 'destroy'])->name('prontuaries.destroy');

    //exercises
    Route::get('/exercises', [ExerciseController::class, 'index'])->name('exercises');
    Route::get('/exercises/create', [ExerciseController::class, 'create']);
    Route::post('/exercises/store', [ExerciseController::class, 'store']);
    Route::get('/exercises/edit/{id}', [ExerciseController::class, 'edit']);
    Route::put('/exercises/update/{id}', [ExerciseController::class, 'update'])->name('exercises.update');
    Route::get('/exercises/{id}/destroy', [ExerciseController::class, 'destroy'])->name('exercises.destroy');

    //consult_exercises
    Route::get('/consult_exercises/{id}', [Consult_ExerciseController::class, 'index'])->name('consult_exercises');
    Route::post('/consult_exercises/store/{id}', [Consult_ExerciseController::class, 'store']);
    Route::get('/consult_exercises/add_execution/{id}', [Consult_ExerciseController::class, 'add_execution'])->name('consult_exercises.add_execution');
    Route::get('/consult_exercises/edit/{id}', [Consult_ExerciseController::class, 'edit']);
    Route::put('/consult_exercises/update/{id}', [Consult_ExerciseController::class, 'update'])->name('consult_exercises.update');
    Route::get('/consult_exercises/{id}/destroy', [Consult_ExerciseController::class, 'destroy'])->name('consult_exercises.destroy');


    //general
    Route::post('/general/store/{id}', [GeneralController::class, 'store']);
    Route::get('/general/show/{id}', [GeneralController::class, 'show'])->name('general.show');
    Route::get('/general/edit/{id}', [GeneralController::class, 'edit']);
    Route::put('/general/update/{id}', [GeneralController::class, 'update']);
    Route::get('general/{id}/destroy', [GeneralController::class, 'destroy'])->name('general.destroy');

    //past
    Route::post('/past/store/{id}', [PastController::class, 'store']);
    Route::get('/past/show/{id}', [PastController::class, 'show'])->name('past.show'); 
    Route::get('/past/edit/{id}', [PastController::class, 'edit']);
    Route::put('/past/update/{id}', [PastController::class, 'update']);
    Route::get('past/{id}/destroy', [PastController::class, 'destroy'])->name('past.destroy');
   
    //redflags
    Route::post('/redflags/store/{id}', [RedflagController::class, 'store']);
    Route::get('/redflags/show/{id}', [RedflagController::class, 'show'])->name('redflag.show');
    Route::get('/redflags/edit/{id}', [RedflagController::class, 'edit']);
    Route::put('/redflags/update/{id}', [RedflagController::class, 'update']);
    Route::get('redflags/{id}/destroy', [RedflagController::class, 'destroy'])->name('redflag.destroy');

    //historic
    Route::post('/historic/store/{id}', [HistoricController::class, 'store']);
    Route::get('/historic/show/{id}', [HistoricController::class, 'show'])->name('historic.show');
    Route::get('/historic/edit/{id}', [HistoricController::class, 'edit']);
    Route::put('/historic/update/{id}', [HistoricController::class, 'update']);
    Route::get('historic/{id}/destroy', [HistoricController::class, 'destroy'])->name('historic.destroy');

     //subjective
    Route::post('/subjective/store/{id}', [SubjectiveController::class, 'store']);
    Route::get('/subjective/show/{id}', [SubjectiveController::class, 'show'])->name('subjective.show');
    Route::get('/subjective/edit/{id}', [SubjectiveController::class, 'edit']);
    Route::put('/subjective/update/{id}', [SubjectiveController::class, 'update']);
    Route::get('subjective/{id}/destroy', [SubjectiveController::class, 'destroy'])->name('subjective.destroy');


   
});   


Route::middleware(['auth', 'check.RoleUser'])->group(function () {
    Route::get('/questionnaire/store/{id}', [QuestionnaireController::class, 'store']);
    Route::get('/csi_questionnaire/{id}', [CSI_QuestionnaireController::class, 'index'])->name('csi_questionnaire');
    Route::post('/csi_questionnaire/store/{id}', [CSI_QuestionnaireController::class, 'store']);
    Route::get('csi_questionnaire/{id}/destroy', [CSI_QuestionnaireController::class, 'destroy'])->name('csi_questionnaire.destroy');
    Route::get('/csi_questionnaire/edit/{id}', [CSI_QuestionnaireController::class, 'edit']);
    Route::put('/csi_questionnaire/update/{id}', [CSI_QuestionnaireController::class, 'update']);

    Route::get('/bpcs_questionnaire/{id}', [BPCS_QuestionnaireController::class, 'index'])->name('bpcs_questionnaire');
    Route::post('/bpcs_questionnaire/store/{id}', [BPCS_QuestionnaireController::class, 'store']);
    Route::get('bpcs_questionnaire/{id}/destroy', [BPCS_QuestionnaireController::class, 'destroy'])->name('bpcs_questionnaire.destroy');
    Route::get('/bpcs_questionnaire/edit/{id}', [BPCS_QuestionnaireController::class, 'edit']);
    Route::put('/bpcs_questionnaire/update/{id}', [BPCS_QuestionnaireController::class, 'update']);

    Route::get('/fabq_questionnaire/{id}', [FABQ_QuestionnaireController::class, 'index'])->name('fabq_questionnaire');
    Route::post('/fabq_questionnaire/store/{id}', [FABQ_QuestionnaireController::class, 'store']);
    Route::get('fabq_questionnaire/{id}/destroy', [FABQ_QuestionnaireController::class, 'destroy'])->name('fabq_questionnaire.destroy');
    Route::get('/fabq_questionnaire/edit/{id}', [FABQ_QuestionnaireController::class, 'edit']);
    Route::put('/fabq_questionnaire/update/{id}', [FABQ_QuestionnaireController::class, 'update']);

    Route::get('/etc_questionnaire/{id}', [ETC_QuestionnaireController::class, 'index'])->name('etc_questionnaire');
    Route::post('/etc_questionnaire/store/{id}', [ETC_QuestionnaireController::class, 'store']);
    Route::get('etc_questionnaire/{id}/destroy', [ETC_QuestionnaireController::class, 'destroy'])->name('etc_questionnaire.destroy');
    Route::get('/etc_questionnaire/edit/{id}', [ETC_QuestionnaireController::class, 'edit']);
    Route::put('/etc_questionnaire/update/{id}', [ETC_QuestionnaireController::class, 'update']);

    Route::get('/aedc_questionnaire/{id}', [AEDC_QuestionnaireController::class, 'index'])->name('aedc_questionnaire');
    Route::post('/aedc_questionnaire/store/{id}', [AEDC_QuestionnaireController::class, 'store']);
    Route::get('aedc_questionnaire/{id}/destroy', [AEDC_QuestionnaireController::class, 'destroy'])->name('aedc_questionnaire.destroy');
    Route::get('/aedc_questionnaire/edit/{id}', [AEDC_QuestionnaireController::class, 'edit']);
    Route::put('/aedc_questionnaire/update/{id}', [AEDC_QuestionnaireController::class, 'update']);


    Route::get('/dynamop/store/{id}', [DynamopController::class, 'store']);
    Route::get('/dynamop/info/{id}', [DynamopController::class, 'info'])->name('dynamop.info');
    Route::get('/shoulder/{id}', [ShoulderController::class, 'index'])->name('shoulder');
    Route::post('/shoulder/store/{id}', [ShoulderController::class, 'store']);
    Route::get('/shoulder/edit/{id}', [ShoulderController::class, 'edit']);
    Route::put('/shoulder/update/{id}', [ShoulderController::class, 'update']);
    Route::get('shoulder/{id}/destroy', [ShoulderController::class, 'destroy'])->name('shoulder.destroy');
    Route::get('/shoulder/relatorio/{id}', [ShoulderController::class, 'relatorio']);


    Route::post('/hip_knee/store/{id}', [Hip_KneeController::class, 'store']);
    Route::get('/hip_knee/edit/{id}', [Hip_KneeController::class, 'edit']);
    Route::put('/hip_knee/update/{id}', [Hip_KneeController::class, 'update']);
    Route::get('hip_knee/{id}/destroy', [Hip_KneeController::class, 'destroy'])->name('hip_knee.destroy');
    Route::get('/hip_knee/relatorio/{id}', [Hip_KneeController::class, 'relatorio']);

    Route::post('/elbow_fist/store/{id}', [Elbow_FistController::class, 'store']);
    Route::get('/elbow_fist/edit/{id}', [Elbow_FistController::class, 'edit']);
    Route::put('/elbow_fist/update/{id}', [Elbow_FistController::class, 'update']);
    Route::get('elbow_fist/{id}/destroy', [Elbow_FistController::class, 'destroy'])->name('elbow_fist.destroy');
    Route::get('/elbow_fist/relatorio/{id}', [Elbow_FistController::class, 'relatorio']);


    Route::post('/ankle/store/{id}', [AnkleController::class, 'store']);
    Route::get('/ankle/edit/{id}', [AnkleController::class, 'edit']);
    Route::put('/ankle/update/{id}', [AnkleController::class, 'update']);
    Route::get('ankle/{id}/destroy', [AnkleController::class, 'destroy'])->name('ankle.destroy');
    Route::get('/ankle/relatorio/{id}', [AnkleController::class, 'relatorio']);


});

Route::middleware(['auth', 'check.RoleUser'])->group(function () {
    Route::get('/exams/{id}', [ExamController::class, 'index'])->name('exams');
    Route::get('/exams/create/{id}', [ExamController::class, 'create']);
    Route::post('/exams/store/{id}', [ExamController::class, 'store']);
    Route::get('/exams/edit/{id}', [ExamController::class, 'edit']);
    Route::put('/exams/update/{id}', [ExamController::class, 'update']);
    Route::get('exams/{id}/destroy', [ExamController::class, 'destroy'])->name('exam.destroy');

//Agend
    Route::get('/agend', [AgendController::class, 'index'])->name('agend');
    Route::post('agend/action', [AgendController::class, 'action']);
});   


Route::get('/pdfs/pdf_avaliação/{id}', [PDFController::class, 'gera_pdf_avaliation']);
Route::get('/pdfs/pdf_historic/{id}', [PDFController::class, 'gera_pdf_historic']);
Route::get('/pdfs/pdf_general/{id}', [PDFController::class, 'gera_pdf_general']);
Route::get('/pdfs/pdf_past/{id}', [PDFController::class, 'gera_pdf_past']);
Route::get('/pdfs/pdf_redflag/{id}', [PDFController::class, 'gera_pdf_redflags']);
Route::get('/pdfs/pdf_shoulder/{id}', [PDFController::class, 'gera_pdf_shoulder']);
Route::get('/pdfs/pdf_prontuary/{id}', [PDFController::class, 'gera_pdf_prontuary']);
Route::get('/pdfs/pdf_dynamop/{id}', [PDFController::class, 'gera_pdf_dynamop']);
