@if ($errors->any())
<div class="alert alert-error alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Erro</h4>
    Por favor corrija os erros no fomulário!
</div>
@endif

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Successo</h4>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-error alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Erro</h4>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Atenção</h4>
    {{ $message }}
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>Informação</h4>
    {{ $message }}
</div>
@endif
