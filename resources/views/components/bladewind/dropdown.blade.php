
@php use Illuminate\Support\Str; @endphp
@props([
    // name to uniquely identiy a dropdown
    'name' => 'bw-dropdown',

    // the default text to display when the dropdown shows
    'placeholder' => 'Select One',

    // optional function to execute when a dropdown item is selected
    // by default the value of a dropdown item is wriiten to an input field with the 
    // name dd_name. Where name is the name you provided for the dropdown
    // if you named your dropdown countries for example, whatever country is selected can 
    // be found in the <input type="hidden" clas="input-countries" name="dd_countries" />
    'onselect' => '',

    // data to pass to the dropdown
    // your data must be a json string (not object) with the keys value and label
    // value is whatever value will be passed to your code when an item is selected
    // label is what will be displayed to the user
    // if you want to display icons for each item your json can contain the optional 'icon' key
    // where icons are required, they must be in the semantic UI icon format 
    // [{"label":"Burkina Faso","icon":"bf flag","value":"+226"},{"label":"Ghana","icon":"gh flag","value":"+233"},{"label":"Ivory Coast","icon":"ivc flag","value":"+228"}]
    'data' => [],

    // what key in your data array should be used to populate 'value' of the dropdown when an item is selected
    // by default a key of 'value' is used. If your data is something like [ {"id":"1","name":"Burkina Faso"}] 
    // your value_key will be 'id'
    'value_key' => 'value',
    'valueKey' => 'value',

    // what key in your data array should be used to display the labels the user will see as dropdown items
    // the default key used for labels is 'label'. If your data is something like [ {"id":"1","name":"Burkina Faso"}] 
    // your label_key will be 'name'
    'label_key' => 'label',
    'labelKey' => 'label',

    // what key in your data array should be used to display flag icons next to the labels
    // [ {"id":"1","name":"Burkina Faso", "flag":"/assets/images/bf-flag.png"}] 
    // your flag_key will be 'image'
    'flag_key' => '',
    'flagKey' => '',
    
    // what key in your data array should be used to display images next to the labels
    // the default key used for images is '', meaning images will be ignored. If your data is something like 
    // [ {"id":"1","name":"Burkina Faso", "image":"/assets/images/bf-flag.png"}] 
    // your image_key will be 'image'
    'image_key' => '',
    'imageKey' => '',
    
    // there are times you will want the dropdown items to go to a link when clicked on 
    // useful if you are using the dropdown as a navigation component for example
    // the url_key defines which key in your data array to be use as urls
    // the default key used for urls is '', meaning urls will be ignored.
    // setting a urlKey overwrites whatever is defined in 'onselect'
    'url_key' => '',
    'urlKey' => '',

    // if url_key is set, should the selected item's value be appended to the url
    'append_value_to_url' => 'false',
    'appendValueToUrl' => 'false',

    // if url_key is set and append_value_to_url is 'true', what variable name should 
    // the value be appended to the url as. Default is 'value'
    // url will look like /user/settings/?value=devices
    'append_value_to_url_as' => 'value',
    'appendValueToUrlAs' => 'value',

    // there are instances you want the name passed by the dropdown when you submit a form to be 
    // different from the name you gave the dropdown. Example. you may name the dropdown as country but 
    // want it to submit data as country_id. 
    'data_serialize_as' => '',
    'dataSerializeAs' => '',

    // enforces validation if set to true
    'required' => 'false',

    // determines if a value passed in the data array should automatically be selected
    // useful when using the component in edit mode or as part of filter options
    // the value you specify should exist in your value_key. If your value_key is 'id', you
    // cannot set a selected_value of 'maize white'
    'selected_value' => '',
    'selectedValue' => '',
    
    // setting this to true adds a search box above the dropdown items
    // this can be used to filter the contents of the dropdown items
    'searchable' => 'false',

    // this is just a hack to turn the dropdown into a filter component
    // setting to true shows a filter icon in the component
    'show_filter_icon' => 'false',
    'showFilterIcon' => 'false',
])
@php 
    // reset variables for Laravel 8 support
    $value_key = $valueKey;
    $label_key = $labelKey;
    $flag_key = $flagKey;
    $url_key = $urlKey;
    $image_key = $imageKey;
    $append_value_to_url = $appendValueToUrl;
    $append_value_to_url_as = $appendValueToUrlAs;
    $data_serialize_as = $dataSerializeAs;
    $selected_value = $selectedValue;
    $show_filter_icon = $showFilterIcon;
    //-------------------------------------------------------

    $data = json_decode(str_replace('&quot;', '"', $data));
    $onselect = str_replace('&#039;', "'", $onselect);
    $input_name = preg_replace('/[\s-]/', '_', $name);

    if(! isset($data[0]->{$label_key}) ) {
        echo '<p style="color:red">
            &lt;x-bladewind.dropdown /&gt;: ensure the value you set as label_key 
            exists in your array data</p>';exit;
    }
    if( $url_key !== '' && ! isset($data[0]->{$url_key}) ) {
        echo '<p style="color:red">
            &lt;x-bladewind.dropdown /&gt;: ensure the value you set as url_key exists in your array</p>';exit;
    }

    if( $flag_key !== '' && !isset($data[0]->{$flag_key}) ) {
        echo '<p style="color:red">
            &lt;x-bladewind.dropdown /&gt;: ensure the value you set as flag_key exists in your array</p>';exit;
    }

