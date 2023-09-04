@extends('base.guest')

@section('guest-content')
    <h1>Contact Us</h1>
    <p>Contact the owner of this blog:</p>
    @if (isset($owner))
        <ul class="list-unstyled">
            <li>Name: {{ $owner->name }}</li>
            <li>Email: {{ $owner->email }}</li>

            <form method="POST" action="{{ route('contact.send') }}">
                @csrf

                <div class="form-group mb-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                    @error('name')
                        <x-flash-message type="danger">{{ $message }}</x-flash-message>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                    @error('email')
                        <x-flash-message type="danger">{{ $message }}</x-flash-message>
                    @enderror
                </div>

                <div class="form-group mb-2">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="form-control" rows="4" required></textarea>
                    @error('message')
                        <x-flash-message type="danger">{{ $message }}</x-flash-message>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>

        </ul>
    @else
        <p>No owner information available.</p>
    @endif
@endsection
