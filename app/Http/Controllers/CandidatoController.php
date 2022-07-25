<?php

namespace App\Http\Controllers;
use App\Models\Candidato;
use App\Models\votacao;
use App\Models\User;
use Auth;
use DB;
use Redirect;
use Illuminate\Http\Request;
Use \Carbon\Carbon;

class CandidatoController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Candidato $candidato){
        $this->request = $request;
        $this->repository = $candidato;
    }

    #pagina de votação
    public function index(){
        $dataA = Carbon::now()->toDateTimeString();
        $dataAtual = date('d-m-Y', strtotime($dataA));
        $data = date('d-m-Y', strtotime('2022-07-05'));#data que vai acontecer a vontação
        $votUse = false;#variavel que vai dizer se o usuario votou, false = não votou
        $filter = request('filter');
        $query = Candidato::query();
        $msg = null;
        $candidato = null;
        #verificando se o usuario já votou
        $queryVot = votacao::query();
        $queryVot->where('VOT_USU_CODIGO', '=', Auth::user()->id);
        $veriVots = $queryVot->paginate();
        if($veriVots->count() != 0){
            $votUse = true;
            return view('candidatos.votar', compact('votUse','data','dataAtual'));

        }else{
            if($filter != null){
                $query->where('CAN_CODIGO', '=', $filter);
                $candidatos = $query->paginate();
                
                if($candidatos->count() != 0){
                    
                    $candidato = $candidatos[0];
                }else{
                    
                    $candidatos = Candidato::get();
                    $candidato = $candidatos[0];
                    $msg = "Coloque um número válido";
                    
                }   
            }else{
                $candidatos = Candidato::get();
                if($candidatos->count() != 0)
                    $candidato = $candidatos[0];      
            }
        }
        return view('candidatos.votar', compact('candidato','msg', 'votUse','data','dataAtual'));
        
    }
    public function home(){
        $dataA = Carbon::now()->toDateTimeString();
        $dataAtual = date('d-m-Y', strtotime($dataA));
        $data = date('d-m-Y', strtotime('2022-07-02'));#data que vai acontecer a vontação
            #$collection = votacao::groupBy('VOT_CAN_CODIGO')
            #->selectRaw('count(*) as total, VOT_CAN_CODIGO')
            #->get();
        if(strtotime($dataAtual) > strtotime($data)){
            $totalV = DB::table("TB_VOTACAO")->select("*")->count();
            $arrayCandidatos = array();
            $contagem = 0;
            $collection = votacao::groupBy('VOT_CAN_CODIGO')
            ->selectRaw('count(*) as total, VOT_CAN_CODIGO')
            ->orderBy('total', 'DESC')
            ->get()->toArray();
            foreach($collection as $colle){
                $query = Candidato::query();
                $query->where('CAN_CODIGO', '=', $colle['VOT_CAN_CODIGO']);
                $candidatos = $query->paginate();
                $candidato = $candidatos[0];
                $arrayCandidatos[] = $candidato;
            }
            if($arrayCandidatos)
                $contagem = 1;
            return view('eleicao.home', compact('data','dataAtual','collection','arrayCandidatos','contagem',
            'totalV'));
        }   
            #dd($collection);
        
        return view('eleicao.home', compact('data','dataAtual'));
    }

    public function create(){
        return view('candidatos.createCandidato');
    }

    public function store(Request $request)
    {
        $extension = $request->CAN_IMAGEM->extension();
        $nameImage = "{$request->CAN_NOME}.{$extension}";
        $request->CAN_IMAGEM->storeAs('candidatos', $nameImage);
        Candidato::create([
        'CAN_NOME' => $request->CAN_NOME,
        'CAN_VICE' => $request->CAN_VICE,
        'CAN_IMAGEM' => $nameImage
        ]);
        return route('candidatos.votar');
    }

}