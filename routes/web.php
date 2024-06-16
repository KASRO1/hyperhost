<?php

use App\Models\Language;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

use App\Models\News;
use App\Models\Docs;
use App\Models\DataCenters;
use App\Models\ItemsCategory;
use App\Models\Items;
use App\Models\BaseCategory;
use App\Models\Base;
use App\Models\Sliders;
use App\Models\Faq;
use App\Models\FaqCategory;
use \App\Http\Controllers\LanguageController;
use \Spatie\TranslationLoader\LanguageLine;

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
    $data_centers = DataCenters::get();
    $categories = ItemsCategory::get();
    $last_news = News::orderBy('id', 'desc')->limit(3)->get();
    $sliders = Sliders::get();

    return view('main', [
        'data_centers' => $data_centers,
        'categories' => $categories,
        'last_news' => $last_news,
        'sliders' => $sliders,

    ]);
});


Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/base', function ($cat = 0) {
    $categories = BaseCategory::orderBy('order', 'asc')->get();
    $items = Base::orderBy('id', 'desc')->paginate(5);
    if ($cat == 0) {

    } else {

    }
    $acat = '';
    $popular = Base::orderBy('views', 'desc')->limit(5)->get();
    return view('base', [
        'categories' => $categories,
        'active_cat' => $cat,
        'active_cat_info' => $acat,
        'items' => $items,
        'popular' => $popular,
    ]);
})->name('base');

Route::get('/base/search', function ($cat = 0) {
    $categories = BaseCategory::orderBy('order', 'asc')->get();
    $searchPhrase = '%' . trim($_GET['i']) . '%';
    $languageLines = LanguageLine::query()->where('group', 'LIKE', 'base.%')
        ->whereRaw("JSON_EXTRACT(text, '$.en') LIKE ?", [$searchPhrase])
        ->orWhereRaw("JSON_EXTRACT(text, '$.ru') LIKE ?", [$searchPhrase])
        ->first();
    if($languageLines !== null){
    $items = Base::query()->orderBy('id', 'desc')->where('title', $languageLines['group'] . "." . $languageLines['key'])->orWhere('text', $languageLines['group'] . "." . $languageLines['key'])->
        orWhere('key_title_translate', $languageLines['group'] . "." . $languageLines['key'])->orWhere("key_text_translate", $languageLines['group'] . "." . $languageLines['key'])->paginate(5);
    }
    else{
        $items = Base::orderBy('id', 'desc')->where('title', 'LIKE', '%'.trim($_GET['i']).'%')->paginate(5);
    }
    $acat = '';
    $popular = Base::orderBy('views', 'desc')->limit(5)->get();
    return view('base', [
        'categories' => $categories,
        'active_cat' => $cat,
        'active_cat_info' => $acat,
        'items' => $items,
        'popular' => $popular,
    ]);
})->name('base_search');

Route::get('/base/category/{cat}', function ($cat = 0) {
    $categories = BaseCategory::orderBy('order', 'asc')->get();
    $category = BaseCategory::find($cat);
    if ($category == null) {
        return redirect()->route('base');
    }
    $items = Base::orderBy('id', 'desc')->where('category', '=', $cat)->paginate(5);

    $acat = BaseCategory::find($cat);
    $popular = Base::orderBy('views', 'desc')->where('category', '=', $cat)->limit(5)->get();
    return view('base', [
        'categories' => $categories,
        'active_cat' => $cat,
        'active_cat_info' => $acat,
        'items' => $items,
        'popular' => $popular,
    ]);
})->name('base_cat');

Route::get('/base/{id}', function ($id) {
    $base = Base::where('link', '=', $id)->first();
    if ($base == null) {
        return redirect()->route('base');
    }
    $base->views = $base->views + 1;
    $base->save();
    $base_cat = BaseCategory::find($base->category);
    $other = Base::where('category', '=', $base_cat->id)->orderBy('id', 'desc')->limit(4)->get();
    return view('base_article', [
        'base' => $base,
        'base_cat' => $base_cat,
        'other' => $other,
        'keywords' => $base->keywords,
        'descr' => $base->description,
        'title' => $base->title_tag,
    ]);
})->name('base_article');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/servers/{country}', function ($country) {
    $data_center = DataCenters::where('link', '=', $country)->firstOrFail();
    $categories = ItemsCategory::get();

    return view('country', [
        'data_center' => $data_center,
        'type' => "1",
        'categories' => $categories
    ]);
})->name('country');
Route::get('/servers/dedicated/{country}', function ($country) {
    $data_center = DataCenters::where('link', '=', $country)->firstOrFail();
    $categories = ItemsCategory::get();

    return view('country', [
        'data_center' => $data_center,
        'type' => "2",
        'categories' => $categories
    ]);
})->name('country.dedicated');
Route::get('/data-centers', function () {
    $items = DataCenters::get();
    return view('data-centers', [
        'items' => $items
    ]);
})->name('data-centers');

Route::get('/documents', function () {
    $docs = Docs::get();
    return view('documents', [
        'docs' => $docs
    ]);
})->name('documents');

Route::get('/faq', function () {
    $categories = FaqCategory::get();
    return view('faq', [
        'categories' => $categories
    ]);
})->name('faq');

Route::get('/news', function () {
    $news = News::orderBy('id', 'desc')->limit(8)->get();
    return view('news', [
        'news' => $news
    ]);
})->name('news');

