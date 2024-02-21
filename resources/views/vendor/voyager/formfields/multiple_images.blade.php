<br>
@if(isset($dataTypeContent->{$row->field}))
    <?php $images = json_decode($dataTypeContent->{$row->field}); ?>
    @if($images != null)
        @foreach($images as $image)
            <div class="img_settings_container" data-field-name="{{ $row->field }}" style="float:left;padding-right:15px;">
                <a href="#" class="voyager-x remove-multi-image" style="position: absolute;"></a>
                <img src="{{ Voyager::image( $image ) }}" data-file-name="{{ $image }}" data-id="{{ $dataTypeContent->getKey() }}" style="max-width:200px; height:auto; clear:both; display:block; padding:2px; border:1px solid #ddd; margin-bottom:5px;">
                <input type="number" class="form-control imageOrder" value="{{$loop->iteration}}" placeholder="sıralama">
            </div>
        @endforeach
        <div class="clearfix"></div>
        <button type="button" class="btn btn-warning saveImagesOrder" data-field-name="{{ $row->field }}" data-id="{{ $dataTypeContent->getKey() }}">Sıralamayı Kaydet</button>
    @endif
@endif
<div class="clearfix"></div>
<input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file" name="{{ $row->field }}[]" multiple="multiple" accept="image/*">

@push('javascript')
<script>
    $(".saveImagesOrder").click(function(){
        var id = $(this).data('id');
        var filedName = $(this).data('field-name');
        var images = [];
        $(".img_settings_container[data-field-name='"+filedName+"']").each(function(){
            images.push({
                image: $(this).find('img').data('file-name'),
                order: $(this).find('.imageOrder').val()
            });
        });
        images.sort((a,b) => a.order - b.order);
        $.ajax({
            url: "{{route('changeImagesSort')}}",
            data: {
                table: '{{$dataType->slug}}',
                id: id,
                fieldName: filedName,
                _token: "{{csrf_token()}}",
                images: images.map(z => z.image)
            },
            type: 'post',
            success: function(){
                location.reload();
            },
            error: function(e){
                console.log(e);
            }
        })
    });
</script>
@endpush