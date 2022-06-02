@extends('errors.layouts.error')

@section('title', __('Unauthorized'))
@section('code', '401')
@section('message', __('Unauthorized'))
@section('full-title', __('Oops No such page was found on ' . appName() . '!'))
