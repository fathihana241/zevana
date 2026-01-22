@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center px-6 py-10 bg-gray-100">
    <div class="bg-white p-8 rounded-xl shadow max-w-lg w-full text-center">
        <h2 class="text-2xl font-bold mb-4 text-green-600">Success!</h2>
        <p class="mb-4">Your order has been successfully placed.</p>
        <a href="{{ url('/') }}" class="px-6 py-2 bg-[#c96833] text-white rounded-lg hover:bg-[#a55328] transition">
            Back to Home
        </a>
    </div>
</div>
@endsection
