@extends('layouts.app')
@section('content')
    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">Add Book</h2>
                </div>
                <div class="offset-md-7 col-md-2">
                    <a class="add-new" href="{{ route('books') }}">All Books</a>
                </div>
            </div>
            <div class="row">
                <div class="offset-md-3 col-md-6">
                    <form class="yourform" action="{{ route('book.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label>Book Name</label>
                            <input type="text" class="form-control @error('name') isinvalid @enderror"
                                placeholder="Book Name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Volume</label>
                            <input type="text" class="form-control @error('volume') isinvalid @enderror" name="volume" value="{{ old('volume') }}">
                            @error('volume')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Issue</label>
                            <input type="text" class="form-control @error('issue') isinvalid @enderror" name="issue" value="{{ old('issue') }}">
                            @error('issue')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Total Books</label>
                            <input type="number" class="form-control @error('total_books') isinvalid @enderror" name="total_books" value="{{ old('total_books') }}">
                            @error('total_books')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Donated By</label>
                            <input type="text" class="form-control @error('donated_by') isinvalid @enderror" name="donated_by" value="{{ old('donated_by') }}">
                            @error('donated_by')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Edition of Book</label>
                            <input type="text" class="form-control @error('edition_of_book') isinvalid @enderror" name="edition_of_book" value="{{ old('edition_of_book') }}">
                            @error('edition_of_book')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control @error('category_id') isinvalid @enderror " name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <select class="form-control @error('auther_id') isinvalid @enderror " name="auther_id" required>
                                <option value="">Select Author</option>
                                @foreach ($authors as $author)
                                    <option value='{{ $author->id }}'>{{ $author->name }}</option>";
                                @endforeach
                            </select>
                            @error('auther_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Publisher</label>
                            <select class="form-control @error('publisher_id') isinvalid @enderror " name="publisher_id" required>
                                <option value="">Select Publisher</option>
                                @foreach ($publishers as $publisher)
                                    <option value='{{ $publisher->id }}'>{{ $publisher->name }}</option>";
                                @endforeach
                            </select>
                            @error('publisher_id')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <input type="submit" name="save" class="btn btn-danger" value="save" required>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
