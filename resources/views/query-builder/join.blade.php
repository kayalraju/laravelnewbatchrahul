<!DOCTYPE html>
<html>
<head>
    <title>Posts List</title>
</head>
<body>

<h2>Posts</h2>

<form method="GET">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search...">

    <select name="sort">
        <option >select option</option>
        <option value="date" {{ request('sort') == 'date' ? 'selected' : '' }}>Date</option>
        <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title</option>
        <option value="employee" {{ request('sort') == 'employee' ? 'selected' : '' }}>Employee</option>
        <option value="category" {{ request('sort') == 'category' ? 'selected' : '' }}>Category</option>
    </select>

    <select name="order">
        <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>ASC</option>
        <option value="desc" {{ request('order', 'desc') == 'desc' ? 'selected' : '' }}>DESC</option>
    </select>

    <button type="submit">Apply</button>
</form>

<br>

<table border="1" cellpadding="8">
    <tr>
        <th>Title</th>
        <th>Employee</th>
        <th>Category</th>
        <th>Date</th>
    </tr>

    @foreach($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->employee }}</td>
        <td>{{ $post->category }}</td>
        <td>{{ $post->created_at }}</td>
    </tr>
    @endforeach
</table>

<br>

{{ $posts->links() }}

</body>
</html>
