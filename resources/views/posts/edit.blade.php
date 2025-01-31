<x-layout>
    <a class="text-blue-400" href="{{route('dashboard')}}">&larr; Go back to your dashboard</a>

    <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 max-w-lg mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Your Post</h2>
        <form enctype="multipart/form-data" action="{{ route('posts.update', $post) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <!-- Title Input -->
            <div>
                <label for="title" class="block text-gray-700 font-medium">Title:</label>
                <input type="text" id="title" name="title" 
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none
                    @error('title') ring-2 ring-red-600 @enderror" 
                    placeholder="Enter post title" 
                    value="{{$post->title}}"
                    >
                    @error('title')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
        
            </div>
        
            <!-- Body Textarea -->
            <div>
                <label for="body" class="block text-gray-700 font-medium">Body:</label>
                <textarea id="body" name="body" rows="5" 
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none
                    @error('body') ring-2 ring-red-600 @enderror" 
                    placeholder="Write your post here..." 
                    >{{$post->body}}</textarea>
                    @error('body')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
        
            </div>

            <div>
                @if ($post->image)
                <label class="block text-gray-700 font-medium pb-2">Current cover photo:</label>
                {{-- @dd($post->image) --}}
                {{-- <img src="{{Storage::url($post->image)}}" alt="post_image"> --}}
                {{-- <img src="/storage/{{$post->image}}" alt="post_image"> --}}
                <img src="{{asset('storage/' .$post->image)}}" alt="post_image">
                @endif
            </div>

            <div class="flex flex-col space-y-2">
                <label for="image" class="text-gray-700 font-medium">Cover Photo</label>
                <input type="file" name="image" id="image" 
                       class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            @error('image')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
            @enderror
        
            <!-- Submit Button -->
            <button type="submit" 
                class="w-full bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                Edit Post
            </button>

        </form>
    </div>
</x-layout>