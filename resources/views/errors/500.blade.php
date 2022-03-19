@extends('errors.layouts.error')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))

@section('full-title', __('Sorry - Something bad happened at our side!, Do not worry our engineers are notified about that incident.'))
