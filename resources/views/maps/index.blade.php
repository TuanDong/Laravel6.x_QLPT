@extends('layouts.layout')
@section('title', 'Vi Tri Phong Tro')
@section('content')
    <div class="row">
        <div style="width: 100%; height: 8in; margin-top: 5px;">
            {!! Mapper::render() !!}
        </div>
    </div>
@endsection
