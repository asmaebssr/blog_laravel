<x-layout>

    <h1 class="text-2xl text-blue-700 pb-2">{{$user->name}} Post's &#9830; {{$posts->total()}}</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($posts as $post) 
            <x-postCard :post="$post"/>
        @endforeach
    </div>

    <div class="mt-4">
        {{$posts->links()}}
    </div>

</x-layout>