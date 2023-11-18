@extends('layouts.stile')
@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-content-between pt-8 sm:pt-0 dark:text-white">
            <div>
                <h1>Ricevuta</h1>
            </div>
            <div>
                <a class="btn btn-primary" href="{{route('home')}}">Indietro</a>
            </div>
        </div>
    </div>

    <form action="{{route('salvaEstampaRicevuta')}}" method="POST">
        @csrf
        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
        <div class="row">
            <div class="col-sm-2 col-12 form-group">
                <label for="dataRicevuta" class="text-white">Data Ricevuta</label>
                <input type="date" required class="form-control" id="dataRicevuta" name="dataRicevuta">
            </div>
            <div class="col-sm-3 col-12 form-group">
                <label for="destinatario" class="text-white">Nominativo</label>
                <input type="text" required class="form-control" id="destinatario" name="destinatario">
            </div>
            <div class="col-sm-2 col-12 form-group">
                <label for="importo" class="text-white">Importo</label>
                <input type="number" step="0.01" required class="form-control" id="importo" name="importo">
            </div>
            <div class="col-sm-2 col-12 form-group">
                <label for="modalitaPagamento" class="text-white">Modalità pag.</label>
                <select class="form-control" aria-label="Default select example" id="modalitaPagamento" name="modalitaPagamento">
                    <option selected></option>
                    <option>Bonifico</option>
                    <option>Assegno</option>
                    <option>Contante</option>
                    <option>Pagato</option>
                </select>
            </div>
            <div class="col-sm-3 col-12 form-group">
                <label for="descrizione" class="text-white">Descrizione</label>
                <input type="text" required class="form-control" id="descrizione" name="descrizione">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-2 col-12 form-group">
                <label for="numero" class="text-white">numero</label>
                <input style="background: palevioletred; color: yellow" type="text" class="form-control" id="numero" name="numero">
            </div>
            <div class="col-sm-3 col-12 form-group">
                <label for="indirizzo" class="text-white">Indirizzo</label>
                <input type="text" class="form-control" id="indirizzo" name="indirizzo">
            </div>
            <div class="col-sm-2 col-12 form-group">
                <label for="citta" class="text-white">Città</label>
                <input type="text" class="form-control" id="citta" name="citta">
            </div>
            <div class="col-sm-2 col-12 form-group">
                <label for="cap" class="text-white">Cap</label>
                <input type="number" class="form-control" id="cap" name="cap">
            </div>
            <div class="col-sm-3 col-12 form-group">
                <label for="pivaCodfisc" class="text-white">Piva/CodFisc</label>
                <input type="text" class="form-control" id="pivaCodfisc" name="pivaCodfisc">
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Inserisci</button>
    </form>
@endsection
