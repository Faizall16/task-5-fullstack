@extends('layouts.app')
@section('content')
    {{$articles->title}} | {{$articles->created_at}} <br>
    {{$articles->content}}<br>
@endsection