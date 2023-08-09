@extends('layouts.app')

@section('content')
    <style>
        th {width: 25%;}
        .title {font-weight: bolder;
                color: cadetblue;}
    </style>
    <br><br>
    <div class="container">

        <h3 class='title'> Rental requests with PENDING status </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($rentals_pending as $rental)
                <tr>
                    <td><a href="{{ route('rental.show', ['rental_id' => $rental->id]) }}">{{ $rental->title }}</a>  </td>               
                    <td> {{ $rental->authors }} </td>
                    <td> {{ $rental->rental_time }} </td>
                    <td> {{ $rental->deadline }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>


        <h3 class='title'> Accepted and in-time rentals </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($rentals_accepted_intime as $rental)
                <tr>
                    <td><a href="{{ route('rental.show', ['rental_id' => $rental->id]) }}">{{ $rental->title }}</a>  </td>               
                    <td> {{ $rental->authors }} </td>
                    <td> {{ $rental->rental_time }} </td>
                    <td> {{ $rental->deadline }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>


        <h3 class='title'> Accepted late rentals </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($rentals_accepted_late as $rental)
                <tr>
                    <td><a href="{{ route('rental.show', ['rental_id' => $rental->id]) }}">{{ $rental->title }}</a>  </td>               
                    <td> {{ $rental->authors }} </td>
                    <td> {{ $rental->rental_time }} </td>
                    <td> {{ $rental->deadline }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>


        <h3 class='title'> Rejected rental requests </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($rentals_rejected as $rental)
                <tr>
                    <td><a href="{{ route('rental.show', ['rental_id' => $rental->id]) }}">{{ $rental->title }}</a>  </td>               
                    <td> {{ $rental->authors }} </td>
                    <td> {{ $rental->rental_time }} </td>
                    <td> {{ $rental->deadline }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>


        <h3 class='title'> Returned rentals </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th><th>Author</th>
                    <th>Date of Rental</th><th>Deadline</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($rentals_returned as $rental)
                <tr>
                    <td><a href="{{ route('rental.show', ['rental_id' => $rental->id]) }}">{{ $rental->title }}</a>  </td>               
                    <td> {{ $rental->authors }} </td>
                    <td> {{ $rental->rental_time }} </td>
                    <td> {{ $rental->deadline }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br>

    </div>

  
@endsection