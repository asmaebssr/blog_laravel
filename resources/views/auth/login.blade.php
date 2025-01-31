<x-layout>
  <div class="flex items-center justify-center min-h-screen">
      <div class="w-full max-w-md p-6 bg-white rounded-2xl shadow-lg">
          <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">
              Login
          </h2>

          <form action="{{ route('login') }}" method="POST">
              @csrf
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
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
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
                  <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                  @enderror
              </div>
              <div class="mb4 pb-3">
                <input 
                type="checkbox"
                name="remember"
                >
                <label for="remember">Remember me</label>
              </div>
              @error('failed')
              <p class="text-xl pb-2 text-red-600 mt-1">{{ $message }}</p>
              @enderror

              <div class="mb-2">
                <input type="checkbox" name="subscribe" id="subscribe">
                <label for="subscribe">Subscribe to our newsletter</label>
              </div>

              <button
                  type="submit"
                  class="w-full bg-gray-700 text-white py-2 px-4 rounded-lg hover:bg-gray-800 shadow transition duration-200"
              >
                  Login
              </button>
          </form>
      </div>
  </div>
</x-layout>
