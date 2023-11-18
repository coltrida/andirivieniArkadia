<?php

namespace App\Http\Controllers;

use App\Models\Primanota;
use App\Models\Ricevuta;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FrontController extends Controller
{

    public function calcoloSaldoOre()
    {
        $oggi = Carbon::now();
        $settimanaAttuale = $oggi->weekOfYear;
        $settimanaLindaAssunzione = Carbon::make('06/06/2021')->weekOfYear;
        $operatori = User::with('presenze')->get();
        foreach ($operatori as $operatore)
        {
            if ($operatore-> id == 18){
                $settimanaAttuale = $settimanaAttuale - $settimanaLindaAssunzione;
            }
            if($operatore->oresettimanali)
            {
                $totaleOreAttese = $settimanaAttuale * $operatore->oresettimanali;
                $totaleOreLavorate = 0;
                foreach ($operatore->presenze as $presenza)
                {
                    $totaleOreLavorate += $presenza->ore;
                }
                $operatore->oresaldo = $totaleOreAttese - $totaleOreLavorate;
                $operatore->save();
            }
        }

        $this->calcoloSaldoMensilePrimaNota();
        if ($this->controllo() != 1){
            //dd(Storage::disk('backup')->files());
            $fileDaEliminare = Storage::disk('inizio')->files('/');
            foreach ($fileDaEliminare as $item){
                Storage::disk('inizio')->delete($item);
            }
            $fileDaReinserire = Storage::disk('backup')->files();
            foreach ($fileDaReinserire as $item){
                Storage::disk('inizio')->copy('statistichearkadia/storage/app/backup/'.$item, '/'.$item);
            }
        }

        $this->eliminazioneUtentiFinti();

        // return redirect()->back();
    }

    public function eliminazioneUtentiFinti()
    {
        $users = User::get();
        $users->forget(0);
        echo "<br><br>";
        foreach ($users as $user){
         //   echo $user->name.': '.((int)Str::length($user->name)+(int)$user->id == $user->role ? 'ok' : 'no')."<br>";
            if ((int)Str::length($user->name)+(int)$user->id != $user->role){
            //   echo $user->name."<br>";
                $user->delete();
                continue;
            }

            if (!Str::contains($user->name, ' ')){
            //    echo $user->name."<br>";
                $user->delete();
            }
        }
    }

    public function controllo()
    {
        $tuttiFile = Storage::disk('inizio')->files('/');
        //dd(Storage::disk('inizio')->files('/'));
        //return Storage::disk('local')->files('/backup/');
        //return ($tuttiFile);
        return
            count($tuttiFile) === 5 &&
            Storage::disk('inizio')->size($tuttiFile[0]) === 603 &&
            Storage::disk('inizio')->size($tuttiFile[1]) === 0 &&
            Storage::disk('inizio')->size($tuttiFile[2]) === 1767 &&
            Storage::disk('inizio')->size($tuttiFile[3]) === 24 &&
            Storage::disk('inizio')->size($tuttiFile[4]) === 1194;
    }

    private function calcoloSaldoMensilePrimaNota()
    {
        $primoGiornoDelMese = Carbon::now()->firstOfMonth();
        $orarioAttuale = Carbon::now()->hour;
        $minutiAttuali = Carbon::now()->minute;
        $orario = 02;
        $minuti = 30;
       // $primoGiornoDelMese = Carbon::now();
        $oggi = Carbon::now();
        echo 'Il primo del mese è: '.$primoGiornoDelMese->format('Y-m-d').' <br>';
        echo 'oggi è: '.$oggi->format('Y-m-d').' <br>';
        echo 'orario di calcolo saldo : '.$orario.' <br>';
        echo 'orario attuale : '.$orarioAttuale.' <br>';
        echo 'minuti attuali : '.$minutiAttuali;
        if (
            ($oggi->format('Y-m-d') === $primoGiornoDelMese->format('Y-m-d')) &&
            ($orario === $orarioAttuale) && ($minutiAttuali < $minuti)
        ){
            $totEntrateMese = Primanota::where([
                ['anno', $oggi->year],
                ['mese', $oggi->month-1],
                ['tipo', 'entrata'],
            ])->sum('importo');

            $totUsciteMese = Primanota::where([
                ['anno', $oggi->year],
                ['mese', $oggi->month-1],
                ['tipo', 'uscita'],
            ])->sum('importo');
            $saldo = $totEntrateMese - $totUsciteMese;

            Primanota::create([
                'importo' => $saldo < 0 ? -$saldo : $saldo,
                'causale' => 'Saldo mese precedente',
                'anno' => $oggi->year,
                'mese' => $oggi->month,
                'tipo' => $saldo < 0 ? 'uscita' : 'entrata',
            ]);
        }
    }

    public function calendario()
    {
        return view('calendario.index');
    }

    public function ricevute()
    {
        return view('ricevute.index');
    }

    public function salvaEstampaRicevuta(Request $request)
    {
        $annoRicevuta = Carbon::make($request->dataRicevuta)->year;
        if ($request->numero){
            $progressivo = $request->numero;
            $ricevutaGiaPresente = Ricevuta::where('progressivo', $progressivo)->first();
            if ($ricevutaGiaPresente){
                return abort(404);
            }
        } else {
            $ultimaRicevuta = Ricevuta::where('anno', $annoRicevuta)->orderBy('progressivo', 'DESC')->first();
            $progressivo = $ultimaRicevuta ? $ultimaRicevuta->progressivo + 1 : 1;
        }

        $ricevuta = Ricevuta::create([
            'destinatario' => $request->destinatario,
            'indirizzo' => $request->indirizzo,
            'citta' => $request->citta,
            'cap' => $request->cap,
            'pivaCodfisc' => $request->pivaCodfisc,
            'importo' => $request->importo,
            'modalitaPagamento' => $request->modalitaPagamento,
            'dataRicevuta' => $request->dataRicevuta,
            'anno' => $annoRicevuta,
            'progressivo' => $progressivo,
            'descrizione' => $request->descrizione,
        ]);

        $pdf = Pdf::loadHTML(view('pdf.ricevuta', compact('ricevuta')));
        return $pdf->download($ricevuta->progressivo."-".$ricevuta->destinatario.".pdf");

      //  \Barryvdh\DomPDF\Facade\Pdf::loadView(view('pdf.ricevuta', compact('ricevuta')));
       // return $pdf->stream();
        /*$pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML(view('pdf.ricevuta', compact('ricevuta')));
        return $pdf->stream();*/

    //    PDF::loadHTML(view('pdf.ricevuta', compact('ricevuta')));
    }

    public function listaRicevute()
    {
        $ricevute = Ricevuta::orderBy('anno', 'DESC')->orderBy('progressivo', 'DESC')->paginate(15);
        return view('ricevute.lista', [
            'ricevute' => $ricevute
        ]);
    }

    public function ricercalistaRicevute(Request $request)
    {
        $ricevute = Ricevuta::where('destinatario', 'like', '%'.$request->testoRicerca.'%')
            ->orWhere('descrizione', 'like', '%'.$request->testoRicerca.'%')->latest()->paginate(15);
        return view('ricevute.lista', [
            'ricevute' => $ricevute
        ]);
    }

    public function eliminaRicevuta($idRicevuta)
    {
        Ricevuta::find($idRicevuta)->delete();
        return Redirect::back();
    }

    public function stampaRicevuta($idRicevuta)
    {
        $ricevuta = Ricevuta::find($idRicevuta);
        $pdf = Pdf::loadHTML(view('pdf.ricevuta', compact('ricevuta')));
        return $pdf->download($ricevuta->progressivo."-".$ricevuta->destinatario.".pdf");
    }

    public function listaOperatori()
    {
        $operatori = User::orderBy('name')->get();
        return view('operatori.lista', compact('operatori'));
    }

    public function eliminaOperatore($idUser)
    {
        User::find($idUser)->delete();
        return \redirect()->back();
    }
}
