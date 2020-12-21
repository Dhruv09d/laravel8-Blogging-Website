@extends('layouts.app')


@section('content')
        <div class="py-4">
                <h1>{{$title}}</h1>
                <p>This is a Services Page</p>

                @if(count($services) > 0)
                <ul>
                        @foreach($services as $service)
                                <li>{{$service}}</li>
                        @endforeach
                </ul>
                @endif
        </div>
@endsection 
