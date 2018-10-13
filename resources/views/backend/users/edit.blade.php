@extends('layouts.backend.master')

@section('title', $user->fullname)

@section('breadcrumb')
<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
    <h4 class="page-title">{{$user->fullname}} </h4>
</div>
<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
    <ol class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
        <li><a href="{{route('admin.user.index')}}">List User</a></li>
        <li class="active">{{$user->fullname}}</li>
    </ol>
</div>
@stop

@section('content')
<form class="form-horizontal form-material" method="POST">
    @include('backend.users.components.form')
</form>
@stop