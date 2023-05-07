@extends('backend.layouts.app')

@section('title', __('Update User Profile : ' . $logged_in_user->first_name . ' ' . $logged_in_user->last_name))

@section('content')
    <div class="grid grid-cols-1 xl:grid-cols-2">
        <x-forms.patch :action="route('admin.profile.update')">
            <x-backend.card>
                <x-slot name="header">
                    @lang('Update User Profile')
                </x-slot>

                <x-slot name="body">
                    <div class="py-2">
                        <label for="salutation">Salutation</label>
                        <select name="salutation" id="salutation" class="w-full" data-placeholder="Please select salutation">
                            <option value=""></option>
                            <option value="Mr." @selected(old('salutation') ?? $logged_in_user->salutation == 'Mr.')>Mr.</option>
                            <option value="Mrs." @selected(old('salutation') ?? $logged_in_user->salutation == 'Mrs.')>Mrs.</option>
                            <option value="Dr." @selected(old('salutation') ?? $logged_in_user->salutation == 'Dr.')>Dr.</option>
                            <option value="Er." @selected(old('salutation') ?? $logged_in_user->salutation == 'Er.')>Er.</option>
                            <option value="Adv." @selected(old('salutation') ?? $logged_in_user->salutation == 'Adv.')>Adv.</option>
                            <option value="Ms." @selected(old('salutation') ?? $logged_in_user->salutation == 'Ms.')>Ms.</option>
                        </select>
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="text" label="{{ __('First Name') }}" placeholder="{{ __('First Name') }}" name="first_name" value="{{ old('first_name') ?? $logged_in_user->first_name }}" maxlength="100" required />
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="text" label="{{ __('Last Name') }}" placeholder="{{ __('Last Name') }}" name="last_name" value="{{ old('last_name') ?? $logged_in_user->last_name }}" maxlength="100" />
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="email" label="{{ __('Email Address') }}" placeholder="{{ __('Email Address') }}" name="email" value="{{ old('email') ?? $logged_in_user->email }}" maxlength="100" readonly required />
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="tel" label="{{ __('Mobile Number') }}" placeholder="{{ __('Mobile Number') }}" name="mobile" value="{{ old('mobile') ?? $logged_in_user->mobile }}" maxlength="10" minlength="10" required />
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="text" label="{{ __('Username') }}" placeholder="{{ __('Username') }}" name="username" value="{{ old('username') ?? $logged_in_user->username }}" maxlength="100" required />
                    </div>
                    <div class="py-2">
                        <x-bladewind.radio-button label="Male" name="gender" value="male" checked="{{ old('gender') ?? $logged_in_user->gender == 'male' }}" />
                        <x-bladewind.radio-button label="Female" name="gender" value="female" checked="{{ old('gender') ?? $logged_in_user->gender == 'female' }}" />
                        <x-bladewind.radio-button label="Transgender" name="gender" value="transgender" checked="{{ old('gender') ?? $logged_in_user->gender == 'transgender' }}" />
                        <x-bladewind.radio-button label="Others" name="gender" value="others" checked="{{ old('gender') ?? $logged_in_user->gender == 'others' }}" />
                    </div>
                    <div class="py-2">
                        <label for="birthdate">Date of Birth</label>
                        <x-bladewind.datepicker label="{{ __('Date of Birth') }}" placeholder="{{ __('Date of Birth') }}" name="birthdate" default_date="{{ $logged_in_user->birth_date ?? old('birthdate') }}" required />
                    </div>
                    <div class="py-2">
                        <label for="social_category">Social Category</label>
                        <select name="social_category" id="social_category" class="w-full" data-placeholder="Please select social category">
                            <option value=""></option>
                            <option value="General" @selected(old('social_category') ?? $logged_in_user->social_category == 'General')>General</option>
                            <option value="SC" @selected(old('social_category') ?? $logged_in_user->social_category == 'SC')>SC</option>
                            <option value="OBC" @selected(old('social_category') ?? $logged_in_user->social_category == 'OBC')>OBC</option>
                            <option value="ST" @selected(old('social_category') ?? $logged_in_user->social_category == 'ST')>ST</option>
                        </select>
                    </div>
                    <div class="py-2">
                        <label for="religion">Religion</label>
                        <select name="religion" id="religion" class="w-full" data-placeholder="Please select religion">
                            <option value=""></option>
                            <option value="Hindu" @selected(old('religion') ?? $logged_in_user->religion == 'Hindu')>Hindu</option>
                            <option value="Christian" @selected(old('religion') ?? $logged_in_user->religion == 'Christian')>Christian</option>
                            <option value="Muslim" @selected(old('religion') ?? $logged_in_user->religion == 'Muslim')>Muslim</option>
                            <option value="Sikh" @selected(old('religion') ?? $logged_in_user->religion == 'Sikh')>Sikh</option>
                            <option value="Others" @selected(old('religion') ?? $logged_in_user->religion == 'Others')>Others</option>
                            <option value="Jain" @selected(old('religion') ?? $logged_in_user->religion == 'Jain')>Jain</option>
                            <option value="Buddhist" @selected(old('religion') ?? $logged_in_user->religion == 'Buddhist')>Buddhist</option>
                            <option value="Zorastrian (Parsi)" @selected(old('religion') ?? $logged_in_user->religion == 'Zorastrian (Parsi)')>Zorastrian (Parsi)</option>
                        </select>
                    </div>
                    <div class="py-2">
                        <x-bladewind.toggle
                            bar="thin"
                            name="divyangjan"
                            label="Divyangjan?"
                            label_position="right"
                            @checked(old('divyangjan') ?? $logged_in_user->divyangjan)
                        />
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="url" label="{{ __('Facebook') }}" placeholder="{{ __('Facebook') }}" name="facebook" value="{{ old('facebook') ?? $logged_in_user->facebook }}" maxlength="100" />
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="url" label="{{ __('Twitter') }}" placeholder="{{ __('Twitter') }}" name="twitter" value="{{ old('twitter') ?? $logged_in_user->twitter }}" maxlength="100" />
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="url" label="{{ __('Linkedin') }}" placeholder="{{ __('Linkedin') }}" name="linkedin" value="{{ old('linkedin') ?? $logged_in_user->linkedin }}" maxlength="100" />
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="url" label="{{ __('Youtube') }}" placeholder="{{ __('Youtube') }}" name="youtube" value="{{ old('youtube') ?? $logged_in_user->youtube }}" maxlength="100" />
                    </div>
                    <div class="py-2">
                        <x-bladewind.input type="url" label="{{ __('Instagram') }}" placeholder="{{ __('Instagram') }}" name="instagram" value="{{ old('instagram') ?? $logged_in_user->instagram }}" maxlength="100" />
                    </div>
                    @if($logged_in_user->teacher()->count())
                        <div class="py-2">
                            <label for="designation">Designation</label>
                            <select name="designation" id="designation" class="w-full" data-placeholder="Please select designation">
                                <option value=""></option>
                                <option value="Director" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Director')>Director</option>
                                <option value="Vice-chancellor" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Vice-chancellor')>Vice-chancellor</option>
                                <option value="Contract Teacher" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Contract Teacher')>Contract Teacher</option>
                                <option value="Professor & Equivalent" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Professor & Equivalent')>Professor & Equivalent</option>
                                <option value="Associate Professor" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Associate Professor')>Associate Professor</option>
                                <option value="Assistant Professor" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Assistant Professor')>Assistant Professor</option>
                                <option value="Principal" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Principal')>Principal</option>
                                <option value="Visiting Teacher" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Visiting Teacher')>Visiting Teacher</option>
                                <option value="Principal In-charge" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Principal In-charge')>Principal In-charge</option>
                                <option value="Lecturer (Selection Grade)" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Lecturer (Selection Grade)')>Lecturer (Selection Grade)</option>
                                <option value="Lecturer" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Lecturer')>Lecturer</option>
                                <option value="Pro Vice-chancellor" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Pro Vice-chancellor')>Pro Vice-chancellor</option>
                                <option value="Ad-hoc teacher" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Ad-hoc Teacher')>Ad-hoc Teacher</option>
                                <option value="Additional Professor" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Additional Professor')>Additional Professor</option>
                                <option value="Temporary Teacher" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Temporary Teacher')>Temporary Teacher</option>
                                <option value="Tutor" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Tutor')>Tutor</option>
                                <option value="Demonstrator" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Demonstrator')>Demonstrator</option>
                                <option value="Part-time Teacher" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Part-time Teacher')>Part-time Teacher</option>
                                <option value="Reader" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Reader')>Reader</option>
                                <option value="Lecturer (Senior Scale)" @selected(old('designation') ?? $logged_in_user->teacher->designation == 'Lecturer (Senior Scale)')>Lecturer (Senior Scale)</option>
                            </select>
                        </div>
                        <div class="py-2">
                            <label for="nature_of_appointment">Nature of Appointment</label>
                            <select name="nature_of_appointment" id="nature_of_appointment" class="w-full" data-placeholder="Please select appointment type">
                                <option value=""></option>
                                <option value="Regular" @selected(old('nature_of_appointment') ?? $logged_in_user->teacher->nature_of_appointment == 'Regular')>Regular</option>
                                <option value="Contractual" @selected(old('nature_of_appointment') ?? $logged_in_user->teacher->nature_of_appointment == 'Contractual')>Contractual</option>
                                <option value="Deputation/Attachment" @selected(old('nature_of_appointment') ?? $logged_in_user->teacher->nature_of_appointment == 'Deputation/Attachment')>Deputation/Attachment</option>
                                <option value="Part-time" @selected(old('nature_of_appointment') ?? $logged_in_user->teacher->nature_of_appointment == 'Part-time')>Part-time</option>
                                <option value="Temporary" @selected(old('nature_of_appointment') ?? $logged_in_user->teacher->nature_of_appointment == 'Temporary')>Temporary</option>
                                <option value="Ad-hoc" @selected(old('nature_of_appointment') ?? $logged_in_user->teacher->nature_of_appointment == 'Ad-hoc')>Ad-hoc</option>
                                <option value="Visiting" @selected(old('nature_of_appointment') ?? $logged_in_user->teacher->nature_of_appointment == 'Visiting')>Visiting</option>
                            </select>
                        </div>
                        <div class="py-2">
                            <label for="selection_mode">Selection Mode</label>
                            <select name="selection_mode" id="selection_mode" class="w-full" data-placeholder="Please select selection mode">
                                <option value=""></option>
                                <option value="Direct" @selected(old('selection_mode') ?? $logged_in_user->teacher->selection_mode == 'Direct')>Direct</option>
                                <option value="CAS" @selected(old('selection_mode') ?? $logged_in_user->teacher->selection_mode == 'CAS')>CAS</option>
                                <option value="Promotion" @selected(old('selection_mode') ?? $logged_in_user->teacher->selection_mode == 'Promotion')>Promotion</option>
                            </select>
                        </div>
                        <div class="py-2">
                            <label for="date_of_joining">Date of Joining Institute</label>
                            <x-bladewind.datepicker label="{{ __('Date of Joining Institute') }}" placeholder="{{ __('Date of Joining Institute') }}" name="date_of_joining" default_date="{{ old('date_of_joining') ?? $logged_in_user->teacher->date_of_joining }}" required />
                        </div>
                        <div class="py-2">
                            <label for="teaching_start_date">Teaching Start Date</label>
                            <x-bladewind.datepicker label="{{ __('Teaching Start Date') }}" placeholder="{{ __('Teaching Start Date') }}" name="teaching_start_date" default_date="{{ old('teaching_start_date') ?? $logged_in_user->teacher->teaching_start_date }}" required />
                        </div>
                        <div class="py-2">
                            <label for="highest_qualification">Highest Qualification</label>
                            <select name="highest_qualification" id="highest_qualification" class="w-full" data-placeholder="Please select qualification">
                                <option value=""></option>
                                <option value="Ph. D." @selected(old('highest_qualification') ?? $logged_in_user->teacher->highest_qualification == 'Ph. D.')>Ph. D.</option>
                                <option value="Post Graduate" @selected(old('highest_qualification') ?? $logged_in_user->teacher->highest_qualification == 'Post Graduate')>Post Graduate</option>
                                <option value="Post Doctorate" @selected(old('highest_qualification') ?? $logged_in_user->teacher->highest_qualification == 'Post Doctorate')>Post Doctorate</option>
                                <option value="M. Phil." @selected(old('highest_qualification') ?? $logged_in_user->teacher->highest_qualification == 'M. Phil.')>M. Phil.</option>
                                <option value="Under Graduate" @selected(old('highest_qualification') ?? $logged_in_user->teacher->highest_qualification == 'Under Graduate')>Under Graduate</option>
                                <option value="Below Under Graduate" @selected(old('highest_qualification') ?? $logged_in_user->teacher->highest_qualification == 'Below Under Graduate')>Below Under Graduate</option>
                            </select>
                        </div>
                        <div class="py-2">
                            <x-bladewind.input type="text" label="{{ __('Additional Qualification') }}" placeholder="{{ __('Additional Qualification') }}" name="additional_qualification" value="{{ old('additional_qualification') ?? $logged_in_user->teacher->additional_qualification }}" />
                        </div>
                    @endif
                </x-slot>

                <x-slot name="footer">
                    <x-bladewind.button
                        can_submit="true"
                        color="green">
                        {{ __('Update User Profile') }}
                    </x-bladewind.button>
                </x-slot>
            </x-backend.card>
        </x-forms.patch>
    </div>
@endsection

@push('after-scripts')
    <script>
        $('#salutation').select2();
        $('#social_category').select2();
        $('#religion').select2();
        $('#designation').select2();
        $('#selection_mode').select2();
        $('#nature_of_appointment').select2();
        $('#highest_qualification').select2();
    </script>
@endpush
