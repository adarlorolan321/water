<x-app-layout>
    <div class="mx-auto w-48 h-48 mt-12">
        <img class="rounded-full" src="https://i.pinimg.com/564x/eb/71/57/eb7157902a2b0f1737e1d2e8ef55df48.jpg" alt="">
    </div>
    <form
        action="{{ route('register') }}"
        method="post"
        class="w-[400px] mx-auto p-6 my-4"
    >
        @csrf

        <h2 class="text-2xl font-semibold text-center mb-4">Create an account</h2>
        <p class="text-center text-gray-500 mb-3">
            or
            <a
                href="{{ route('login') }}"
                class="text-sm text-blue-700 hover:text-blue-600 hover:font-semibold"
            >
                login with existing account
            </a>
        </p>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <div class="mb-4">
            <x-input placeholder="Your name" type="text" name="name" :value="old('name')" />
        </div>
        <div class="mb-4">
            <x-input placeholder="Your Email" type="email" name="email" :value="old('email')" />
        </div>
        <div class="mb-4">
            <x-input placeholder="Password" type="password" name="password"/>
        </div>
        <div class="mb-4">
            <x-input placeholder="Repeat Password" type="password" name="password_confirmation"/>
        </div>

        <button
            class="btn-primary bg-blue-500 hover:bg-blue-600 active:bg-blue-700 w-full"
        >
            Signup
        </button>
    </form>
</x-app-layout>
