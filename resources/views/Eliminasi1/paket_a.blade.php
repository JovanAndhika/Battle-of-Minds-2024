@extends('layout.mainlayout')

@section('content')
<div>
    <h1>Ini halaman PaketA</h1>
</div>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>
                <button>Edit</button>
                <button>Delete</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Jane Doe</td>
            <td>jane@example.com</td>
            <td>
                <button>Edit</button>
                <button>Delete</button>
            </td>
        </tr>
        <!-- Add more rows as needed -->
    </tbody>
</table>

    <footer>
        <span>Showing 1 to 10 of 300 entries</span>
        <div class="index_buttons"></div>
    </footer>
@endsection