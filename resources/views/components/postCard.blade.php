@props(['post', 'full' => false])

<div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">

    @if ($post->image)
    <img src="/storage/{{$post->image}}" alt="post_image">
    @else
    <img src="storage/posts_images/default.jpg" alt="post_image">
    @endif

    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{$post->title}}</h2>
    <a href="" class="text-sm text-gray-500 mb-4">Posted {{$post->created_at->diffForHumans()}} 
        by <a href="{{route('posts.user', $post->user)}}" class="text-red-500">{{$post->user->name}}</a>
        @if ($full)
        <p class="text-gray-700">{{ $post->body }}</p>
    @else
        <p class="text-gray-700">{{ Str::words($post->body, 15) }}</p>
        <a href="{{route('posts.show', $post)}}" class="text-blue-500">Read more &rarr;</a>
    @endif

    <div class="flex justify-end">
        {{$slot}}
    </div>
</div>