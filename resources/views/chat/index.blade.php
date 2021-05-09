@extends('layouts.app')

@section('content')

<Chat
  :room_id = "{{ $room_id }}"
>
@endsection
