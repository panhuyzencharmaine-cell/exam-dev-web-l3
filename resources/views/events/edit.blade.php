@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <h1 class="mb-4">modifier l'evenement</h1>

    <form method="POST" action="{{ route('events.update', $event->id) }}">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label">Title</label>
                <input
                    type="text"
                    name="title"
                    class="form-control"
                    value="{{ old('title', $event->title) }}"
                >

                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Description</label>
                <textarea
                    name="description"
                    class="form-control"
                    rows="3"
                >{{ old('description', $event->description) }}</textarea>

                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Date</label>
                <input
                    type="date"
                    name="event_date"
                    class="form-control"
                    value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}"
                >

                @error('event_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Location</label>
                <input
                    type="text"
                    name="location"
                    class="form-control"
                    value="{{ old('location', $event->location) }}"
                >

                @error('location')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            Save changes
        </button>

    </form>

    <form method="POST"
          action="{{ route('events.destroy', $event->id) }}"
          class="mt-3">

        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">
            Delete event
        </button>

    </form>

</div>

@endsection