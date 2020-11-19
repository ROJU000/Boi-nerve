<?php

namespace App\Http\Controllers;

use App\Dashboard;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function index()
    {
        // $dasboards = Dashboard::paginate(20);
        return view('dashboard');
    }


    public function switchdashboards(Request $request) {
        if (isset($request->data)) {
            // These are the respective file names to be included later in the code
            switch ($request->data) {
                case '1':
                    $top_5_states_array = $this->TopFiveState();
                    $perproduct_array = $this->CollectionPerProduct();
                    $data_array = $this->geeppiechart();
                    $cards = [];
                    array_push($cards, $this->geeptac());
                    array_push($cards, $this->geeptad());
                    array_push($cards, $this->geeptad());
                    array_push($cards, $this->geeptnpl());
                    return (string)View::make('geep',['piecharts' => $data_array, 'barcharts' => $perproduct_array, 'barchart1' =>$top_5_states_array,  'cards'=> $cards] );
                    break;

                    /// TRADERMONI DASHBOARD ///
                case '2':
                    $top_5_states_array = $this->TopFiveState();
                    $tper_region_array = $this->Tradermonicountper_region();
                    $trade_type_array = $this->Tradermonitradetype();
                    $trader = $this->Tradermonipiechart();
                    $cards = [];
                    array_push($cards, $this->Tradermonitac());
                    array_push($cards, $this->Tradermonitad());
                    array_push($cards, $this->Tradermonitad());
                    array_push($cards, $this->Tradermonitnpl());
                    return (string)View::make('tradermoni',['piecharts' => $trader, 'barcharts' => $trade_type_array, 'barchart2' =>$tper_region_array, 'barchart1' =>$top_5_states_array, 'cards'=> $cards] );
                    break;

                    /// MARKETMONI DASHBOARD ///
                case '3':
                    $top_5_states_array = $this->TopFiveState();
                    $perproduct_array = $this->CollectionPerProduct();
                    $market = $this->Marketmonipiechart();
                    $cards = [];
                    array_push($cards, $this->Marketmonitac());
                    array_push($cards, $this->Marketmonitad());
                    array_push($cards, $this->Marketmonitad());
                    array_push($cards, $this->Marketmonitnpl());
                    return (string)View::make('marketmoni',['piecharts' => $market, 'barcharts' => $perproduct_array, 'barchart1' =>$top_5_states_array, 'cards'=> $cards] );
                    break;

                    /// FARMERMONI DASHBOARD ///
                case '4':
                    $top_5_states_array = $this->TopFiveState();
                    $perproduct_array = $this->CollectionPerProduct();
                    $farmer = $this->Farmermonipiechart();
                    $cards = [];
                    array_push($cards, $this->Farmermonitac());
                    array_push($cards, $this->Farmermonitad());
                    array_push($cards, $this->Farmermonitad());
                    array_push($cards, $this->Farmermonitnpl());
                    return (string)View::make('farmermoni',['piecharts' => $farmer,'barcharts' => $perproduct_array, 'barchart1' =>$top_5_states_array, 'cards'=> $cards] );
                    break;
                default:
                    return "No Data";
                    break;
            }    
        }
        else {
            exit("Err!! No Parameter");
            
        } 
                    //// Controller for GEEP, Tradermoni, Marketmoni, Farmermoni ///
    }
    /// GEEP ///
    public function geeptac(){
        $data = DB::table("boi_nerve_master")->sum('total_payments_made'); 
        return number_format($data, 2); 
    }


    public function geeptad(){
        $data = DB::table("boi_nerve_master")->sum('amount_due'); 
        return number_format($data); 
    }


    public function geeptaid(){
        $data =DB::select("SELECT FORMAT( abs(sum(amount_default)), 2) amount_default from boi_nerve_master where amount_default <  0");
        return $data[0]->amount_default; ///array to json
    }


    public function geeptnpl(){
        $data =DB::select("SELECT FORMAT(abs(sum(amount_default)), 2) amount_default from boi_nerve_master where amount_default <  0 AND total_payments_made = 0");
        return $data[0]->amount_default;
    }

    public function geeppiechart(){
        $datapie =DB::select("SELECT sum(total_amount_onecard ) onecard, sum(total_amount_paydirect) paydirect  from boi_nerve_master");
        $data_array = array(
            'onecard' => $datapie[0]->onecard,
            'paydirect'=> $datapie[0]->paydirect
		);
        return $data_array;

    }

    public function CollectionPerProduct(){
        $perproduct =DB::select("SELECT product, sum(total_payments_made) summ FROM boi_nerve_master GROUP BY 1");
        $perproduct_array = array(
            'annn' => $perproduct[0]->product,
            'bnnn'=> $perproduct[1]->product,
            'cnnn'=> $perproduct[2]->product,
            'ann'=>$perproduct[0]->summ,
            'bnn'=>$perproduct[1]->summ,
            'cnn'=>$perproduct[2]->summ
        );
        return $perproduct_array;               
       
    }

    public function TopFiveState(){
        $top_5_states =DB::select("SELECT state, SUM( IF(product = 'Farmermoni', total_payments_made, 0)) fm, SUM( IF(product = 'MarketMoni', total_payments_made, 0)) mm, SUM( IF(product = 'Tradermoni', total_payments_made, 0)) tm, SUM(total_payments_made) summ FROM boi_nerve_master  GROUP BY 1 ORDER BY summ DESC LIMIT 5 ");
       

        // return $top_5_states; 
        $top_5_states_array = array(
            'a' => $top_5_states[0]->fm,
            'b'=> $top_5_states[1]->fm,
            'c'=> $top_5_states[2]->fm,
            'd'=> $top_5_states[3]->fm,
            'e'=> $top_5_states[4]->fm,
            'ab' => $top_5_states[0]->mm,
            'bb'=> $top_5_states[1]->mm,
            'cb'=> $top_5_states[2]->mm,
            'db'=> $top_5_states[3]->mm,
            'eb'=> $top_5_states[4]->mm,
            'ac' => $top_5_states[0]->tm,
            'bc'=> $top_5_states[1]->tm,
            'cc'=> $top_5_states[2]->tm,
            'dc'=> $top_5_states[3]->tm,
            'ec'=> $top_5_states[4]->tm,
            'ad' => $top_5_states[0]->state,
            'bd'=> $top_5_states[1]->state,
            'cd'=> $top_5_states[2]->state,
            'dd'=> $top_5_states[3]->state,
            'ed'=> $top_5_states[4]->state,

		);
        return $top_5_states_array;
        
    }
    /// Tradermoni ///
    public function Tradermonitac(){
        $data =DB::select("SELECT FORMAT(sum(total_payments_made), 2) amount_collected from boi_nerve_master WHERE product = 'TraderMoni'");
        return $data[0]->amount_collected;
    }


    public function Tradermonitad(){
        $data =DB::select("SELECT FORMAT(sum(amount_due), 2) amount_due from boi_nerve_master WHERE product = 'TraderMoni'");
        return $data[0]->amount_due;
    }


    public function Tradermonitaid(){
        $data =DB::select("SELECT FORMAT( abs(sum(amount_default)), 2) amount_default from boi_nerve_master WHERE product = 'TraderMoni' AND amount_default <  0");
        return $data[0]->amount_default; ///array to json
    }


    public function Tradermonitnpl(){
        $data =DB::select("SELECT FORMAT(abs(sum(amount_default)), 2) amount_default from boi_nerve_master WHERE product = 'TraderMoni' AND amount_default <  0 AND total_payments_made = 0");
        return $data[0]->amount_default;
    }

    public function Tradermonipiechart(){
        $datapie =DB::select("SELECT sum(total_amount_onecard ) onecard, sum(total_amount_paydirect) paydirect  from boi_nerve_master WHERE product = 'Tradermoni'"); 
        $trader = array(
            'onecard' => $datapie[0]->onecard,
            'paydirect'=> $datapie[0]->paydirect
		);
        return $trader;
        
    }

    public function Tradermonicountper_region(){
        $tper_region =DB::select("SELECT count(id) id, region FROM `boi_nerve_master` where product = 'TraderMoni' and is_disbursed = 'disbursed' and region <> ' ' group by 2");
        $tper_region_array = array(
            'a' => $tper_region[0]->id,
            'b'=> $tper_region[1]->id,
            'c'=> $tper_region[2]->id,
            'd'=> $tper_region[3]->id,
            'e'=> $tper_region[4]->id,
            'f'=> $tper_region[5]->id,
            'ab' => $tper_region[0]->region,
            'bb'=> $tper_region[1]->region,
            'cb'=> $tper_region[2]->region,
            'db'=> $tper_region[3]->region,
            'eb'=> $tper_region[4]->region,
            'fb'=> $tper_region[5]->region,
        );
        return $tper_region_array;
    }

    public function Tradermonitradetype(){
        $trade_type =DB::select("SELECT count(id) id, tradetype FROM `boi_nerve_master` where product = 'TraderMoni' and is_disbursed = 'disbursed'   and region <> ' ' group by 2");
        $trade_type_array = array(
            'a' => $trade_type[0]->id,
            'b'=> $trade_type[1]->id,
            'c'=> $trade_type[2]->id,
            'd'=> $trade_type[3]->id,
            'e'=> $trade_type[4]->id,
            'f'=> $trade_type[5]->id,
            'ab' => $trade_type[0]->tradetype,
            'bb'=> $trade_type[1]->tradetype,
            'cb'=> $trade_type[2]->tradetype,
            'db'=> $trade_type[3]->tradetype,
            'eb'=> $trade_type[4]->tradetype,
            'fb'=> $trade_type[5]->tradetype,
        );
        return $trade_type_array;
    }

    // public function Tradermonitotalpayment(){
    //     $ttotal_payment =DB::select("SELECT state, SUM(total_payments_made) from boi_nerve_master   where product = 'TraderMoni'  and state <> ' ' group by 1");
    //     // $ttotal_payment_array = array(
    //     //     'a' => $trade_type[0]->id,
    //     //     'b'=> $trade_type[1]->id,
    //     //     'c'=> $trade_type[2]->id,
    //     //     'd'=> $trade_type[3]->id,
    //     //     'e'=> $trade_type[4]->id,
    //     //     'f'=> $trade_type[5]->id,
    //     //     'ab' => $trade_type[0]->tradetype,
    //     //     'bb'=> $trade_type[1]->tradetype,
    //     //     'cb'=> $trade_type[2]->tradetype,
    //     //     'db'=> $trade_type[3]->tradetype,
    //     //     'eb'=> $trade_type[4]->tradetype,
    //     //     'fb'=> $trade_type[5]->tradetype,
    //     // );
    //     return $ttotal_payment;
    // }


    
    /// Marketmoni ///
    public function Marketmonitac(){
        $data =DB::select("SELECT FORMAT(sum(total_payments_made), 2) amount_collected from boi_nerve_master WHERE product = 'MarketMoni'");
        return $data[0]->amount_collected;
    }


    public function Marketmonitad(){
        $data =DB::select("SELECT FORMAT(sum(amount_due), 2) amount_due from boi_nerve_master WHERE product = 'MarketMoni'");
        return $data[0]->amount_due;
    }


    public function Marketmonitaid(){
        $data =DB::select("SELECT FORMAT( abs(sum(amount_default)), 2) amount_default from boi_nerve_master WHERE product = 'MarketMoni' AND amount_default <  0");
        return $data[0]->amount_default; ///array to json
    }


    public function Marketmonitnpl(){
        $data =DB::select("SELECT FORMAT(abs(sum(amount_default)), 2) amount_default from boi_nerve_master WHERE product = 'MarketMoni' AND amount_default <  0 AND total_payments_made = 0");
        return $data[0]->amount_default;
    }

    public function Marketmonipiechart(){
        $datapie =DB::select("SELECT sum(total_amount_onecard ) onecard, sum(total_amount_paydirect) paydirect  from boi_nerve_master WHERE product = 'MarketMoni'");
        $market = array(
            'onecard' => $datapie[0]->onecard,
            'paydirect'=> $datapie[0]->paydirect
		);
		return $market;

    }


    // public function marketmonicountper_region(){
    //     $per_region =DB::select("SELECT count(id), region FROM `boi_nerve_master`
    //     where product = 'MarketMoni'
    //     and is_disbursed = 'disbursed'
    //     and region <> ' '
    //     group by 2");

    //     return $per_region;
    // }

    // public function Marketmonitradetype(){
    //     $trade_type =DB::select("SELECT count(id) id, tradetype FROM `boi_nerve_master` where product = 'MarketMoni' and is_disbursed = 'disbursed'   and region <> ' ' group by 2");
    //     // $trade_type_array = array(
    //     //     'a' => $trade_type[0]->id,
    //     //     'b'=> $trade_type[1]->id,
    //     //     'c'=> $trade_type[2]->id,
    //     //     'd'=> $trade_type[3]->id,
    //     //     'e'=> $trade_type[4]->id,
    //     //     'f'=> $trade_type[5]->id,
    //     //     'ab' => $trade_type[0]->tradetype,
    //     //     'bb'=> $trade_type[1]->tradetype,
    //     //     'cb'=> $trade_type[2]->tradetype,
    //     //     'db'=> $trade_type[3]->tradetype,
    //     //     'eb'=> $trade_type[4]->tradetype,
    //     //     'fb'=> $trade_type[5]->tradetype,
    //     // );
    //     return $trade_type;
    // }

    /// Farmermoni ///
    public function Farmermonitac(){
        $data =DB::select("SELECT FORMAT(sum(total_payments_made), 2) amount_collected from boi_nerve_master WHERE product = 'FarmerMoni'");
        return $data[0]->amount_collected;
    }


    public function Farmermonitad(){
        $data =DB::select("SELECT FORMAT(sum(amount_due), 2) amount_due from boi_nerve_master WHERE product = 'FarmerMoni'");
        return $data[0]->amount_due;
    }


    public function Farmermonitaid(){
        $data =DB::select("SELECT FORMAT( abs(sum(amount_default)), 2) amount_default from boi_nerve_master WHERE product = 'FarmerMoni' AND amount_default <  0");
        return $data[0]->amount_default; ///array to json
    }


    public function Farmermonitnpl(){
        $data =DB::select("SELECT FORMAT(abs(sum(amount_default)), 2) amount_default from boi_nerve_master WHERE product = 'FarmerMoni' AND amount_default <  0 AND total_payments_made = 0");
        return $data[0]->amount_default;
    }

    public function Farmermonipiechart(){
        $datapie =DB::select("SELECT sum(total_amount_onecard ) onecard, sum(total_amount_paydirect) paydirect  from boi_nerve_master WHERE product = 'FarmerMoni'");
        $farmer = array(
            'onecard' => $datapie[0]->onecard,
            'paydirect'=> $datapie[0]->paydirect
		);
		return $farmer;

    }

    // public function farmermonicountper_region(){
    //     $per_region =DB::select("SELECT count(id), region FROM `boi_nerve_master`
    //     where product = 'FarmerMoni'
    //     and is_disbursed = 'disbursed'
    //     and region <> ' '
    //     group by 2");

    //     return $per_region;
    // }

    // public function farmermonitradetype(){
    //     $trade_type =DB::select("SELECT count(id) id, tradetype FROM `boi_nerve_master` where product = 'FarmerMoni' and is_disbursed = 'disbursed'   and region <> ' ' group by 2");
    //     // $trade_type_array = array(
    //     //     'a' => $trade_type[0]->id,
    //     //     'b'=> $trade_type[1]->id,
    //     //     'c'=> $trade_type[2]->id,
    //     //     'd'=> $trade_type[3]->id,
    //     //     'e'=> $trade_type[4]->id,
    //     //     'f'=> $trade_type[5]->id,
    //     //     'ab' => $trade_type[0]->tradetype,
    //     //     'bb'=> $trade_type[1]->tradetype,
    //     //     'cb'=> $trade_type[2]->tradetype,
    //     //     'db'=> $trade_type[3]->tradetype,
    //     //     'eb'=> $trade_type[4]->tradetype,
    //     //     'fb'=> $trade_type[5]->tradetype,
    //     // );
    //     return $trade_type;
    // }

    


    

}
