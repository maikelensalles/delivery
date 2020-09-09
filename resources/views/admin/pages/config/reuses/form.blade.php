@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <input type="text" class="form-control" name="previsao_minutos" placeholder="Previsao Minutos:" value="{{ $conf->previsao_minutos ?? old('previsao_minutos') }}">
</div>
<div class="form-group">
    <input type="text" name="taxa_entrega" class="form-control" placeholder="Taxa Entrega:"  value="{{ $conf->taxa_entrega ?? old('taxa_entrega') }}">
</div>
<div class="form-group">
    <input type="text" name="abertura" class="form-control" placeholder="Abertura:"  value="{{ $conf->abertura ?? old('abertura') }}">
</div>
<div class="form-group">
    <input type="text" name="fechamento" class="form-control" placeholder="Fechamento:"  value="{{ $conf->fechamento ?? old('fechamento') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>