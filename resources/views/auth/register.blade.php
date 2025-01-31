<x-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-lg mb-12">
          <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
            Sign Up
          </h2>

              {{-- <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul> --}}

          <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
              <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-gray-700 
                @error('name') ring-2 ring-red-600 @enderror"
                placeholder="Enter your name"
              />
              @error('name')
                <p class="text-red-700">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-4">
              <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
              <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-gray-700 
                @error('email') ring-2 ring-red-600 @enderror"
                placeholder="Enter your email"
              />
              @error('email')
                <p class="text-red-700">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-4">
              <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
              <input
                type="text"
                name="password"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-gray-700
                @error('password') ring-2 ring-red-600 @enderror"
                placeholder="Enter your password"
              />
              @error('password')
                <p class="text-red-700">{{ $message }}</p>
              @enderror
            </div>
            <div class="mb-6">
              <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
              <input
                type="text"
                name="password_confirmation"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-gray-700
                @error('password') ring-2 ring-red-600 @enderror"
                placeholder="Confirm your password"
              />
            </div>


            <button
              type="submit"
              class="w-full bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 transition duration-200"
            >
              Sign Up
            </button>
          </form>
        </div>
    </div>
</x-layout>
