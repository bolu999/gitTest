@extends('layouts.app')
@section('title',  $sitesetting->title)
@section('work_hour',  $sitesetting->work_hour)
@section('phone',  $sitesetting->phone_number)
{{-- @section('email',  $sitesetting->email) --}}
@section('facebook',  $sitesetting->facebook)
@section('instagram',  $sitesetting->instagram)
@section('twitter',  $sitesetting->twitter)
@section('content')
{{-- <example-component/> --}}
<router-view />
@endsection