<?php

namespace App\Http\Controllers;

use App\Repositories\LinkRepository;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    protected $links;

    public function __construct(LinkRepository $links)
    {
        $this->middleware('auth');

        $this->links = $links;
    }

    public function index(Request $request)
    {
        return view('links.index', [
            'links' => $this->links->forUser($request->user()),
        ]);
    }

    public function create()
    {
        return view('link.create');
    }

    public function store(Request $request)
    {
        $validation = $this->validate($request, [
            'url' => 'required|string|max:1023',
            'name' => 'required|string|max:255',
            'description' => 'string|max:1023',
        ]);
    }
}
