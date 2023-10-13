<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn-primary bg-blue-500 hover:bg-blue-600 active:bg-blue-700 w-full']) }}>
    {{ $slot }}
</button>
