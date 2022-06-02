@extends('errors.layouts.error')

@section('title', __('Too Many Requests'))
@section('code', '429')
@section('message', __('Too Many Requests'))
@section('full-title', __('Sorry - Unable to handle these much of requests!'))
