@extends('errors.layouts.error')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

@section('full-title', __('Sorry - This action is forbidden by ' . appName() . ' Administrators!'))
