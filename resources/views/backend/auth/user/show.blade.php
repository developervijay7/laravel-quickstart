
@extends('backend.layouts.app')

@section('title', __('View User'))

@section('content')
    <div class="grid lg:grid-cols-12 gap-5">
        <div class="lg:col-span-5">
            <x-backend.card>
                <x-slot name="header">
                    @lang('User Card')
                </x-slot>

                <x-slot name="headerActions">
                    <x-utils.link :href="route('admin.auth.user.index')" :text="__('Back')" title="Go Back">
                        <x-slot name="icon">
                            <x-icons.backspace />
                        </x-slot>
                    </x-utils.link>
                </x-slot>

                <x-slot name="body">
                    <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
                        <div class="relative group text-center">
                            <div class="absolute inset-0 bg-gray-900 opacity-0 hover:opacity-70 rounded-full w-28 h-28 mx-auto">
                                <div class="w-full text-white mt-8 cursor-pointer" onclick="$('#avatar-form').click();">
                                    <svg class="h-8 w-8 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <h2 class="text-white text-xs">Click to {{ $user->profile_picture ? 'Change' : 'Upload' }}</h2>
                                </div>
                            </div>
                            <div class="absolute top-2 right-12">
                                @if($user->profile_picture)
                                    <x-utils.delete-button class="rounded px-1" :action="route('admin.auth.user.edit', $user->id)" title="Delete User Profile Picture" showText="false" />
                                @endif
                            </div>
                            <img src="{{ asset($user->avatar) }}" alt="{{ $user->full_name }}" class="rounded-full mx-auto w-28 h-28">
                        </div>
                        <div class="">
                            <h1 class="text-2xl">{{ $user->first_name }} {{ $user->last_name }}</h1>
                            <h2>{{ $user->type == 'admin' ? 'Administrator' : 'User' }}</h2>
                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            @isset($user->mobile)
                                <a href="tel:{{ $user->mobile }}">{{ $user->mobile }}</a>
                            @endisset
                        </div>
                        <div class="flex gap-x-5">
                            @isset($user->facebook)
                                <x-utils.link class="facebook p-1 inline-flex rounded" :href="$user->facebook" :title="$user->full_name . ' on Facebook'">
                                    <x-slot name="icon">
                                        <x-icons.facebook />
                                    </x-slot>
                                </x-utils.link>
                            @endisset
                            @isset($user->twitter)
                                <x-utils.link class="twitter p-1 inline-flex rounded" :href="$user->twitter" :title="$user->full_name . ' on Twitter'">
                                    <x-slot name="icon">
                                        <x-icons.twitter />
                                    </x-slot>
                                </x-utils.link>
                            @endisset
                            @isset($user->linkedin)
                                <x-utils.link class="linkedin p-1 inline-flex rounded" :href="$user->linkedin" :title="$user->full_name . ' on Linkedin'">
                                    <x-slot name="icon">
                                        <x-icons.linkedin />
                                    </x-slot>
                                </x-utils.link>
                            @endisset
                            @isset($user->youtube)
                                <x-utils.link class="youtube p-1 inline-flex rounded" :href="$user->youtube" :title="$user->full_name . ' on Youtube'">
                                    <x-slot name="icon">
                                        <x-icons.youtube />
                                    </x-slot>
                                </x-utils.link>
                            @endisset
                            @isset($user->instagram)
                                <x-utils.link class="instagram p-1 inline-flex rounded" :href="$user->instagram" :title="$user->full_name . ' on Instagram'">
                                    <x-slot name="icon">
                                        <x-icons.instagram />
                                    </x-slot>
                                </x-utils.link>
                            @endisset
                            @isset($user->website)
                                <x-utils.link class="bg-red-500 p-1 inline-flex rounded" :href="$user->website" :title="$user->full_name . ' Website'">
                                    <x-slot name="icon">
                                        <x-icons.globe />
                                    </x-slot>
                                </x-utils.link>
                            @endisset
                        </div>
                    </div>
                </x-slot>
            </x-backend.card>
        </div>
        <div class="lg:col-span-7">
            <x-backend.card>
                <x-slot name="header">
                    @lang('User Details')
                </x-slot>

                <x-slot name="headerActions">
                    <x-utils.link :href="route('admin.auth.user.index')" :text="__('Back')" title="Go Back">
                        <x-slot name="icon">
                            <x-icons.backspace />
                        </x-slot>
                    </x-utils.link>
                </x-slot>

                <x-slot name="body">
                    <div class="grid grid-cols-1 overflow-x-auto">
                        <table class="">
                            <tr class="odd">
                                <th>@lang('Status')</th>
                                <td>@include('backend.auth.user.includes.status', ['user' => $user])</td>
                            </tr>
                            <tr class="even">
                                <th>@lang('Verified')</th>
                                <td>
                                    <x-utils.link href="#" :title="\Carbon\Carbon::parse($user->email_verified_at)->format('d/m/Y h:i:s A')" class="{{ $user->email_verified_at ? 'bg-green-500' : 'bg-red-500' }} rounded-full px-2 inline-flex text-xs" :text="$user->email_verified_at ? 'Email' : ''" />
                                    <x-utils.link href="#" :title="\Carbon\Carbon::parse($user->mobile_verified_at)->format('d/m/Y h:i:s A')" class="{{ $user->mobile_verified_at ? 'bg-green-500' : 'bg-red-500' }} rounded-full px-2 inline-flex text-xs" :text="$user->mobile_verified_at ? 'Mobile' : ''" />
                                </td>
                            </tr>
                            <tr class="odd">
                                <th>@lang('Designation')</th>
                                <td>{{ $user->designation }}</td>
                            </tr>
                            <tr class="even">
                                <th>@lang('Phone')</th>
                                <td><a href="tel:{{ $user->phone }}">{{ $user->phone }}</a></td>
                            </tr>
                            <tr class="odd">
                                <th>@lang('Date of Birth')</th>
                                <td>
                                    @isset($user->dob)
                                        {{ $user->dob->format('d/m/Y') }}
                                    @endisset
                                </td>
                            </tr>
                            <tr class="even">
                                <th>@lang('Gender')</th>
                                <td>{{ ucwords($user->gender) }}</td>
                            </tr>
                            <tr class="odd">
                                <th>@lang('Timezone')</th>
                                <td>{{ $user->timezone ?? __('N/A') }}</td>
                            </tr>
                            <tr class="even">
                                <th>@lang('Last Known IP Address')</th>
                                <td>{{ $user->last_login_ip ?? __('N/A') }}</td>
                            </tr>
                            @if ($user->isSocial())
                                <tr class="odd">
                                    <th>@lang('Provider')</th>
                                    <td>{{ $user->provider }}</td>
                                </tr>
                                <tr class="even">
                                    <th>@lang('Provider ID')</th>
                                    <td>{{ $user->provider_id }}</td>
                                </tr>
                            @endif
                            <tr class="odd">
                                <th>@lang('Username')</th>
                                <td>{!! $user->username !!}</td>
                            </tr>
                            <tr class="even">
                                <th>@lang('Referer')</th>
                                <td>{{ $user->referrer }}</td>
                            </tr>
                            <tr class="odd">
                                <th>@lang('Roles')</th>
                                <td>{!! $user->roles_label !!}</td>
                            </tr>
                            <tr class="even">
                                <th>@lang('Additional Permissions')</th>
                                <td>{!! $user->permissions_label !!}</td>
                            </tr>
                            <tr class="odd">
                                <th>@lang('Last Login At')</th>
                                <td>
                                    @isset($user->last_login_at)
                                        @displayDate($user->last_login_at) ({{ $user->last_login_at->diffForHumans() }})
                                    @else
                                        @lang('N/A')
                                    @endisset
                                </td>
                            </tr>
                            <tr class="even">
                                <th>@lang('Account Created')</th>
                                <td>@displayDate($user->created_at) ({{ $user->created_at->diffForHumans() }})</td>
                            </tr>
                            <tr class="odd">
                                <th>@lang('Last Updated')</th>
                                <td>@displayDate($user->updated_at) ({{ $user->updated_at->diffForHumans() }})</td>
                            </tr>
                            @if($user->trashed())
                                <tr class="even">
                                    <th>@lang('Account Deleted')</th>
                                    <td>@displayDate($user->deleted_at) ({{ $user->deleted_at->diffForHumans() }})</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </x-slot>
            </x-backend.card>
        </div>
    </div>
@endsection
