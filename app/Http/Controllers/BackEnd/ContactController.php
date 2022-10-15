<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Contact;
use Illuminate\Http\Request;

/**
 * @return View
 */
class ContactController extends Controller
{
    /**
     *  user send add a contact
     *
     *  @param App\Http\Requests\Request $request
     *  @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::select(
            'id',
            'fullname',
            'phone',
            'email',
            'content',
            'status',
            'created_at'
        )
            ->where('fullname', 'LIKE', '%' . $request->search . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(DEFAULT_PAGINATE);
        return view('backend.contact.index', compact('contacts'));
    }
}
