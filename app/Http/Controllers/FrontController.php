<?php

namespace App\Http\Controllers;

use App\Models\Primanota;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        User::whereNull('role')->delete();
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
}
