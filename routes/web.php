<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Dts\Document;
use App\Http\Livewire\Dts\DocumentCreate;
use App\Http\Livewire\Dts\DocumentEdit;
use App\Http\Livewire\Dts\DocumentOverview;
use App\Http\Livewire\Dts\MyDocuments;
use App\Http\Livewire\Dts\OfficeDocuments;
use App\Http\Livewire\Dts\PendingDocument;
use App\Http\Livewire\Dts\PrivacyPolicy;
use App\Http\Livewire\Dts\ReceivedDocument;
use App\Http\Livewire\Dts\SharedDocuments;
use App\Http\Livewire\Settings\CompanyProfile;
use App\Http\Livewire\User\Dashboard as UserDashboard;
use Illuminate\Support\Facades\Route;

## Rpt
use App\Http\Livewire\Settings\ProfileSettings;
use App\Http\Livewire\Settings\UsersManagement;
use App\Http\Livewire\Settings\Users as UserSettings;
use App\Http\Livewire\TerminalDocument;
use App\Models\Office;
use App\Models\User;

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
## ADD ROLE TO USER
Route::get('/role_add', function () {
    $user = User::find(1);
    $user->assignRole(1);
});
Route::get('/permission_add', function () {
    $user = User::find(1);
    $user->givePermissionTo(2);
});


Route::get('/privacy-policy', PrivacyPolicy::class)->name('Privacy Policy');

Route::get('/', Login::class)->name('login');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

// For grouping prefix and middleware
Route::group(['prefix' => 'user',  'middleware' => 'auth'], function()
{
    Route::get('{user_id}/dashboard', UserDashboard::class)->name('dashboard');
    // Route::ge{user_id}/t('tracking-numbers', TrackingNumbers::class)->name('Tracking Numbers');
    Route::get('{user_id}/my-documents', MyDocuments::class)->name('my-documents');
    Route::get('{user_id}/office-documents', OfficeDocuments::class)->name('office-documents');
    Route::get('{user_id}/shared-documents', SharedDocuments::class)->name('shared-documents');
    Route::get('{user_id}/pending-documents', PendingDocument::class)->name('pending-documents');
    Route::get('{user_id}/received-documents', ReceivedDocument::class)->name('received-documents');
    Route::get('{user_id}/terminal-documents', TerminalDocument::class)->name('terminal-documents');

    Route::get('{user_id}/document/{id}', DocumentOverview::class)->name('document-overview');
    Route::get('{user_id}/document/{tn}/create', DocumentCreate::class)->name('create-document');
    Route::get('{user_id}/document/{id}/edit', DocumentEdit::class)->name('edit-document');
    Route::get('{user_id}/documents/{type}', Document::class)->name('Documents');
    Route::get('{user_id}/settings', UserSettings::class)->name('Users Setting');

    ## USER MANAGEMENT
    Route::get('{user_id}/company-profile', CompanyProfile::class)->name('company-profile');
    Route::get('{user_id}/profile-settings', ProfileSettings::class)->name('profile-settings');
    Route::get('{user_id}/user-management', UsersManagement::class)->name('user-management');
});

// Route::get('/home', Register::class)->name('Register');
// For grouping prefix and middleware

Route::group(['prefix' => 'admin',  'middleware' => 'admin'], function()
{
    Route::get('{user_id}/dashboard', DocumentOverview::class)->name('Admin Dashboard');

});
