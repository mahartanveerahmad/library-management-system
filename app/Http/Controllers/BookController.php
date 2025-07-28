<?php
namespace App\Http\Controllers;

use App\Models\book;
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;
use App\Models\auther;
use App\Models\category;
use App\Models\publisher;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $query = request('search');
        $books = book::query()
            ->when($query, function ($q) use ($query) {
                $q->where('name', 'like', "%$query%")
                  ->orWhere('volume', 'like', "%$query%")
                  ->orWhere('issue', 'like', "%$query%")
                  ->orWhere('donated_by', 'like', "%$query%")
                  ->orWhere('edition_of_book', 'like', "%$query%")
                  ->orWhere('total_books', 'like', "%$query%")
                  ;
            })
            ->with(['category', 'auther', 'publisher'])
            ->paginate(5);
        return view('book.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebookRequest $request)
    {
        book::create($request->validated() + [
            'status' => 'Y',
            'volume' => $request->volume,
            'issue' => $request->issue,
            'total_books' => $request->total_books,
            'donated_by' => $request->donated_by,
            'edition_of_book' => $request->edition_of_book,
        ]);
        return redirect()->route('books');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        return view('book.edit',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebookRequest  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebookRequest $request, $id)
    {
        $book = book::find($id);
        $book->name = $request->name;
        $book->auther_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;
        $book->volume = $request->volume;
        $book->issue = $request->issue;
        $book->total_books = $request->total_books;
        $book->donated_by = $request->donated_by;
        $book->edition_of_book = $request->edition_of_book;
        $book->save();
        return redirect()->route('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        book::find($id)->delete();
        return redirect()->route('books');
    }
}
