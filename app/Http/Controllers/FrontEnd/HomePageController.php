<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Post;
use App\Models\Slider;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index()
    {
        $posts = Post::select(
            'id',
            'name',
            'alias',
            'description',
            'thumbnail',
            'number_view',
            'updated_at'
        )->where('status', 'publish')
            ->orderBy('updated_at', 'DESC')
            ->paginate(12);

        $sliders = Slider::select('id', 'name', 'href', 'description', 'thumbnail')
            ->where('status', 'publish')
            ->orderBy('updated_at', 'DESC')->get();
        return view('frontend.homePage.index', compact('posts', 'sliders'));
    }

    /**
     *  user send add a contact
     *
     *  @param App\Http\Requests\ContactRequest $request
     *  @return \Illuminate\Http\Response
     */
    public function createContact(ContactRequest $request)
    {
        DB::beginTransaction();
        try {
            Contact::create([
                'fullname' => $request->input('fullname'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'content' => $request->input('content'),
                'status' => 'Unprocessed',
            ]);
            DB::commit();
            return redirect()->route('frontend.homePage.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back();
        }
    }
}
