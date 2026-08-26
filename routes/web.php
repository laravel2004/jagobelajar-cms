<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBimbelController;
use App\Http\Controllers\BimbelCheckoutController;
use App\Http\Controllers\TryoutCheckoutController;
use App\Http\Controllers\MidtransNotificationController;
use App\Http\Controllers\AdminExamSessionController;
use App\Http\Controllers\AdminFeatureController;
use App\Http\Controllers\AdminHomeContentController;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\FreePackageRegistrationController;
use App\Http\Controllers\BundleCheckoutController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicPageController::class, 'home'])->name('home');
Route::get('/materi', [PublicPageController::class, 'materials'])->name('materials.index');
Route::get('/latihan-soal', [PublicPageController::class, 'quizzes'])->name('quizzes.index');
Route::get('/tryout', [PublicPageController::class, 'tryout'])->name('tryout.index');
Route::get('/tryout/{slug}', [PublicPageController::class, 'tryoutDetail'])->name('tryout.detail');
Route::post('/tryout/{examSession}/free-package-register', [FreePackageRegistrationController::class, 'store'])->name('tryout.free-register');

Route::get('/tryout/bundle/{slug}', [PublicPageController::class, 'bundleDetail'])->name('tryout.bundle.detail');
Route::post('/tryout/bundle/{slug}/checkout', [BundleCheckoutController::class, 'store'])->name('tryout.bundle.checkout');
Route::post('/tryout/bundle/{slug}/free-package-register', [\App\Http\Controllers\BundleFreeRegistrationController::class, 'store'])->name('tryout.bundle.free-register');
Route::get('/tryout/bundle/payment/{payment:order_id}/success', [BundleCheckoutController::class, 'success'])->name('bundle.payment.success');
Route::get('/bimbel', [PublicPageController::class, 'bimbel'])->name('bimbel.index');
Route::get('/bimbel/{slug}', [PublicPageController::class, 'bimbelDetail'])->name('bimbel.detail');
Route::get('/bimbel/payment/success/{payment}', [BimbelCheckoutController::class, 'success'])->name('bimbel.payment.success');
Route::get('/tryout/payment/success/{payment}', [TryoutCheckoutController::class, 'success'])->name('tryout.payment.success');
Route::get('/forum', [PublicPageController::class, 'forum'])->name('forum.index');
Route::get('/keunggulan', [PublicPageController::class, 'keunggulan'])->name('keunggulan.index');
Route::get('/blog', [PublicPageController::class, 'blog'])->name('blog.index');
Route::get('/blog/{slug}', [PublicPageController::class, 'blogDetail'])->name('blog.detail');
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.store');
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.store');
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::match(['get', 'post'], '/midtrans/notification', [MidtransNotificationController::class, 'handle'])->name('midtrans.notification');
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', UserDashboardController::class)->name('user.dashboard');
    Route::get('/user/payment/{payment:order_id}/pay', [\App\Http\Controllers\UserPaymentController::class, 'pay'])->name('user.payment.pay');
    Route::post('/bimbel/{bimbel}/checkout', [BimbelCheckoutController::class, 'store'])->name('bimbel.checkout');
    Route::post('/tryout/{examSession}/checkout', [TryoutCheckoutController::class, 'store'])->name('tryout.checkout');
    Route::post('/tryout/{examSession}/free-package-register', [FreePackageRegistrationController::class, 'store'])->name('tryout.free-register');
});
Route::get('/admin/dashboard', AdminDashboardController::class)->name('admin.dashboard');
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/{user}', [AdminUserController::class, 'show'])->name('admin.users.show');
Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
Route::resource('/admin/bimbel', AdminBimbelController::class)->names('admin.bimbel');
Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
Route::post('/admin/blogs', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
Route::get('/admin/blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{blog}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
Route::delete('/admin/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');
Route::get('/admin/cms-keunggulan', [AdminFeatureController::class, 'index'])->name('admin.features.index');
Route::put('/admin/cms-keunggulan', [AdminFeatureController::class, 'update'])->name('admin.features.update');
Route::get('/admin/cms-beranda', [AdminHomeContentController::class, 'edit'])->name('admin.cms-beranda.edit');
Route::put('/admin/cms-beranda', [AdminHomeContentController::class, 'update'])->name('admin.cms-beranda.update');
Route::get('/admin/sesi-ujian', [AdminExamSessionController::class, 'index'])->name('admin.exam-sessions.index');
Route::post('/admin/sesi-ujian/fetch', [AdminExamSessionController::class, 'fetch'])->name('admin.exam-sessions.fetch');
Route::get('/admin/sesi-ujian/{examSession}/edit', [AdminExamSessionController::class, 'edit'])->name('admin.exam-sessions.edit');
Route::put('/admin/sesi-ujian/{examSession}', [AdminExamSessionController::class, 'update'])->name('admin.exam-sessions.update');

use App\Http\Controllers\AdminExamBundleController;
Route::get('/admin/paket-bundle', [AdminExamBundleController::class, 'index'])->name('admin.exam-bundles.index');
Route::get('/admin/paket-bundle/create', [AdminExamBundleController::class, 'create'])->name('admin.exam-bundles.create');
Route::post('/admin/paket-bundle', [AdminExamBundleController::class, 'store'])->name('admin.exam-bundles.store');
Route::get('/admin/paket-bundle/{examBundle}/edit', [AdminExamBundleController::class, 'edit'])->name('admin.exam-bundles.edit');
Route::put('/admin/paket-bundle/{examBundle}', [AdminExamBundleController::class, 'update'])->name('admin.exam-bundles.update');

use App\Http\Controllers\AdminJenjangController;
Route::get('/admin/jenjang', [AdminJenjangController::class, 'index'])->name('admin.jenjangs.index');
Route::post('/admin/jenjang', [AdminJenjangController::class, 'store'])->name('admin.jenjangs.store');
Route::put('/admin/jenjang/{jenjang}', [AdminJenjangController::class, 'update'])->name('admin.jenjangs.update');
Route::delete('/admin/jenjang/{jenjang}', [AdminJenjangController::class, 'destroy'])->name('admin.jenjangs.destroy');

use App\Http\Controllers\AdminSettingController;
Route::get('/admin/settings/payment', [AdminSettingController::class, 'editPayment'])->name('admin.settings.payment');
Route::post('/admin/settings/payment', [AdminSettingController::class, 'updatePayment'])->name('admin.settings.payment.update');

use App\Http\Controllers\DokuNotificationController;
Route::match(['get', 'post'], '/doku/notification', [DokuNotificationController::class, 'handle'])->name('doku.notification');

Route::get('/mock-doku-payment-page', function (\Illuminate\Http\Request $request) {
    return "<h1>Mock Doku Payment Page</h1>
            <p>Order ID: " . htmlspecialchars($request->query('order_id')) . "</p>
            <p>Because the real Doku keys are not set up yet, this is a mock page.</p>
            <p>If you want to simulate a successful payment, you can manually trigger the webhook.</p>";
});
