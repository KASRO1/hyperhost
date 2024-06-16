<?php


use App\Models\Language;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
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
$locale = app()->getLocale();

Breadcrumbs::for('home', function ($trail) use ($locale) {
    $trail->push(__("bread.home"), "/{$locale}");
});
Breadcrumbs::for('contacts', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push(__("bread.contacts"), "/{$locale}/contacts)");
});
Breadcrumbs::for('payments', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push(__("bread.payments"), "/{$locale}/payments)");
});
Breadcrumbs::for('rules', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push(__("Rules.title"), "/{$locale}/rules)");
});
Breadcrumbs::for('data-centers', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push(__("Data-centers.title"), "/{$locale}/data-centers)");
});
Breadcrumbs::for('faq', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push("FAQ", "/{$locale}/faq)");
});
Breadcrumbs::for('affiliate', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push(__("affiliate.title"), "/{$locale}/affiliate)");
});
Breadcrumbs::for('documents', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push(__("documents.title"), "/{$locale}/documents)");
});

Breadcrumbs::for('news', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push(__("News.title"), "/{$locale}/news)");
});

Breadcrumbs::for('about', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push(__("bread.about"), "/{$locale}/about");
});

Breadcrumbs::for('base', function ($trail) use ($locale) {
    $trail->parent('home');
    $trail->push(__("bread.base"), "/{$locale}/base");
});

Breadcrumbs::for('base_cat', function ($trail, $cat) use ($locale) {
    $cat = BaseCategory::where('id', '=', $cat)->first();
    $trail->parent('base');
    $trail->push(__("bread.category") . " " .__($cat['name']) , "/{$locale}/base_cat/" . $cat);
});

