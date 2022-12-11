@extends('layouts.stile')
@section('sfondo', '#000')
@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

        <div class="flex justify-content-between pt-8 sm:pt-0 dark:text-white">
            <div style="background: white; padding: 10px; border: 1px solid black">
                <h1 style="color: #000">Statistiche Chilometri - {{$nomeragazzo}} {{$mese}}/{{$anno}}</h1>
            </div>
            <div>
                <a class="btn btn-primary" href="{{route('statistiche')}}">Indietro</a>
            </div>
        </div>

        @include('statistiche.partial.formkmragazzi', ['mesi' => 'black'])


        <div class="alert alert-primary mt-5 flex justify-content-between font-weight-bold" role="alert">
            <div class="col statTitleTable">Giorno</div>
            <div class="col statTitleTable">Km percorsi</div>
            <div class="col statTitleTable">Operatore</div>
            <div class="col statTitleTable"></div>
        </div>

        @foreach($viaggi as $item)
            <div class="alert mt-2 flex justify-content-between align-items-center border" role="alert" id="ass{{$item->id}}">
                <div class="col statEleTable">{{$item->trip[0]->giorno}}</div>
                <div class="col statEleTable" id="km{{$item->id}}">{{$item->trip[0]->kmPercorsi}}</div>
                <div class="col statEleTable">{{$item->trip[0]->user->name}}</div>
                <div class="col">
                    <a title="Elimina" href="{{route('eliminaViaggioSingoloCliente', $item->id)}}" class="btn btn-danger" id="{{$item->id}}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        @endforeach

        <div class="alert alert-warning mt-5 flex justify-content-around" role="alert">
            <div class="statEleTable" style="font-size: 30px">Km Totale</div>
            <div class="statEleTable" style="font-size: 30px" id="kmTot">{{$totkm}}</div>
        </div>
        <div class="alert alert-warning flex justify-content-around" role="alert">
            <div class="statEleTable" style="font-size: 30px">Costo Totale</div>
            <div class="statEleTable" style="font-size: 30px" id="costoTot">€ {{$totkm*0.45}}</div>
        </div>

    </div>

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
                var totaleKm = $("#kmTot").text();
                var kmDaEliminare = $("#km"+($(this).attr('id'))).text();
                var kmSaldo = totaleKm - kmDaEliminare;

               // alert(totaleKm - kmDaEliminare );
                $.ajax(url,
                    {
                        data : {
                            '_token' : $('#_token').val()
                        },
                        complete : function (resp) {
                            console.log(resp);        //COSì POSSIAMO VEDERE IL VALORE ( = 1) NELLA CONSOLE DEL BROWSER
                            if(resp.responseText == 1){
                                //alert(resp.responseText);
                                $("#kmTot").text(kmSaldo);
                                $("#costoTot").text('€ ' + kmSaldo*0.45);
                                $( "#"+id ).remove();
                            }else{
                                alert('problemi');
                            }
                        }
                    })
            });

        });
    </script>
@endsection
