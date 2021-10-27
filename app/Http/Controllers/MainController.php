<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Advantage;
use App\Models\Certificate;
use App\Models\Delivery;
use App\Models\Payment;
use App\Models\PartnerCard;
use App\Models\PartnerText;
use App\Models\Position;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Category;
use App\Models\AboutCompany;
use App\Models\Guarantee;
use App\Models\Product;
use App\Models\Employee;
use App\Models\ContactUs;
use App;
use App\Blog;
use App\Models\HomepageBanner;
use App\Models\Banner;
use App\Models\BannerImage;

class MainController extends Controller
{
    public function index()
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }
        
        $banner = Banner::first();
        $banner_images = BannerImage::all();
        return view('index', [
            'c' => AboutCompany::first()->translate(session('locale')),
            'main_banner' => HomepageBanner::find(1),
            'mobile_banner' => HomepageBanner::find(2),
            'banner' => $banner,
            'banner_images' => $banner_images,
            'advantages' => Advantage::all()->translate(session('locale')),
            'customers' => Customer::all()->take(5),
            'blogs' => Blog::orderBy('created_at', 'desc')->take(3)->get(),
            'categories_menu' => Category::where('available', 1)->orderBy('created_at', 'desc')->get()->translate(session('locale')),
        ]);
    }

    public function company()
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        return view('company', [
            'c' => AboutCompany::first()->translate(session('locale')),
            'advantages' => Advantage::all()->translate(session('locale')),
            'certificates' => Certificate::all()->translate(session('locale'))
        ]);
    }
    public function delivery()
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        return view('delivery', [
            'deliveries' => Delivery::all()->translate(session('locale')),
            'payments' => Payment::all()->translate(session('locale'))
        ]);
    }
    public function partners()
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        return view('partner', [
            'cards' => PartnerCard::all()->translate(session('locale')),
            'texts' => PartnerText::all()->translate(session('locale'))
        ]);
    }

    public function team()
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $positions = Position::all();
        foreach ($positions as $position) {
            $position->employees = Employee::where('position_id', $position->id)->get()->translate(session('locale'));
        }
        return view('team', compact('positions'));
    }

    public function blog()
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        return view('blog', ['blogs' => Blog::all()->sortByDesc('created_at')->translate(session('locale'))]);
    }

    public function blog_show($slug)
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }
        $blog = Blog::where('slug', $slug)->first()->translate(session('locale'));
        if (Blog::find($blog->id + 1) == null) {
            $next_id = Blog::first();
        } else {
            $next_id = Blog::find($blog->id + 1);
        }
        return view('blog-show', [
            'blog' => $blog,
            'products' => Product::where('available', 1)->inRandomOrder()->take(3)->get()->translate(session('locale')),
            'next_id' => $next_id
        ]);
    }

    public function guarange()
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        return view('guarange', ['guarantees' => Guarantee::all()->translate(session('locale'))]);
    }

    public function projects()
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $projects = Project::orderby('created_at', 'desc')->get()->translate(session('locale'));
        foreach ($projects as $project) {
            $deadline = explode(" ", $project->deadline);
            $project->deadline = $deadline;
        }

        return view('project', ['projects' => $projects]);
    }

    public function pageproject($slug)
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        $project = Project::where('slug', $slug)->first()->translate(session('locale'));

        $deadline = explode(" ", $project->deadline);
        $project->deadline = $deadline;

        return view('pageproject', ['project' => $project]);
    }


    public function calculator()
    {
        if (session()->has('locale')) {

            $locale = session('locale');
            App::setLocale($locale);
        } else {
            $locale = session(['locale' => 'ru']);
            App::setLocale('ru');
        }

        return view('calc');
    }

    public function calculation(Request $request)
    {
    }

    public function callback(Request $request)
    {
        ContactUs::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'question' => $request->question,
            'type' => 'Обратный звонок',
        ]);
        return redirect()->back()->with(['contact' => 'contact']);
    }

    public function consultation(Request $request)
    {
        // dd($request->all());
        ContactUs::create([
            'phone' => $request->phone,
            'type' => 'консультация',
        ]);
        return redirect()->back()->with(['contact' => 'contact']);
    }
}
