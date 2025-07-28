@extends('layouts.app')
@section('content')

    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h2 class="admin-heading">All Books</h2>
                </div>
                <div class="offset-md-5 col-md-4">
                    <form method="GET" action="{{ route('books') }}" class="form-inline float-right mb-2">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Search books..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                </div>
                <div class="col-md-12 mb-2">
                    <a class="add-new" href="{{ route('book.create') }}">Add Book</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="message"></div>
                    <table class="content-table" id="books-table">
                        @include('book.partials.table', ['books' => $books])
                    </table>
                    {{ $books->links('vendor/pagination/bootstrap-4') }}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $("input[name='search']").on('keyup', function() {
            var search = $(this).val();
            $.ajax({
                url: "{{ url('books/ajax-search') }}",
                type: "GET",
                data: { search: search },
                success: function(data) {
                    $('#books-table').html(data);
                }
            });
        });
    });
    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
