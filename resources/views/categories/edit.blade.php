<x-app-layout>
    <x-slot name="header">
        <h2>Edit Category</h2>
    </x-slot>

    <div class="container py-4">
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf @method('PUT')
            @include('categories.form', ['category' => $category])
        </form>
    </div>
</x-app-layout>
