<x-app-layout>
    <div class="mx-auto w-48 h-48 mt-12">
        <img class="rounded-full" src="https://i.pinimg.com/564x/eb/71/57/eb7157902a2b0f1737e1d2e8ef55df48.jpg" alt="">
    </div>
    <form action="{{ route('password.email') }}" method="post" class="w-[400px] mx-auto p-6 my-4">
        @csrf
        <h2 class="text-2xl font-semibold text-center mb-5">
            Enter your Email to reset password
        </h2>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <p class="text-center text-gray-500 mb-6">
            or
            <a
                href="{{ route('login') }}"
                class="text-blue-600 hover:text-blue-500"
            >
                login with existing account
            </a>
        </p>

        <div class="mb-3">
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                     autofocus placeholder="Enter your Email Address"/>
        </div>
        <button
            class="btn-primary bg-blue-500 hover:bg-blue-600 active:bg-blue-700 w-full"
        >
            Email Password Reset Link
        </button>
    </form>
</x-app-layout>
