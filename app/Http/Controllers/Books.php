<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Books extends Controller
{
    private $ep;
    private $search;

    public function __construct(){
        $this->ep = "https://www.googleapis.com/books/v1/volumes";
        //"https://www.googleapis.com/books/v1/volumes";
        $this->search = "laravel";
    }

    public function list(Request $request){
        if ($request->isMethod('post')) {
            $this->search = $request->input('search');
        }

        $response = Http::get($this->ep."?q=search+".$this->search);
        //dd($response->json());
        return view('books.list', [
                'search' => $this->search,
                'books' => $response->json()
            ]);
    }

    public function delete(Request $request){
        
    }

    public function details($id, Request $request)
    {
        $response = Http::get($this->ep."/".$id);
        //dd($response->json());
        return view('books.details', [
            'search' => $this->search,
            'book' => $response->json()
        ]);
    }
}
