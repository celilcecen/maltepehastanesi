@if (isset($isModelTranslatable) && $isModelTranslatable)
@php($lastLang = session()->has('lastLang') && in_array(session()->get('lastLang'), config('voyager.multilingual.locales')) ? session()->get('lastLang') : config('voyager.multilingual.default'))
    <div class="language-selector">
        <div class="btn-group btn-group-sm" role="group" data-toggle="buttons">
            @foreach(config('voyager.multilingual.locales') as $lang)
                <label class="btn btn-primary{{ ($lang === $lastLang) ? " active" : "" }}">
                    <input type="radio" name="i18n_selector" id="{{$lang}}" autocomplete="off"{{ ($lang === $lastLang) ? ' checked="checked"' : '' }}> {{ strtoupper($lang) }}
                </label>
            @endforeach
        </div>
    </div>
@endif
@push('javascript')
    <script>
        $(document).ready(function(){
            $(".language-selector:first input").change(function(){
                let lastLang = $(this).attr('id');
                $.ajax({
                    url: '{{route("setLastLang")}}',
                    type: 'post',
                    data: {_token : '{{csrf_token()}}', lastLang : lastLang }
                });
            });
        });
    </script>
@endpush
