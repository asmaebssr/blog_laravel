<x-layout>
    <h1 class="text-blue-500 text-3xl font-bold mb-6">Latest Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post) 
            <x-postCard :post="$post"/>
        @endforeach
    </div>

    <div class="mt-4">
        {{$posts->links()}}
    </div>
</x-layout>
