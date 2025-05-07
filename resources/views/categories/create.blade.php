<x-app-layout>
    <x-slot name="header">
        <h2>Create Category</h2>
    </x-slot>

    <div class="container py-4">
        <form action="{{ route('categories.store') }}" method="POST">
            @include('categories.form')
        </form>
    </div>
</x-app-layout>
