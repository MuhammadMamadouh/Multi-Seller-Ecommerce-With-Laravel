@php($type = $key['type'])
@if(in_array($type, generalInputs()))
    @if(getLanguages()->count() > 0 && in_array($attr, $translables)) <!-- Start If language -->
    @foreach(getLanguages() as $index => $lang )

        @isset($item)
            <x-general-input :attr="$attr" :type="$type" :lang="$lang"
                             :index="$index"
                             :item="$item" :key="$key"></x-general-input>
        @else
            <x-general-input :attr="$attr" :type="$type" :lang="$lang"
                             :index="$index"
                             :key="$key"></x-general-input>
        @endisset
    @endforeach
    @else  <!-- else if language -->

    @isset($item) <!-- check if it's edit page -->
    <x-general-input :attr="$attr" :type="$type" :item="$item"
                     :key="$key"></x-general-input>
    @else       <!-- it's create page-->
    <x-general-input :attr="$attr" :type="$type"
                     :key="$key"></x-general-input>
    @endisset
    @endif          <!-- endif get Languages-->

    <!--============================================
        ------------- Textarea Input-------------------
        ============================================ -->
@elseif($type === 'textarea')
    @if(getLanguages()->count() > 0 && in_array($attr, $translables))
        @foreach(getLanguages() as $index => $lang )
            @isset($item) <!-- check if it's edit page -->
            <x-text-area-input :item="$item" :attr="$attr" :lang="$lang"
                               :index="$index"></x-text-area-input>
            @else       <!-- it's create page-->
            <x-text-area-input :attr="$attr" :lang="$lang"
                               :index="$index"></x-text-area-input>
            @endisset
        @endforeach  <!--end getLanguage Foreach -->
    @else                 <!--else getLanguage Foreach -->
    @isset($item) <!-- check if it's edit page -->
    <x-text-area-input :item="$item" :attr="$attr"></x-text-area-input>
    @else       <!-- it's create page-->
    <x-text-area-input :attr="$attr"></x-text-area-input>
    @endisset
    @endif


@elseif($type === 'selection')
    @isset($item) <!-- check if it's edit page -->
    <x-select :item="$item" :attr="$attr" :key="$key"></x-select>
    @else       <!-- it's create page-->
    <x-select :attr="$attr" :key="$key"></x-select>
    @endisset
@endif
