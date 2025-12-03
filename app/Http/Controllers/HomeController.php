<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Sales;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index () {
        // $books = Book::with(['sales' => function (Builder $query) {
        //     $query->orderBy('order_date');
        // }])->get();

        $books = Book::withOrderedSales()->get();
        return view('welcome', ['books'=>$books]);
    }

    public function bydate() {
        $sales = Sales::orderBy('order_date')->with('book')->get();
        return view('bydate', ['sales'=>$sales]);
    }

    public function loadBooks(Request $request) {
        $filenameWithExt = $request->file('file')->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $ext = $request->file('file')->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$ext;

        $path = $request->file('file')->storeAs('public/files', $filenameToStore);

        $fullpath = Storage::path($path);

        header('Content-Type: text/html; charset=utf-8');
        $first = true;
        if (($handle = fopen($fullpath, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, null, ",")) !== FALSE) {
                if (!$first){
                    $title = $data[2];
                    $price = $data[11];
                    $cost = $data[13];
                    $royalty = $data[14];
                    $asin = $data[16];

                    $royalty_date = $data[0];
                    $order_date = $data[1];
                    $qty = $data[10];
                    $asin = $data[16];

                    if (!$book = Book::where('asin', $asin)->first()){
                        $book = Book::create(['asin'=>$asin, 'title'=>$title, 'price'=>$price, 'cost'=>$cost, 'royalty'=>$royalty]);
                    }

                    Sales::create([
                        'royalty_date'=>$royalty_date,
                        'order_date'=>$order_date,
                        'book_id'=>$book->id,
                        'royalty'=>$royalty,
                        'qty' => $qty,
                    ]);
                }
                $first = false;
            }
            fclose($handle);
        }
        return redirect(route('home'));
    }
}
