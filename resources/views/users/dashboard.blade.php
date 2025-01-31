<x-layout>
    <h1 class="text-2xl text-blue-800 font-bold mb-6">Welcome, {{ auth()->user()->name }}, you have <span class="text-red-600">{{ $posts->total() }}</span> posts</h1>
    

    <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200 max-w-lg mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Create New Post</h2>

        @if (session('success'))
            <div class="flex justify-center mb-4">
                <x-flashMsg msg="{{ session('success') }}" bg="bg-green-500" />
            </div>
        @elseif (session('delete'))
            <div class="flex justify-center mb-4">
                <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
            </div>
        @endif
    

        
        <form 
            action="{{ route('posts.store') }}" 
            method="POST" 
            class="space-y-4"
            enctype="multipart/form-data"
            >
            @csrf
            <!-- Title Input -->
            <div>
                <label for="title" class="block text-gray-700 font-medium">Title:</label>
                <input type="text" id="title" name="title" 
                    class="w-full mt-1 p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none
                    @error('title') ring-2 ring-red-600 @enderror" 
                    placeholder="Enter post title" 
                    value="{{old("title")}}"
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
                    >{{old('body')}}</textarea>
                    @error('body')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror

            </div>

            <!-- Post Image -->
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
                Publish Post
            </button>
        </form>
    </div>

    <h1 class="text-blue-500 text-3xl font-bold mb-6">Your Latest Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post) 
          <x-postCard :post="$post">
            <a class="text-white bg-green-500 rounded-md p-1 mr-2" href="{{route('posts.edit', $post)}}">Upadte</a>
            <form action="{{route('posts.destroy', $post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-white bg-red-500 rounded-md p-1">Delete</button>
            </form>
          </x-postCard>
        @endforeach
    </div>
    <div class="mt-4">
        {{$posts->links()}}
    </div>
</x-layout>
