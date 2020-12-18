@extends('templates.default')

@section("title","Daily Do's")

@section("content")
    <div class="min-h-screen bg-green-800 flex flex-wrap">
        @livewire('login')
        @livewire('signup')
    </div>
@endsection