@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{ url('candidate')}}" method="post" enctype="multipart/form-data">
        @csrf
        @include('candidate.form',['Modo'=>'create'])
    </form>

</div>
@endsection