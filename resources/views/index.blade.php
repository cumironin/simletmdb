@extends('layouts.main')


@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">

            <h2 class="uppercase tracking-wider text-orange-500 text-lg font-semibold">Popular Movies</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                @foreach ($popularMovies as $movie)
                    <div class="mt-8">
                        <a href="{{ route('movies.show', $movie['id']) }}">
                            <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}"  class="hover:opacity-70 transition ease-in-out duration-150"> 
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('movies.show', $movie['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $movie['title'] }}</a>
                            <div class="flex items-center text-gray-400 text-sm mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                                <span>{{$movie['vote_average'] * 10 . '%'}}</span>
                                <span class="mx-2">|</span>
                                <span>{{\Carbon\Carbon::parse($movie['release_date'])->format('M d, Y')}}</span>
                            </div>
                            <div class="text-gray-400 text-sm">
                                @foreach ($movie['genre_ids'] as $genre)
                                    {{$genres->get($genre)}}@if(!$loop->last), @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection
