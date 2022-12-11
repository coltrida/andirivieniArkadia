@extends('layouts.stile')
@section('sfondo', '#000')
@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-content-between pt-8 sm:pt-0 mb-4">
            <div style="background: white; padding: 10px; border: 1px solid black">
                <h1 style="color: #000">Presenze {{$nome}} {{$mese}}/{{$anno}}</h1>
            </div>
            <div>
                <a class="btn btn-primary" href="{{route('statistiche')}}">Indietro</a>
            </div>
        </div>

        @include('statistiche.partial.formpresenze')
    </div>

    <h2 class="mb-2 mt-5" style="color: #000; background: white; padding: 10px; border: 1px solid black">
        Attività Mensili ASSOCIATE
    </h2>
        <div class="alert alert-primary flex justify-content-between font-weight-bold" role="alert">
            <div class="col statTitleTable">Attività</div>
            <div class="col statTitleTable">Tipo</div>
            <div class="col statTitleTable text-center">Costo Mensile</div>
        </div>
        @foreach($attivitaMensili as $ele)
            <div class="alert mt-2 flex justify-content-between border" role="alert">
                <div class="col statEleTable">{{$ele->activity->name}}</div>
                <div class="col statEleTable">{{$ele->activity->tipo}}</div>
                <div class="col statEleTable text-center">€ {{$ele->activity->cost}}</div>
            </div>
        @endforeach

    <h2 class="mb-2 mt-5" style="color: #000; background: white; padding: 10px; border: 1px solid black">
        Attività Orarie
    </h2>
    @foreach($items as $item)
        <div class="alert alert-primary flex justify-content-between font-weight-bold" role="alert">
            <div class="col statTitleTable">Attività</div>
            <div class="col statTitleTable">Giorno</div>
            <div class="col statTitleTable text-center">Quantita'</div>
            <div class="col statTitleTable">tipo</div>
            <div class="col statTitleTable text-center">Costo Unitario</div>
            <div class="col statTitleTable"></div>
        </div>
        @foreach($item as $ele)
            <div class="alert mt-2 flex justify-content-between border" role="alert" id="ass{{$ele->id}}">
                <div class="col statEleTable">{{$ele->activity->name}}</div>
                <div class="col statEleTable">{{$ele->giorno}}</div>
                <div class="col statEleTable text-center">{{$ele->quantita}}</div>
                <div class="col statEleTable">{{$ele->activity->tipo}}</div>
                <div class="col statEleTable text-center">€ <span id="cost{{$ele->id}}">{{$ele->activity->cost}}</span> </div>
                <div class="col">
                    <a title="Elimina" href="{{route('elimina_dati', $ele->id)}}" class="btn btn-danger" id="{{$ele->id}}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>

            </div>
        @endforeach
    @endforeach

    <form action="{{route('inserisci_costo_ragazzo_mese')}}" method="POST">
        @csrf
        <div class="alert alert-warning mt-5 flex justify-content-around" role="alert">
            <div class="statEleTable" style="font-size: 30px">Costo Totale</div>
            <div class="statEleTable" style="font-size: 30px">€ <span id="totaleCosto">{{$totale}}</span></div>
        </div>
        {{--<div class="alert alert-warning flex justify-content-between" role="alert">
            <div style="color: #000">Co-partecipazione</div>
            <div>
                <input type="number" class="form-control" id="contributo" name="contributo" aria-describedby="emailHelp">
            </div>
        </div>
        <div class="alert alert-warning flex justify-content-between" role="alert">
            <div style="color: #000">Saldo</div>
            <div id="saldo" style="color: #000"></div>
        </div>
        <input type="hidden" name="saldo" id="inviaSaldo">
        <input type="hidden" name="client_id" value="{{$client->id}}">
        <input type="hidden" name="totaleCosto" value="{{$totale}}">
        <input type="hidden" name="mese" value="{{$mese}}">
        <input type="hidden" name="anno" value="{{$anno}}">
        <button type="submit" class="btn btn-primary btn-lg btn-block">Inserisci</button>--}}
    </form>
    {{--<div class="alert alert-warning flex justify-content-between" role="alert">
        <div>Saldo Voucher</div>
        <div>{{$client->voucher}}</div>
    </div>--}}

@endsection

@section('footer')
    @parent
    <script>
        $('document').ready(function () {

            /*-------------- Elimina attivita cliente ----------------*/
            $('a.btn-danger').on('click', function (ele) {  //è consigliato mettere il listener su ul e non sui li
                ele.preventDefault();
                var url = ($(this).attr('href'));  //QUESTO è UN ALTRO MODO PER CATTURARE IL LINK (con jQuery)
                var id = 'ass'+($(this).attr('id'));

                var totCosto = $("#totaleCosto").text();
                var costoDaEliminare = $("#cost"+($(this).attr('id'))).text();
                var costoSaldo = totCosto - costoDaEliminare;

                $.ajax(url,
                    {
                        data : {
                            '_token' : $('#_token').val()
                        },
                        complete : function (resp) {
                            console.log(resp);        //COSì POSSIAMO VEDERE IL VALORE ( = 1) NELLA CONSOLE DEL BROWSER
                            if(resp.responseText == 1){
                                $("#totaleCosto").text(costoSaldo);
                                $( "#"+id ).remove();
                            }else{
                                alert('problemi');
                            }
                        }
                    })
            });

            /*-------------- Anteprima Saldo ----------------*/
           // let saldo = parseFloat($('#totaleCosto').html()) - parseFloat($('#contributo').val());
            /*$('#contributo').on('input', function (ele) {
                let saldo = parseFloat($('#totaleCosto').html()) - parseFloat($('#contributo').val());
                $('#saldo').html(saldo);
                $('#inviaSaldo').val(saldo);
            });*/

        });
    </script>
@endsection
