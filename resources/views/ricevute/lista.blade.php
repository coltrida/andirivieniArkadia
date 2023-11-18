@extends('layouts.stile')
@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-content-between pt-8 sm:pt-0 dark:text-white">
            <div>
                <h1>Lista Ricevute - ({{$ricevute->total()}})</h1>
            </div>
            <div>
                <form class="row g-3" method="post" action="{{route('ricercalistaRicevute')}}">
                    @csrf
                    <div class="col-auto">
                        <input type="text" class="form-control" placeholder="ricerca" name="testoRicerca">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">cerca</button>
                        <button type="submit" class="btn btn-warning mb-3">reset</button>
                    </div>
                </form>
            </div>
            <div>
                <a class="btn btn-primary" href="{{route('home')}}">Indietro</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table text-white">
        <thead>
        <tr style="background: #000793">
            <th scope="col"></th>
            <th scope="col">id</th>
            <th scope="col">progressivo</th>
            <th scope="col">destinatario</th>
            <th scope="col" style="width: 400px">importo</th>
            <th scope="col">dataRicevuta</th>
            <th scope="col" nowrap>descrizione</th>
            <th scope="col">indirizzo</th>
            <th scope="col">citta</th>
            <th scope="col">cap</th>
            <th scope="col">pivaCodfisc</th>
            <th scope="col">modalitaPagamento</th>
            <th scope="col">anno</th>
        </tr>
        </thead>
        <tbody>
        @foreach($ricevute as $ricevuta)
        <tr>
            <td class="d-flex">
                <a href="{{route('eliminaRicevuta', $ricevuta->id)}}" class="btn btn-danger">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
                <a href="{{route('stampaRicevuta', $ricevuta->id)}}" class="btn btn-success ml-2">
                    <i class="fa fa-print" aria-hidden="true"></i>
                </a>
            </td>
            <td>{{$ricevuta->id}}</td>
            <td>{{$ricevuta->progressivo}}</td>
            <td nowrap>{{$ricevuta->destinatario}}</td>
            <td nowrap style="width: 400px">{{'€ '.number_format( (float) $ricevuta->importo, '2', ',', '.')}}</td>
            <td>{{$ricevuta->dataRicevuta}}</td>
            <td nowrap>{{$ricevuta->descrizione}}</td>
            <td>{{$ricevuta->indirizzo}}</td>
            <td>{{$ricevuta->citta}}</td>
            <td>{{$ricevuta->cap}}</td>
            <td>{{$ricevuta->pivaCodfisc}}</td>
            <td>{{$ricevuta->modalitaPagamento}}</td>
            <td>{{$ricevuta->anno}}</td>
        </tr>
        @endforeach

        <tr>
            <td colspan="13">{{$ricevute->links()}}</td>
        </tr>

        </tbody>
    </table>
    </div>
@endsection
