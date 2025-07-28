<thead>
    <th>S.No</th>
    <th>Book Name</th>
    <th>Category</th>
    <th>Author</th>
    <th>Publisher</th>
    <th>Volume</th>
    <th>Issue</th>
    <th>Total Books</th>
    <th>Donated By</th>
    <th>Edition</th>
    <th>Status</th>
    <th>Edit</th>
    <th>Delete</th>
</thead>
<tbody>
@forelse ($books as $book)
    <tr>
        <td class="id">{{ $book->id }}</td>
        <td>{{ $book->name }}</td>
        <td>{{ $book->category->name }}</td>
        <td>{{ $book->auther->name }}</td>
        <td>{{ $book->publisher->name }}</td>
        <td>{{ $book->volume }}</td>
        <td>{{ $book->issue }}</td>
        <td>{{ $book->total_books }}</td>
        <td>{{ $book->donated_by }}</td>
        <td>{{ $book->edition_of_book }}</td>
        <td>
            @if ($book->status == 'Y')
                <span class='badge badge-success'>Available</span>
            @else
                <span class='badge badge-danger'>Issued</span>
            @endif
        </td>
        <td class="edit">
            <a href="{{ route('book.edit', $book) }}" class="btn btn-success">Edit</a>
        </td>
        <td class="delete">
            <form action="{{ route('book.destroy', $book) }}" method="post" class="form-hidden">
                <button class="btn btn-danger delete-book">Delete</button>
                @csrf
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="13">No Books Found</td>
    </tr>
@endforelse
</tbody>
