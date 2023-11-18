@extends('layouts.stile')

@section('content')
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-content-between pt-8 sm:pt-0 dark:text-white">
            <div>
                <h1>Lista Operatori</h1>
            </div>
            <div>
                <a class="btn btn-primary" href="{{route('home')}}">Indietro</a>
            </div>
        </div>

        <div class="alert alert-danger mt-2 flex justify-content-between" role="alert">
            <div class="col">Nome</div>
            <div class="col">Azioni</div>
        </div>

        @foreach($operatori as $item)
            <div class="alert alert-primary mt-2 flex justify-content-between" role="alert">
                <div class="col">{{$item->name}}</div>
                <div class="col">
                    <a title="Elimina" href="{{route('eliminaOperatore', $item->id)}}" class="btn btn-danger mr-1">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
