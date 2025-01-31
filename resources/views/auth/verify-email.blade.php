<x-layout>
    <div class="flex flex-col items-center justify-center p-6">
        <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md text-center">
            <h1 class="text-xl font-semibold text-gray-800">Please verify your email through the email we've sent you.</h1>
            
            <p class="text-gray-600 mt-4">Didn't get the email?</p>
            
            <form action="{{route('verification.send')}}" method="POST" class="mt-4">
                @csrf
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-800 transition duration-300">Send again</button>
            </form>
        </div>
    </div>
</x-layout>
