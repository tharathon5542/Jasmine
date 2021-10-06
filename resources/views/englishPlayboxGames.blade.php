@extends('layout')

@section('content')

<h3>English Play Box 1 Games</h3><br>
<div class="index-content-container-column">
    <a href="{{ route('englishPlayBoxGames', [1,1]) }}" class="{{ $unit === '1' ? 'active' : '' }}">English Play Box 1 : Learning Unit 1</a>
    <a href="{{ route('englishPlayBoxGames', [2,1]) }}" class="{{ $unit === '2' ? 'active' : '' }}">English Play Box 1 : Learning Unit 2</a>
    <a href="{{ route('englishPlayBoxGames', [3,1]) }}" class="{{ $unit === '3' ? 'active' : '' }}">English Play Box 1 : Learning Unit 3</a>
    <a href="{{ route('englishPlayBoxGames', [4,1]) }}" class="{{ $unit === '4' ? 'active' : '' }}">English Play Box 1 : Learning Unit 4</a>
    <a href="{{ route('englishPlayBoxGames', [5,1]) }}" class="{{ $unit === '5' ? 'active' : '' }}">English Play Box 1 : Learning Unit 5</a>
    <a href="{{ route('englishPlayBoxGames', [6,1]) }}" class="{{ $unit === '6' ? 'active' : '' }}">English Play Box 1 : Learning Unit 6</a>
    <a href="{{ route('englishPlayBoxGames', [7,1]) }}" class="{{ $unit === '7' ? 'active' : '' }}">English Play Box 1 : Learning Unit 7</a>
</div><br>

<h4>Learning Unit {{ $unit }} : Sub Unit</h4><br>
<div class="index-content-container-column">
    <a href="{{ route('englishPlayBoxGames', [$unit,1])}}" class="{{ $subUnit === '1' ? 'active' : '' }}">Learning Unit {{ $unit }} : Part 1</a>
    <a href="{{ route('englishPlayBoxGames', [$unit,2]) }}" class="{{ $subUnit === '2' ? 'active' : '' }}">Learning Unit {{ $unit }} : Part 2</a>
    <a href="{{ route('englishPlayBoxGames', [$unit,3]) }}" class="{{ $subUnit === '3' ? 'active' : '' }}">Learning Unit {{ $unit }} : Part 3</a>
    <a href="{{ route('englishPlayBoxGames', [$unit,4]) }}" class="{{ $subUnit === '4' ? 'active' : '' }}">Learning Unit {{ $unit }} : Part 4</a>
    <a href="{{ route('englishPlayBoxGames', [$unit,5]) }}" class="{{ $subUnit === '5' ? 'active' : '' }}">Learning Unit {{ $unit }} : Part 5</a>
    <a href="{{ route('englishPlayBoxGames', [$unit,6]) }}" class="{{ $subUnit === '6' ? 'active' : '' }}">Learning Unit {{ $unit }} : Part 6</a>
    <a href="{{ route('englishPlayBoxGames', [$unit,7]) }}" class="{{ $subUnit === '7' ? 'active' : '' }}">Learning Unit {{ $unit }} : Part 7</a>
    <a href="{{ route('englishPlayBoxGames', [$unit,8]) }}" class="{{ $subUnit === '8' ? 'active' : '' }}">Learning Unit {{ $unit }} : Part 8</a>
</div><br>

<div class="iframe-container">
    <iframe scrolling="no" src="{{ $game }}" frameborder="0">
    </iframe>
</div>

@endsection
