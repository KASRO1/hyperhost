<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeoRequest;
use App\Models\Language;
use App\Models\SEO;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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
use Spatie\TranslationLoader\LanguageLine;

class AdminController extends Controller
{
    public function main()
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $data_centers = DataCenters::get();


        return view('admin.main', [
            'title' => 'Дата центры',
            'data_centers' => $data_centers
        ]);
    }

    public function data_center($id, Request $request)
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        $data_center = DataCenters::find($id);

        if (isset($_POST['save'])) {
            $data_center->name = $_POST['name'];
            if($request->file('img')){
                $data_center->img = $this->saveFile($request->file('img'), 'img/data_centers/');
            }
            else{
                $data_center->img = $data_center['img'];
            }
            if($request->file('big_img')){
                $data_center->big_img = $this->saveFile($request->file('big_img'), 'img/data_centers/');
            }
            else{
                $data_center->big_img = $data_center['big_img'];
            }
            $data_center->text = $_POST['text'];
            $data_center->info = $_POST['info'];
            $data_center->city = $_POST['city'];
            $data_center->link = $_POST['link'];
            $data_center->en_name = $_POST['en_name'];
            $data_center->p_top = $_POST['p_top'];
            $data_center->p_left = $_POST['p_left'];
            $data_center->key_info_translate = DataCenters::compileString($_POST['key_info_translate'], $data_center->id);
            $data_center->key_text_translate = DataCenters::compileString($_POST['key_text_translate'], $data_center->id);
            $data_center->key_title_translate = DataCenters::compileString($_POST['key_title_translate'], $data_center->id);
            $data_center->save();
            return redirect('/admin/center/' . $data_center->id . '?success');
        }

        if (isset($_GET['del'])) {
            $data_center->delete();
            return redirect('/admin');
        }

        return view('admin.center', [
            'title' => 'Дата центр - ' . $data_center->name,
            'data_center' => $data_center,
        ]);

    }

    public function data_center_new(Request $request)
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }


        if (isset($_POST['save'])) {
            $data_center = new DataCenters;
            $data_center->name = $_POST['name'];
            $data_center->img = $this->saveFile($request->file('img'), 'img/data_centers/');
            $data_center->big_img = $this->saveFile($request->file('big_img'), 'img/data_centers/');
            $data_center->text = $_POST['text'];
            $data_center->info = $_POST['info'];
            $data_center->city = $_POST['city'];
            $data_center->link = $_POST['link'];
            $data_center->en_name = $_POST['en_name'];
            $data_center->p_top = $_POST['p_top'];
            $data_center->p_left = $_POST['p_left'];
            $data_center->save();
            return redirect('/admin/center/' . $data_center->id . '?success');
        }

        return view('admin.center_new', [
            'title' => 'Новый Дата центр'
        ]);

    }

    public function data_center_tarifs($id)
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $data_center = DataCenters::find($id);
        $tarifs = Items::where('country', '=', $id)->get();

        return view('admin.tarifs', [
            'title' => 'Тарифы',
            'data_center' => $data_center,
            'tarifs' => $tarifs
        ]);

    }

    public function tarif($id)
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $tarif = Items::find($id);
        $cats = ItemsCategory::get();

        if (isset($_GET['save'])) {
            $tarif->name = $_GET['name'];
            $tarif->proc = $_GET['proc'];
            $tarif->opera = $_GET['opera'];
            $tarif->disk = $_GET['disk'];
            $tarif->port = $_GET['port'];
            $tarif->ip = $_GET['ip'];
            $tarif->virt = $_GET['virt'];
            $tarif->traf = $_GET['traf'];
            $tarif->os = $_GET['os'];
            $tarif->panel = $_GET['panel'];
            $tarif->price = $_GET['price'];
            $tarif->link = $_GET['link'];
            $tarif->category = $_GET['cat'];
            $tarif->save();
            return redirect('/admin/tarif/' . $tarif->id . '?success');
        }

        if (isset($_GET['del'])) {
            $tarif->delete();
            return redirect('/admin');
        }

        return view('admin.tarif', [
            'title' => 'Тариф ' . $tarif->name,
            'tarif' => $tarif,
            'cats' => $cats
        ]);

    }

    public function data_center_tarifs_new($id)
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $cats = ItemsCategory::get();
        $data_center = DataCenters::find($id);

        if (isset($_GET['save'])) {
            $tarif = new Items;
            $tarif->country = $id;
            $tarif->name = $_GET['name'];
            $tarif->proc = $_GET['proc'];
            $tarif->opera = $_GET['opera'];
            $tarif->disk = $_GET['disk'];
            $tarif->port = $_GET['port'];
            $tarif->ip = $_GET['ip'];
            $tarif->virt = $_GET['virt'];
            $tarif->traf = $_GET['traf'];
            $tarif->os = $_GET['os'];
            $tarif->panel = $_GET['panel'];
            $tarif->price = $_GET['price'];
            $tarif->link = $_GET['link'];
            $tarif->category = $_GET['cat'];
            $tarif->save();
            return redirect('/admin/tarif/' . $tarif->id . '?success');
        }

        return view('admin.tarif_new', [
            'title' => 'Новый тариф - ' . $data_center->name,
            'cats' => $cats
        ]);

    }

    public function slides(Request $request)
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $slides = Sliders::get();

        if (isset($_POST['save'])) {
            $slide = Sliders::find($_POST['id']);
            $slide->title = $_POST['title'];
            $slide->text = $_POST['text'];
            $slide->img = $this->saveFile($request->file('img'), 'img/slides/');
            $slide->btn_text = DataCenters::compileString($_POST['btn_text'], $slide->id);
            $slide->btn_link = $_POST['btn_link'];
            $slide->key_text_translate = DataCenters::compileString($_POST['key_text_translate'], $slide->id);
            $slide->key_title_translate = DataCenters::compileString($_POST['key_title_translate'], $slide->id);
            $slide->save();
            return redirect('/admin/slides?success');
        }

        if (isset($_POST['new'])) {
            $slide = new Sliders;
            $slide->title = $_POST['title'];
            $slide->text = $_POST['text'];
            $slide->img = $this->saveFile($request->file('img'), 'img/slides/');
            $slide->btn_text = $_POST['btn_text'];
            $slide->btn_link = $_POST['btn_link'];
            $slide->key_text_translate = "slide_text_";
            $slide->key_title_translate = "slide_text_";
            $slide->save();
            $slide->key_text_translate = DataCenters::compileString($_POST['key_text_translate'], $slide->id);
            $slide->key_title_translate = DataCenters::compileString($_POST['key_title_translate'], $slide->id);
            $slide->save();
            return redirect('/admin/slides?success');
        }

        return view('admin.slides', [
            'title' => 'Слайды',
            'slides' => $slides,
        ]);

    }

    private function saveFile($file, $path)
    {
        $img = $file;
        $file_name = time() . '.' . $img->getClientOriginalExtension();

        $img_path = '/storage/' . $path . $file_name;
        $img->storeAs('public/' . $path, $file_name);
        return $img_path;
    }

    public function slide_delete($id)
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $slide = Sliders::find($id);
        $slide->delete();

        return redirect('/admin/slides');

    }

    public function faq()
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $cats = FaqCategory::get();

        if (isset($_GET['save'])) {
            $faq = Faq::find($_GET['id']);
            $faq->title = $_GET['title'];
            $faq->text = $_GET['text'];
            $faq->key_text_translate = "faq_text_";
            $faq->key_title_translate = "faq_text_";
            $faq->save();
            $faq->key_text_translate = DataCenters::compileString($_GET['key_text_translate'], $faq->id);
            $faq->key_title_translate = DataCenters::compileString($_GET['key_title_translate'], $faq->id);
            $faq->save();
            return redirect('/admin/faq?success');
        }

        if (isset($_GET['del'])) {
            $faq = Faq::find($_GET['id']);
            $faq->delete();
            return redirect('/admin/faq?success');
        }

        if (isset($_GET['new'])) {
            $faq = new Faq;
            $faq->title = $_GET['title'];
            $faq->key_text_translate = "faq_text_";
            $faq->key_title_translate = "faq_text_";
            $faq->text = $_GET['text'];
            $faq->category = $_GET['cat'];
            $faq->save();
            $faq->key_text_translate = DataCenters::compileString($_GET['key_text_translate'], $faq->id);
            $faq->key_title_translate = DataCenters::compileString($_GET['key_title_translate'], $faq->id);
            $faq->save();
            return redirect('/admin/faq?success');
        }

        return view('admin.faq', [
            'title' => 'FAQ',
            'cats' => $cats,
        ]);
    }


    public function docs()
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $docs = Docs::get();

        if (isset($_GET['new'])) {
            $doc = new Docs;
            $doc->name = $_GET['name'];
            $doc->link = $_GET['link'];
            $doc->save();
            return redirect('/admin/docs?success');
        }

        if (isset($_GET['save'])) {
            $doc = Docs::find($_GET['id']);
            $doc->name = $_GET['name'];
            $doc->link = $_GET['link'];
            $doc->save();
            return redirect('/admin/docs?success');
        }

        if (isset($_GET['del'])) {
            $doc = Docs::find($_GET['id']);
            $doc->delete();
            return redirect('/admin/docs?success');
        }

        return view('admin.docs', [
            'title' => 'Документы',
            'docs' => $docs,
        ]);
    }

    public function news()
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }

        $news = News::orderBy('id', 'desc')->paginate(15);


        return view('admin.news', [
            'title' => 'Новости',
            'news' => $news,
        ]);
    }

    public function news_new()
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        return view('admin.news_new', [
            'title' => 'Добавить новость',
        ]);
    }

    public function news_new_post(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }


        $news = new News;
        $news->title = $_POST['title'];
        $news->text = $_POST['text'];
        $news->img = $this->saveFile($request->file('img'), 'img/news/');
        $news->link = $_POST['link'];
        $news->title_tag = $_POST['title_tag'];
        $news->description = $_POST['descr'];
        $news->keywords = $_POST['keys'];
        $news->views = 0;
        $news->date = date('d.m.Y');
        $news->key_text_translate = "news_text_";
        $news->key_title_translate = "news_text_";
        $news->save();
        $news->key_text_translate = DataCenters::compileString($_POST['key_text_translate'], $news->id);
        $news->key_title_translate = DataCenters::compileString($_POST['key_title_translate'], $news->id);
        $news->save();

        return redirect('/admin/news/' . $news->id);


    }

    public function news_edit($id)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }


        $news = News::find($id);


        if (isset($_GET['del'])) {
            $news->delete();
            return redirect('/admin/news/');
        }


        return view('admin.news_edit', [
            'title' => 'Редактировать новость',
            'news' => $news
        ]);
    }

    public function news_edit_post($id, Request $request)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        $news = News::find($id);


        $news->title = $_POST['title'];
        $news->text = $_POST['text'];
        $news->img = $this->saveFile($request->file('img'), 'img/news/');
        $news->link = $_POST['link'];
        $news->title_tag = $_POST['title_tag'];
        $news->description = $_POST['descr'];
        $news->keywords = $_POST['keys'];
        $news->views = 0;
        $news->key_text_translate = DataCenters::compileString($_POST['key_text_translate'], $news->id);
        $news->key_title_translate = DataCenters::compileString($_POST['key_title_translate'], $news->id);
        $news->date = date('d.m.Y');
        $news->save();

        return redirect('/admin/news/' . $news->id);


    }

    public function base()
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }


        $base = Base::orderBy('id', 'desc')->paginate(15);
        $cats = BaseCategory::get();

        if (isset($_GET['add_cat'])) {
            $cat = new BaseCategory;
            $cat->name = $_GET['name'];
            $cat->order = 0;
            $cat->save();
            return redirect('/admin/base');
        }

        if (isset($_GET['delcat'])) {
            $cat = BaseCategory::find($_GET['delcat']);
            $cat->delete();
            $bases = Base::where('category', '=', $_GET['delcat'])->get();
            foreach ($bases as $item) {
                $item->delete();
            }
            return redirect('/admin/base');
        }


        return view('admin.base', [
            'title' => 'База знаний',
            'base' => $base,
            'cats' => $cats
        ]);
    }

    public function base_new(Request $request)
    {

        if (!Auth::check()) {
            return redirect('/admin/login');
        }


        if (isset($_POST['add'])) {
            $base = new Base;
            $base->img = $this->saveFile($request->file('img'), 'img/base/');
            $base->title = $_POST['title'];
            $base->text = $_POST['text'];
            $base->link = $_POST['link'];
            $base->category = $_POST['cat'];
            $base->title_tag = $_POST['title_tag'];
            $base->description = $_POST['descr'];
            $base->keywords = $_POST['keys'];
            $base->views = 0;
            $base->date = date('d.m.Y');
            $base->key_text_translate = "base_text_";
            $base->key_title_translate = "base_text_";
            $base->save();
            $base->key_text_translate = DataCenters::compileString($_POST['key_text_translate'], $base->id);
            $base->key_title_translate = DataCenters::compileString($_POST['key_title_translate'], $base->id);
            $base->save();
            return redirect('/admin/base/' . $base->id);
        }

        $cats = BaseCategory::get();

        return view('admin.base_new', [
            'title' => 'Добавить статью в базу знаний',
            'cats' => $cats
        ]);

    }

    public function base_edit($id, Request $request)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }


        $base = Base::find($id);
        $cats = BaseCategory::get();


        if (isset($_POST['save'])) {
            $base->title = $_POST['title'];
            $base->text = $_POST['text'];
            $base->img = $this->saveFile($request->file('img'), 'img/base/');
            $base->link = $_POST['link'];
            $base->category = $_POST['cat'];
            $base->title_tag = $_POST['title_tag'];
            $base->description = $_POST['descr'];
            $base->keywords = $_POST['keys'];
            $base->key_text_translate = DataCenters::compileString($_POST['key_text_translate'], $base->id);
            $base->key_title_translate = DataCenters::compileString($_POST['key_title_translate'], $base->id);
            $base->save();
            return redirect('/admin/base/' . $base->id);
        }

        if (isset($_GET['del'])) {
            $base->delete();
            return redirect('/admin/base/');
        }


        return view('admin.base_edit', [
            'title' => 'Редактировать статью',
            'base' => $base,
            'cats' => $cats
        ]);
    }

    public function language_create()
    {
        return view('admin.language_new', [
            'title' => 'Добавить язык'
        ]);
    }

    public function languages()
    {
        $languages = Language::all();
        foreach ($languages as $key => $language) {
            $languages[$key]['status'] = $this->implodeStatus([
                'active' => $language['active'],
                'default' => $language['default']
            ]);
        }


        return view('admin.languages', [
            'title' => 'Языки',
            'languages' => $languages
        ]);
    }

    private function implodeStatus(array $statuses)
    {
        $result = [];
        if ($statuses['active']) {
            $result[] = "Активен";
        }
        if ($statuses['default']) {
            $result[] = "По умолчанию";
        }
        $result = implode(", ", $result);
        return $result;
    }

    public function language_create_post(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        $validate = $request->validate([
            'id' => "string|required",
            'icon_path' => "required",
            'name' => "string|required",
            'active' => "nullable|boolean",
            'default' => "nullable|boolean"

        ]);
        $icon = $request->file('icon_path');
        $img_path = '/storage/img/lang/' . $validate['id'] . '.' . $icon->extension();
        $icon->storeAs('public/img/lang', $validate['id'] . '.' . $icon->extension());
        $validate['icon_path'] = $img_path;


        Language::insert($validate);
        return redirect(route("languages"));

    }

    public function languages_update($id)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        $lang = Language::where("id", $id)->first();
        if ($lang['active']) {
            $lang['active'] = "checked";
        } else {
            $lang['active'] = "";
        }
        if ($lang['default']) {
            $lang['default'] = "checked";
        } else {
            $lang['default'] = "";
        }
        return view("admin.language_edit", ["lang" => $lang, "title" => "Редактировать язык"]);
    }

    public function languages_update_post(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        $validate = $request->validate([
            'id' => "string|required",
            'icon_path' => "required",
            'name' => "string|required",
            'active' => "nullable|boolean",
            'default' => "nullable|boolean"

        ]);
        $icon = $request->file('icon_path');
        $img_path = '/storage/img/lang/' . $validate['id'] . '.' . $icon->extension();
        $icon->storeAs('public/img/lang', $validate['id'] . '.' . $icon->extension());
        $validate['icon_path'] = $img_path;

        if (isset($validate['active'])) {
            $validate['active'] = true;
        } else {
            $validate['active'] = false;
        }
        if (isset($validate['default'])) {
            $validate['default'] = true;
        } else {
            $validate['default'] = false;
        }
        Language::where("id", $validate['id'])->update($validate);
        return redirect(route("languages"));

    }

    public function language_delete($id)
    {
        if (!Auth::check()) {
            return redirect('/admin/login');
        }
        Language::where("id", $id)->delete();
        return redirect(route("languages"));
    }


    public function texts()
    {
        $texts = LanguageLine::all();
        return view('admin.texts', [
            'title' => 'Текста',
            'texts' => $texts
        ]);
    }

    public function texts_create()
    {
        $languages = Language::all();
        return view('admin.text_new', [
            'title' => 'Добавить текст',
            'languages' => $languages
        ]);
    }

    public function text_create_post(Request $request)
    {
        $validate = $request->validate([
            'group' => "required|string|max:50",
            'key' => "required|string|max:50",
            'text' => "array|required|max:50",
            'text.*' => "string|required"
        ]);
        $validate['text'] = json_encode($validate['text'], JSON_UNESCAPED_UNICODE);
        LanguageLine::insert($validate);
        return redirect(route("texts"));
    }

    public function text_update_post(Request $request, $id)
    {
        $validate = $request->validate([
            'group' => "required|string|max:50",
            'key' => "required|string|max:50",
            'text' => "array|required|max:50",
            'text.*' => "string|required"
        ]);
//        $validate['text'] = $validate['text'];
        $lang = LanguageLine::find($id);
        $lang->group = $validate['group'];
        $lang->key = $validate['key'];
        $lang->text = $validate['text'];
        $lang->save();

        return redirect(route("texts"));
    }

    public function texts_edit($id)
    {
        $text = LanguageLine::find($id);


        return view('admin.text_edit', [
            'title' => 'Редактировать текст',
            'text' => $text
        ]);
    }

    public function text_delete($id)
    {
        LanguageLine::where("id", $id)->delete();
        return redirect(route("texts"));
    }

    public function seo()
    {
        $seo = SEO::all();
        return view('admin.seo', [
            'title' => 'SEO оптимизация',
            "seo" => $seo
        ]);
    }

    public function seo_create()
    {
        return view('admin.seo_new', [
            'title' => 'Добавить SEO'
        ]);
    }

    public function seo_create_post(CreateSeoRequest $request)
    {
        $validate = $request->validated();
        SEO::insert($validate);
        return redirect(route("seo"));
    }

    public function seo_update($id)
    {

        $seo = SEO::find($id);

        return view('admin.seo_edit', [
            'title' => 'Редактировать SEO',
            'seo' => $seo
        ]);
    }
    public function seo_update_post(CreateSeoRequest $request, $id)
    {
        $validate = $request->validated();
        $seo = SEO::find($id);
        $seo->page_url = $validate['page_url'];
        $seo->title = $validate['title'];
        $seo->keywords = $validate['keywords'];
        $seo->description = $validate['description'];
        $seo->save();
        return redirect(route("seo"));
    }
    public function seo_delete($id)
    {
        SEO::where("id", $id)->delete();
        return redirect(route("seo"));

    }

}
