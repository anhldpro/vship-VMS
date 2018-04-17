<?php

namespace App\Http\Controllers\Road;

use App\Models\AVehicle;
use App\Models\AVehicleRoad;
use App\Models\AVehicleRoadSched;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RoadController extends Controller
{
    //

    public function index(){
        $
        $this->viewData = array(
        );
        return view('vms.road.index', $this->viewData);
    }

    public function create($id){
        $vehicle = AVehicle::find($id);
        // dd($data);
        $this->viewData = array(
            'vehicle' => $vehicle
        );
        return view('vms.road.create', $this->viewData);
    }

    public function show($id){
        $road = AVehicleRoad::find($id);
        $vehicle = $road->vehicle;
        // dd($data);
        $this->viewData = array(
            'road' => $road,
            'vehicle' => $vehicle
        );
        return view('vms.road.show', $this->viewData);
    }

    public function edit($id){
        $road = AVehicleRoad::find($id);
        $vehicle = $road->vehicle;
        // dd($data);
        $this->viewData = array(
            'road' => $road,
            'vehicle' => $vehicle
        );
        return view('vms.road.edit', $this->viewData);
    }

    public function store(Request $request){
        try{
            $rules = [
                'from_name' => 'required',
                'to_name' => 'required'
            ];
            $messages = [
                'from_name.required' => 'Vui lòng chọn điểm khởi hành!!!',
                'to_name.required' => 'Vui lòng chọn điểm đến!!!'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);


            $data = $request->all();
            $veh_id = $data['veh_id'];
            if ($validator->fails()) {
                return redirect(route('vms.road.create', ['id' => $veh_id]))
                    ->withErrors($validator)
                    ->withInput();
            }else{
                //save data
                $account_id = Auth::id();
                $from_pos_name = $data['from_name'];
                $from_pos = $data['from_pos'];
                $from_place_id = $data['from_place_id'];
                $to_name = $data['to_name'];
                $to_pos = $data['to_pos'];
                $to_place_id = $data['to_place_id'];
                $mon = $data['mon'];
                $tue = $data['tue'];
                $wed = $data['wed'];
                $thu = $data['thu'];
                $fri = $data['fri'];
                $sat = $data['sat'];
                $sun = $data['sun'];

                //save road
                /*
                 * 3. Them tuyen duong (AVehicleRoad)
                 */

                /*$isFix = ($data['fix_road'] == true) ? 1 : 0;*/

                $vehRoad = new AVehicleRoad();
                $vehRoad->account_id = $account_id;
                $vehRoad->veh_id = $veh_id;
                $vehRoad->from_pos = $from_pos;
                $vehRoad->from_place_id = $from_place_id;
                $vehRoad->from_name = $from_pos_name;
                $vehRoad->to_pos = $to_pos;
                $vehRoad->to_place_id = $to_place_id;
                $vehRoad->to_name = $to_name;
                $vehRoad->status = Config::get('contants.status.ACTV');

                $vehRoad->save();



                //save road sched
                $vehRoadId = $vehRoad->id;
                $rdSched = new AVehicleRoadSched();
                $rdSched->road_id = $vehRoadId;
                $rdSched->mon = $mon;
                $rdSched->tue = $tue;
                $rdSched->wed = $wed;
                $rdSched->thur = $thu;
                $rdSched->fri = $fri;
                $rdSched->sat = $sat;
                $rdSched->sun = $sun;
                $rdSched->status = Config::get('contants.status.ACTV');

                $rdSched->save();

                Session::flash('success', 'Thêm mới thành công !!!!!');

                return redirect(route('vms.vehicle.show', ['id'=> $veh_id]));

            }
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }
    }

    public function update(Request $request, $id){
        try{
            $rules = [
                'from_name' => 'required',
                'to_name' => 'required'
            ];
            $messages = [
                'from_name.required' => 'Vui lòng chọn điểm khởi hành!!!',
                'to_name.required' => 'Vui lòng chọn điểm đến!!!'
            ];
            $validator = Validator::make($request->all(), $rules, $messages);


            $data = $request->all();
            $veh_id = $data['veh_id'];
            if ($validator->fails()) {
                return redirect(route('vms.road.create', ['id' => $veh_id]))
                    ->withErrors($validator)
                    ->withInput();
            }else{
                //save data
                $account_id = Auth::id();
                $from_pos_name = $data['from_name'];
                $from_pos = $data['from_pos'];
                $from_place_id = $data['from_place_id'];
                $to_name = $data['to_name'];
                $to_pos = $data['to_pos'];
                $to_place_id = $data['to_place_id'];
                $mon = $data['mon'];
                $tue = $data['tue'];
                $wed = $data['wed'];
                $thu = $data['thu'];
                $fri = $data['fri'];
                $sat = $data['sat'];
                $sun = $data['sun'];

                //save road
                /*
                 * 3. Them tuyen duong (AVehicleRoad)
                 */

                /*$isFix = ($data['fix_road'] == true) ? 1 : 0;*/

                $vehRoad = AVehicleRoad::find($id);
                $vehRoad->from_pos = $from_pos;
                $vehRoad->from_place_id = $from_place_id;
                $vehRoad->from_name = $from_pos_name;
                $vehRoad->to_pos = $to_pos;
                $vehRoad->to_place_id = $to_place_id;
                $vehRoad->to_name = $to_name;

                $vehRoad->update();



                //save road sched
                $vehRoadSchedId = $vehRoad->vehSched->id;
                $rdSched = AVehicleRoadSched::find($vehRoadSchedId);
                $rdSched->mon = $mon;
                $rdSched->tue = $tue;
                $rdSched->wed = $wed;
                $rdSched->thur = $thu;
                $rdSched->fri = $fri;
                $rdSched->sat = $sat;
                $rdSched->sun = $sun;

                $rdSched->update();

                Session::flash('success', 'Thêm mới thành công !!!!!');

                return redirect(route('vms.vehicle.show', ['id'=> $veh_id]));

            }
        } catch (Exception $e) {
            \Log::info($e->getMessage());
        }
    }


}
