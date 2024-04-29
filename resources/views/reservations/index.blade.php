@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservations</h1>
    
    <ul class="list-group mt-3">
        @foreach($reservations as $reservation)
            <li class="list-group-item">
                {{ $reservation->nom }} - {{ $reservation->equipement->nom }}
                <a href="{{ route('reservations.show', $reservation->id) }}" class="btn btn-info btn-sm">View</a>
                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
