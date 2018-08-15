<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $artikel->id !!}</p>
</div>

<!-- Judul Field -->
<div class="form-group">
    {!! Form::label('judul', 'Judul:') !!}
    <p>{!! $artikel->judul !!}</p>
</div>

<!-- Keterangan Field -->
<div class="form-group">
    {!! Form::label('keterangan', 'Keterangan:') !!}
    <p>{!! $artikel->keterangan !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $artikel->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $artikel->updated_at !!}</p>
</div>

