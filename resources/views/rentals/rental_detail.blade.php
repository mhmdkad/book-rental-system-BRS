@extends('layouts.app')

@section('content')
    <style>
        .title {font-weight: bolder;
                color: cadetblue;}
        td:nth-child(2) {padding: 3px 0px 13px 60px;
            font-size: large;}
        .inner_titles {color: cadetblue;
                       padding-top: 24px;}
        .status {  color: palevioletred;}
    </style>

    <div class="container">
        <h1 class="title"> Book Rental Details</h1>
        <br>
        <div class="row">
            <div class="col-6">
                <table class="">
            
                    <tbody>
                        <tr>
                            <td olspan="2" class="inner_titles"><h2>Book</h2></td>
                        </tr>
                        <tr>
                            <td><b>Title</b></td>
                            <td>{{$rental_details[0]->title}}</td>
                        </tr>
                        <tr>
                            <td><b>Author</b></td>
                            <td>{{$rental_details[0]->authors}}</td>
                        </tr>
                        <tr>
                            <td><b>Date</b></td>
                            <td>{{$rental_details[0]->deadline}}</td>
                        </tr>
                        <tr>                            
                            <td olspan="2" class="inner_titles"><h2>Rental Info</h2></td>
                        </tr>
                        <tr>
                            <td><b>Name of Reader</b></td>
                            <td>{{$rental_details[0]->r_name}}</td>
                        </tr>
                        <tr>
                            <td><b>Request Date</b></td>
                            <td>{{$rental_details[0]->request_processed_at}}</td>
                        </tr>
                        <tr>
                            <td><b>status</b></td>
                            <td class="status">{{$rental_details[0]->status}}</td>
                        </tr>
                        {!! $html !!}

                    </tbody>
                </table>

                <br>

                @auth 
                    @if (Auth::user()->is_librarian == 1)

                        <form action="{{ route('rentals.update', ['rental_id' => $rental_details[0]->id]) }}" method="POST">
                            {{-- HTTP: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS,  --}}
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="status" >Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                                    @foreach($status_list as $status)
                                        @if($status == old('status', $rental_details[0]->status))
                                            <option value="{{$status}}" selected="selected">{{$status}}</option>
                                        @else
                                            <option value="{{$status}}">{{$status}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                         
                            <div class="form-group">
                                <label for="deadline">Deadline</label>
                                <input type="datetime-local" name="deadline" class="form-control @error('deadline') is-invalid @enderror" id="deadline" 
                                    value="{{ old('deadline', $rental_details[0]->deadline) }}">
                                @error('deadline')
                                    <div class="invalid-feedback">
                                    {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Set Status</button>
                            </div>

                        </form>

                    @endif
                @endauth
            </div>

        </div>
        <br>
        
        
        
    </div>
    
  
@endsection