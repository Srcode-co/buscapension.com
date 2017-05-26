<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Pension;
use App\Usuario;
use DB;
use Image;

use Intervention\Image\ImageManager;

class PensionController extends Controller
{

    /* Crud de pensiones */

    public function create(Request $request){
    	   
        
        if(!Auth::guard('usuarios')->check()){
            return redirect('/login?back=/pension/create');
        }

    	if($request->isMethod('post')){
            
            $usuario = Usuario::find(Auth::guard('usuarios')->user()->id);
            $input = $request->input();
            if($input['latitude'] == ""){
                unset($input['latitude']);
                unset($input['longitude']);
            }

            $pension = $usuario->pensiones()->create($input);
            
            $files = $request->file('images');
            $file_count = count($files);

            foreach($files as $file) {
                
                $filename = date("d_m_Y_H_i_s").$file->getClientOriginalName();
                
                $file->move('images/pensiones', $filename);
                
                $manager = new ImageManager(array('driver' => 'imagick'));
                

                $w = getimagesize('images/pensiones/'.$filename)[0];
                $h =getimagesize('images/pensiones/'.$filename)[1];

                $i = $manager->make('images/pensiones/'.$filename);

                if($w > 600){
                            
                    $i->resize(600, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                        
                }

                $i->save('images/pensiones/'.$filename, 50);

                $pension->imagenes()->create(["imagen"=>$filename]);
            }
            return redirect('/pension/'.$pension->id.'/'.str_slug($pension->title, '-'));

    	}else{

    		$pension = new \App\Pension;
    		return view('pages.createPension',['pension' => $pension]);
    	}

    }


    public function update(Request $request, $id){
        if($request->isMethod('post')){

            $input = $request->input();
            $files = $request->file('images');

            if($input['latitude'] == ""){
                $input['latitude'] = NULL;
                $input['longitude'] = NULL;
            }

            $pension = Pension::find($id);
            $pension->update($input);

            if(count($files) != 0){
                foreach($files as $file) {
                    $filename = date("d_m_Y_H_i_s").$file->getClientOriginalName();
                    
                    $file->move('images/pensiones', $filename);

                    $w = getimagesize('images/pensiones/'.$filename)[0];
                    $h =getimagesize('images/pensiones/'.$filename)[1];
                    
                    $manager = new ImageManager(array('driver' => 'imagick'));
                    

                    $i = $manager->make('images/pensiones/'.$filename);
                   
                    if($w > 600){
                            
                        $i->resize(600, null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        
                    }

                    $i->save('images/pensiones/'.$filename, 50);

                    $pension->imagenes()->create(["imagen"=>$filename]);

                }
            }
            return redirect('/user/pensiones');

        }else{
            $pension = Pension::find($id);
            return view('pages.updatePension', ["pension" => $pension]);
        }
    }

    public function pensiones(Request $request){
        

        $pensiones;
        $data = $request->input();

        if(isset($data['city']) && !empty($data['city'])){
            $where = [['city', $data['city']]];
            
            

            
            if(isset($data['alone']) && !empty($data['alone']) && $data['alone'] != 'ambas'){

                array_push($where, ['alone', $data['alone']]);
            }



            $pensiones = Pension::where($where);

            if(isset($data['near']) && !empty($data['near'])){
                //array_push($where, ['near', $data['near']]);
                $pensiones = $pensiones->where('near', 'like', '%'.$data['near'].'%');
            }

            $pensiones = $pensiones->orderBy('visits', 'DESC');
            
            if(isset($data['page']) && !empty($data['page']) && $data['page'] > 1){
                $pensiones = $pensiones->skip($data['page'] * 10 - 10)->take($data['page'] * 10)->get();
            }else{
                $pensiones = $pensiones->take(10)->get();
            }

        }else{

            if(isset($data['page']) && !empty($data['page']) && $data['page'] > 1){
                /*
                $pensiones = Pension::join('favoritos', 'pensiones.id', 'favoritos.pension_id')
                ->select(DB::raw('*, count(pensiones.id) as cantidad'))
                ->groupBy('pensiones.id')
                ->orderBy('cantidad', 'DESC')
                ->skip($data['page'] * 10 - 10)
                ->take($data['page'] * 10)
                ->get();
                */

                $pensiones = Pension::orderBy('visits', 'DESC')
                ->skip($data['page'] * 10 - 10)
                ->take($data['page'] * 10)->get();
            }else{


                $pensiones = Pension::orderBy('visits', 'DESC')
                ->take(10)->get();

                /*
                $pensiones = Pension::join('favoritos', 'pensiones.id', 'favoritos.pension_id')
                ->select(DB::raw('*, count(pensiones.id) as cantidad'))
                ->groupBy('pensiones.id')
                ->orderBy('cantidad', 'DESC')
                ->take(10)
                ->get();
                */
            }
        }
        
       
        return view('pages.pensiones', ['pensiones'=>$pensiones]);
        
    }

    public function onePension($id, $title){

        $p = Pension::find($id);
        $p->visits = $p->visits +1;
        $p->save();

        return view('pages.onePension', ['pension' => $p]);
    }

    public function delete($id){
        
        if(!Auth::guard('usuarios')->check()){
            return redirect('/login');
        }

        $user = Usuario::find(Auth::guard('usuarios')->user()->id);
        $pension = $user->pensiones()->find($id);

        if(isset($pension)){
            $pension->favoritos()->detach();
            $pension->imagenes()->delete();
            $pension->delete();
        }

        return redirect('/user/pensiones');

    }


    /* User pensiones*/

    public function userPensiones(){

        if(!Auth::guard('usuarios')->check()){
            return redirect('/login');
        }

        $user = Usuario::find(Auth::guard('usuarios')->user()->id);
        $pensiones = $user->pensiones()->orderBy('updated_at', 'DESC')->get();
        return view('pages.user.pensiones', ["pensiones"=>$pensiones]);
        
    }

    public function userFavoritos($id){

        if(!Auth::guard('usuarios')->check()){
            return response()->json(["msg"=>"error"],404);
        }
        
        $usuario = Usuario::find(Auth::guard('usuarios')->user()->id);
        
        if(is_null($usuario->favoritos()->find($id))){
            $usuario->favoritos()->attach($id);
            return response()->json(["msg"=>"add"],200);
        }else{
            $usuario->favoritos()->detach($id);
            return response()->json(["msg"=>"remove"],200);
        } 
        
    }


    public function favoritos(){
        $f = Auth::guard('usuarios')->user()->favoritos;
        return view('pages.user.favoritos', ['favoritos' => $f]);
    }
}
