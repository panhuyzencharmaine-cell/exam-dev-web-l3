@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1 class="mb-4">creer un evenement</h1>

    <form method="POST" action="{{ route('events.store') }}">
        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                >

                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea
                    class="form-control"
                    id="description"
                    name="description"
                    rows="3"
                >{{ old('description') }}</textarea>

                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="event_date" class="form-label">Date</label>
                <input
                    type="date"
                    class="form-control"
                    id="event_date"
                    name="event_date"
                    value="{{ old('event_date') }}"
                >

                @error('event_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label for="location" class="form-label">Location</label>
                <input
                    type="text"
                    class="form-control"
                    id="location"
                    name="location"
                    value="{{ old('location') }}"
                >

                @error('location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <a href="/events/create" class="btn btn-primary">
            Creer un evenement
        </a>

    </form>

</div>

@endsection