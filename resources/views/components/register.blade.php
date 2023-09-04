<div>
    @if(session('success'))
    <x-flash-message type="success">
        {{ session('success') }}
    </x-flash-message>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-2">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required autofocus>
            @error('name')
                <x-flash-message type="danger">{{ $message }}</x-flash-message>
            @enderror
        </div>

        <div class="mb-2">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" required>
            @error('email')
                <x-flash-message type="danger">{{ $message }}</x-flash-message>
            @enderror
        </div>

        <div class="mb-2">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
            @error('password')
                <x-flash-message type="danger">{{ $message }}</x-flash-message>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            @error('password_confirmation')
                <x-flash-message type="danger">{{ $message }}</x-flash-message>
            @enderror
        </div>

        <div>
            <button type="submit" class="btn btn-outline-primary">Register</button>
        </div>
    </form>
</div>
