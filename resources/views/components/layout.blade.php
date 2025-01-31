<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
  <header class="bg-gray-900 text-white shadow-lg">
    <nav class="container mx-auto flex justify-between items-center p-4">
        <a href="{{route('posts.index')}}" class="text-3xl font-bold text-red-500">Website</a>
        @auth
        <div class="relative grid place-items-center" x-data="{open:false}">
          <button 
          type="button" 
          class="w-16 h-16 rounded-full overflow-hidden border-2 border-gray-300 shadow-lg"
          @click="open=!open"
          >
              <img src="https://picsum.photos/200" alt="Profile" class="w-full h-full object-cover">
          </button>
          <div 
          class="bg-white shadow-lg absolute top-10 right-0 rounded-lg overflow-hidden font-light w-48"
          x-show="open" @click.outside="open=false"
          >
            <p class="px-4 py-2 text-gray-700 font-medium border-b">{{auth()->user()->name}}</p>
            <a href="{{route('dashboard')}}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 transition duration-300">Dashboard</a>
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button class="block px-4 py-2 text-gray-600 hover:bg-gray-100 transition duration-300">
                Logout
              </button>
            </form>
        </div>
        
      </div>
      
        @endauth
        @guest
        <ul class="flex items-center space-x-6">
          <li>
              <a href="{{route('login')}}" class="text-lg font-medium hover:text-red-400 transition duration-300">Login</a>
          </li>
          <li>
              <a href="{{route('register')}}" class="text-lg font-medium hover:text-red-400 transition duration-300">Register</a>
          </li>
      </ul>    
        @endguest
    </nav>
</header>

                <main class="py-8 px-4 mx-auto max-w-screen-lg">
        {{$slot}}
    </main>
</body>
</html>