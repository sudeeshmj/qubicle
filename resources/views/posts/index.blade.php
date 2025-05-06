<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    {{-- Success message --}}
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- Action Button --}}
                    <div class="d-flex justify-content-end mb-3">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">
                            + Create New Post
                        </a>
                    </div>

                    {{-- Posts Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($posts as $index => $post)
                                    <tr>
                                        <td>{{ $posts->firstItem() + $index }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->category->name ?? '-' }}</td>
                                        <td>{{ $post->slug }}</td>
                                        <td class="text-capitalize">{{ $post->status }}</td>
                                        <td>
                                            <a href="{{ route('posts.edit', $post) }}"
                                                class="btn btn-sm btn-outline-primary">Edit</a>

                                            <form action="{{ route('posts.destroy', $post) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger"
                                                    type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No posts found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $posts->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
