<?php
/** @var \Illuminate\Database\Eloquent\Collection $orders */
?>

<x-app-layout>
    
    <div class="container mx-auto lg:w-2/3 p-5">
    <h1 class="text-3xl font-bold mb-2">Feedbacks</h1>
    <div class="bg-white rounded-lg p-3 overflow-x-auto">
    <form action="{{ route('feedbacks.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <input type="hidden" name="order_id" value="{{ $order_id }}">
            </div>

            <div class="mb-4">
                <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Feedback Comment:</label>
                <textarea name="message" id="message" rows="4" class="form-textarea rounded-md shadow-sm border p-2 @error('message') border-red-500 @enderror w-100" required style="width:100%">{{ old('message') }}</textarea>
                @error('message')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <button type="submit" class="btn-primary whitespace-nowrap">Submit Feedback</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>
