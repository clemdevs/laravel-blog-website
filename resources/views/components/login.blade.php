@if(session('success'))
<x-flash-message type="success">
    {{ session('success') }}
</x-flash-message>
@endif

<div>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required autofocus>
            @error('email')
                <x-flash-message type="danger">{{ $message }}</x-flash-message>
            @enderror
        </div>

        <div class="form-group mb-4">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
            @error('password')
                <x-flash-message type="danger">{{ $message }}</x-flash-message>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-outline-success">Login</button>
        </div>
    </form>
</div>