Route::get('/news/{id}', function ($id) {
    $news_item = News::where('link', '=', $id)->first();
    $news_item->views = $news_item->views + 1;
    $news_item->save();
    return view('news_item', [
        'item' => $news_item,
        'keywords' => $news_item->keywords,
        'descr' => $news_item->description,
        'title' => $news_item->title_tag,
    ]);
})->name('news_item');

Route::get('/affiliate', function () {
    return view('affiliate');
})->name('affiliate');

Route::get('/payments', function () {
    return view('payments');
})->name('payments');

Route::get('/rules', function () {
    return view('rules');
})->name('rules');

Route::get('/get_tarifs', function () {
    $country = $_GET['country'];
    $category = $_GET['category'];
    $items = Items::where([['country', '=', $country], ['category', '=', $category]])->orderBy('id', 'asc')->get();

    return view('get_tarifs', [
        'items' => $items
    ]);
});

Route::get("/launguage/{id}/set", [\App\Http\Controllers\LanguageController::class, "setLanguage"])->name("language.set:id");


Route::prefix('/admin')->group(function () {
    Route::get('/login', function () {
        //return bcrypt('Rh3tNA8dHa');
        return view('admin.login');
    });
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/', [AdminController::class, 'main']);
    Route::get('/center/new', [AdminController::class, 'data_center_new']);
    Route::post('/center/new', [AdminController::class, 'data_center_new']);
    Route::get('/center/{id}', [AdminController::class, 'data_center']);
    Route::post('/center/{id}', [AdminController::class, 'data_center']);
    Route::get('/center/{id}/tarifs', [AdminController::class, 'data_center_tarifs']);
    Route::get('/center/{id}/tarifs/new', [AdminController::class, 'data_center_tarifs_new']);
    Route::get('/tarif/{id}', [AdminController::class, 'tarif']);

    Route::get("/seo", [AdminController::class, "seo"])->name("seo");
    Route::get("/seo/create", [AdminController::class, "seo_create"])->name("seo.create");
    Route::post("/seo/create", [AdminController::class, "seo_create_post"])->name("seo.create.post");
    Route::get("/seo/{id}/update", [AdminController::class, "seo_update"])->name("seo.update:id");
    Route::post("/seo/{id}/update", [AdminController::class, "seo_update_post"])->name("seo.update.post:id");
    Route::get("/seo/{id}/delete", [AdminController::class, "seo_delete"])->name("seo.delete:id");

    Route::get('/slides', [AdminController::class, 'slides']);
    Route::post('/slides', [AdminController::class, 'slides']);
    Route::get('/slides/{id}/delete', [AdminController::class, 'slide_delete']);

    Route::get("/languages", [AdminController::class, "languages"])->name("languages");
    Route::get("/language/create", [AdminController::class, "language_create"])->name("language.create");
    Route::get("/language/update/{id}", [AdminController::class, "languages_update"])->name("language.update:id");
    Route::get("/language/delete/{id}", [AdminController::class, "language_delete"])->name("language.delete:id");

    Route::post("/language/create", [AdminController::class, "language_create_post"])->name("language.create");
    Route::post("/language/update/{id}", [AdminController::class, "languages_update_post"])->name("language.update.post:id");


    Route::get('/texts', [AdminController::class, 'texts'])->name('texts');
    Route::get('/text/create', [AdminController::class, 'texts_create'])->name('text.create');
    Route::get('/text/{id}/update', [AdminController::class, 'texts_edit'])->name('text.edit:id');
    Route::get('/text/{id}/delete', [AdminController::class, 'text_delete'])->name('text.delete:id');

    Route::post('/text/{id}/update', [AdminController::class, 'text_update_post'])->name('text.update.post:id');
    Route::post('/text/create', [AdminController::class, 'text_create_post'])->name('text.create.post');


    Route::get('/faq', [AdminController::class, 'faq']);

    Route::get('/docs', [AdminController::class, 'docs']);

    Route::get('/news', [AdminController::class, 'news']);

    Route::get('/news/new', [AdminController::class, 'news_new']);
    Route::post('/news/new', [AdminController::class, 'news_new_post']);

    Route::get('/news/{id}', [AdminController::class, 'news_edit']);
    Route::post('/news/{id}', [AdminController::class, 'news_edit_post']);

    Route::get('/base', [AdminController::class, 'base']);

    Route::get('/base/new', [AdminController::class, 'base_new']);
    Route::post('/base/new', [AdminController::class, 'base_new']);

    Route::get('/base/{id}', [AdminController::class, 'base_edit']);
    Route::post('/base/{id}', [AdminController::class, 'base_edit']);


})->withoutMiddleware([\App\Http\Middleware\LangCookieMiddleware::class, \App\Http\Middleware\RouteMiddleware::class]);
Route::post('/send', function () {
    define('TELEGRAM_TOKEN', '1988253669:AAG2pzQ4En-FcCx1VyMJgXCYsZpkBvB_SaY');

    define('TELEGRAM_CHATID', '524311414');

    function message_to_telegram($text)
    {
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_URL => 'https://api.telegram.org/bot' . TELEGRAM_TOKEN . '/sendMessage',
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_POSTFIELDS => array(
                    'chat_id' => TELEGRAM_CHATID,
                    'text' => $text,
                ),
            )
        );
        curl_exec($ch);
    }

    message_to_telegram('Имя: ' . $_POST['name'] . "\nПочта: " . $_POST['email'] . "\nТелефон: " . $_POST['tel'] . "\nПроблема: " . $_POST['text']);
});
