<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <a href="{{ route('author') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Add Author</a>
    <h1>Total Author: {{ count($authors_with_blogs) }}</h1>
    <h1 class="text-2xl font-bold mb-6 text-center">Author wise blog list</h1>
    <div class="min-h-screen flex items-center justify-center">
       
       <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>               
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Blog Title</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($authors_with_blogs as $author)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $author->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $author->blog->title ?? 'No Blog Yet' }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $author->blog->content ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
</div>


<div>

    <h1>Blog with author</h1>

    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>               
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Blog Title</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Content</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author Name</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($blogs_with_authors as $blog)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">{{ $blog->title }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $blog->content }}</td>
                <td class="px-6 py-4 whitespace-nowrap">{{ $blog->author->name ?? 'No Author' }}</td>
            </tr>
            @endforeach
        </tbody>

</div>
</body>
</html>