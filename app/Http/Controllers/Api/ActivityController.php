<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityClientResource;
use App\Http\Resources\ActivityResource;
use App\Http\Resources\AssociazioniActivityClientResource;
use App\Models\Activity;
use App\Models\Associa;
use App\Models\AttivitaCliente;
use App\Models\Client;
use Illuminate\Http\Request;
use function array_push;

class ActivityController extends Controller
{
    public function index()
    {
        $attivita = Activity::whereNotNull('created_at')->get();
        return ActivityResource::collection($attivita);
    }

    public function inserisci(Request $request)
    {
        $attivita = new Activity();
        $attivita->name = $request->nomeAttivita;
        $attivita->tipo = $request->tipo;
        $attivita->cost = $request->costo;
        $attivita->save();
        return new ActivityResource($attivita);
    }

    public function elimina(Activity $activity)
    {
        $activity->update(['created_at' => null]);
    }

    public function attivitaCliente()
    {
        $items = AttivitaCliente::with('client', 'activity')->latest()->take(50)->get();
        return ActivityClientResource::collection($items);
    }

    public function eliminaAttivitaCliente(AttivitaCliente $attivitaCliente)
    {
        $attivitaCliente->delete();
    }

    public function inserisciAttivitaCliente(Request $request)
    {
        //dd($request);
        $date = $request->giorno;
        $d = date_parse_from_format("Y-m-d", $date);
        $mese = $d["month"];
        $anno = $d["year"];

        $costoAttivita = Activity::find($request->attivita)->cost * $request->quantita;

        $elementiInseriti = [];

        foreach ($request->raga as $ragazzo){

            $inserimento = new AttivitaCliente();

            $inserimento->activity_id = $request->attivita;
            $inserimento->client_id = $ragazzo;
            $inserimento->quantita = $request->quantita;
            $inserimento->costo = $costoAttivita;
            $inserimento->giorno = $date;
            $inserimento->mese = $mese;
            $inserimento->anno = $anno;
            $inserimento->note = $request->note;

            $inserimento->save();
            array_push($elementiInseriti, $inserimento);
        }
        return ActivityClientResource::collection(collect($elementiInseriti));
    }

    public function associa(Request $request)
    {
        $numeroragazzi = count($request->raga);
        $associazioniInserite = [];
        for ($i=0; $i < $numeroragazzi; $i++){
            $associa = new Associa();
            $associa->activity_id = $request->attivita;
            $associa->client_id = $request->raga[$i];
            $associa->save();
            array_push($associazioniInserite, new AssociazioniActivityClientResource($associa));
        }
        return $associazioniInserite;
    }

    public function associazioni()
    {
        $associazioni = Associa::with('client', 'activity')->orderBy('activity_id')->get();
        return AssociazioniActivityClientResource::collection($associazioni);
    }

    public function dissocia(Associa $associa)
    {
        $associa->delete();
    }

    public function attivitaragazzi(Activity $activity)
    {
        //dd($activity->clientsAssocia->toArray());
        return $activity->clientsAssocia->pluck('id')->toArray();
    }
}