@endphp

<div class="relative {{ $name }}">
    <button type="button" class="bw-dropdown bg-white cursor-pointer text-left w-full text-gray-400 flex justify-between dark:text-white dark:border-slate-700 dark:bg-slate-600 dark:text-gray-300">
        <label class="cursor-pointer">
            @if($show_filter_icon == 'true')
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                </svg>
            @endif
            {{ $placeholder }}@if($required == 'true') &nbsp;<span class="text-red-300">*</span>@endif</label>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-40 mr-[-10px]" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>
    <div class="w-full absolute z-50 bg-white -mt-1 shadow-md cursor-pointer hidden dropdown-items-parent dark:text-white dark:border-slate-700 dark:bg-slate-600" 
        style="max-height: 270px; overflow: scroll;">
        <div 
            class="dropdown-items border border-gray-300 divide-y relative w-full">
            @if($searchable == 'true')
                <div class="bg-gray-100 dark:bg-slate-500 p-2 sticky top-0 min-w-full">
                    <input type="text" class="bw-input search-dropdown rounded-full w-full !border-0 !focus:border-0 !placeholder-gray-400 dark:!text-slate-800 !mb-0" 
                        placeholder="Search" onkeyup="searchDropdown(this.value, '{{ $name }}')" />
                </div>
            @endif
            <div 
                data-value="" 
                data-label="" 
                data-user-function=""
                data-parent="{{ $name }}" 
                class="dd-item p-3 cursor-pointer default hidden">{{ $placeholder }}
                @if($required == 'true') &nbsp;<span class="text-red-300">*</span>@endif</div>
            @for ($x=0; $x < count($data); $x++)
                @php
                    $url_target = 'self';
                    $url = (isset($data[$x]->$url_key) && $data[$x]->$url_key !== '') ? 
                        ($data[$x]->{$url_key} . (($append_value_to_url === 'true') ? 
                        "?{$append_value_to_url_as}=" . $data[$x]->$value_key : '')) : '';

                    if($url !== '' && ( Str::contains($url, 'http://') || Str::contains($url, 'https://')) && !Str::contains($url, request()->getHost()) ){
                        $url_target = 'blank';
                    }
                @endphp
                <div 
                    {{ $attributes->merge(['class' => "dd-item p-3 cursor-pointer hover:bg-gray-100 flex items-center dark:text-white dark:border-slate-700 dark:bg-slate-600 dark:hover:bg-slate-700 dark:text-gray-300"]) }}
                    data-href="{{$url}}"
                    data-href-target="{{$url_target}}"
                    data-value="{{ $data[$x]->$value_key }}" 
                    data-selected-value="{{ $selected_value }}"
                    data-label="{{ $data[$x]->$label_key }}" 
                    data-parent="{{ $name }}" 
                    data-user-function="{{ $onselect }}">
                    @if ($flag_key != '' && $image_key == '')<i class="{{ $data[$x]->{$flag_key} }} flag"></i>@endif
                    @if ($image_key != '')<x-bladewind::avatar size="tiny" css="!mr-2" image="{{ $data[$x]->{$image_key} }}" />@endif
                    <div>{!! $data[$x]->$label_key !!}</div>
                </div>
            @endfor
            <input 
                type="hidden" 
                class="bw-{{ $name }} {{ ($required == 'true') ? ' required' : '' }}" 
                name="{{ ($data_serialize_as != '') ? $data_serialize_as : $input_name }}" />
        </div>
    </div>
</div>

<script>el_name = '{{ $name }}';</script>
<script src="{{ asset('bladewind/js/dropdown.js') }}"></script>