<?php
namespace App\Http\Controllers;
use App\Picture;
use Illuminate\Http\Request;
use Image; 
use Auth;
use PhpAcademy\Image\Filters;
use Illuminate\Support\Facades\DB;
class FormController extends Controller
{
    public function form()
    {
        if(Auth::guest()){
            return redirect('/login');
        }
        else{
        return view('form');}
    }
    public function submit(Request $request)
    {
        $this->validate($request, [
            //'dummy'   => 'required',
            'pname'      => 'required|max:40',
            'description' => 'required|max:200',
            'type'         =>'in:private,public'
        ]);
        //var_dump($request->all());
        
        if ($request->hasFile('pic_file')) {
            $ext=$request->pic_file->getClientOriginalExtension();
            if (file_exists(storage_path("/app/pictures/".$request->pname.'.'.$ext))) {
                return view('form', ['exmsg'=>"File with this name already exists!!!"]);
            }
            else{
            $img = Image::make($request->pic_file);
            $img->resize(640, 640, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize(); });
            $img->save(storage_path()."/app/pictures/".$request->pname.'.'.$ext);
            
             
        /**
         * Save to DB
         */
        $picture = new Picture();
        $picture->p_name        = $request->pname;
        $picture->description   = $request->description;
        $picture->p_dir         = $request->pname.'.'.$ext;
        $picture->type          = $request->type;
        $picture->uid           =Auth::user()->id;
        //much shorter version
        //$attendee = new Attendee($request->all());
        $picture->save();
        //redirect to thankyou 
       
       $filtername=array('Antique', 'Blur', 'Chrome', 'Monopin', 'Retro', 'Velvet', 'BlackWhite', 'Boost', 'Dreamy', 'Sepia', 'SynCity');
         return view('filter', ['image'=>$img->encode('data-url'), 'picture' => $picture, 'last_filter'=>'none', 'filter'=>$filtername
        ]);
       }}
       else{
           return view('form', ['msg'=>"Please,choose picture!!!"]);
       }
      
    }
    public function filter(Request $request)
    {    $filtername=array('Antique', 'Blur', 'Chrome', 'Monopin', 'Retro', 'Velvet', 'BlackWhite', 'Boost', 'Dreamy', 'Sepia', 'SynCity');
        $image = Image::make(storage_path()."/app/pictures/".$request->p_dir);
           if ($request->filter=='Antique' || $request->final_filter=='Antique') {
               $image->filter(new Filters\AntiqueFilter());
           }
           else if ($request->filter=='Blur' || $request->final_filter=='Blur') {
               $image->filter(new Filters\BlurFilter());
           }
           else if ($request->filter=='Chrome' || $request->final_filter=='Chrome') {
               $image->filter(new Filters\ChromeFilter());
           }
           else if ($request->filter=='Monopin' || $request->final_filter=='Monopin') {
               $image->filter(new Filters\MonopinFilter());
           }
           else if ($request->filter=='Retro' || $request->final_filter=='Retro') {
               $image->filter(new Filters\RetroFilter());
           }
           else if ($request->filter=='Velvet' || $request->final_filter=='Velvet') {
               $image->filter(new Filters\VelvetFilter());
           }
           else if ($request->filter=='BlackWhite' || $request->final_filter=='BlackWhite') {
               $image->filter(new Filters\BlackWhiteFilter());
           }
           else if ($request->filter=='Boost' || $request->final_filter=='Boost') {
               $image->filter(new Filters\BoostFilter());
           }
           else if ($request->filter=='Dreamy' || $request->final_filter=='Dreamy') {
               $image->filter(new Filters\DreamyFilter());
           }
           else if ($request->filter=='Sepia' || $request->final_filter=='Sepia') {
               $image->filter(new Filters\DreamyFilter());
           }
           else if ($request->filter=='SinCity' || $request->final_filter=='SinCity') {
               $image->filter(new Filters\SinCityFilter());
           }
           if($request->final_filter){
            $ext = pathinfo($request->p_dir, PATHINFO_EXTENSION);
            $image->save(storage_path()."/app/pictures/".$request->p_dir);
            DB::table('picture')->where('p_dir', $request->p_dir)->update(['p_name' => $request->pname,'description'=>$request->description, 'p_dir'=>$request->pname.".".$ext]);
            rename(storage_path()."/app/pictures/".$request->p_dir, storage_path()."/app/pictures/".$request->pname.".".$ext);
            return redirect('thankyou');
        }
        else{
        $picture= DB::table('picture')->where('p_dir', $request->p_dir)->first();
       return view('filter', ['image'=>$image->encode('data-url'), 'picture' => $picture,'last_filter'=>$request->filter, 'filter'=>$filtername
        ]);
        }
        
    }
    public function thankyou()
    {
        return view('thankyou');
    }
    public function delete($pid)
    {
        $pic=DB::table('picture')->where('pid', $pid)->first();
        unlink(storage_path()."/app/pictures/".$pic->p_dir); 
        DB::table('picture')->where('pid', $pid)->delete();
        return redirect('/');
        
    }
    public function edit($pid){
        $pic=DB::table('picture')->where('pid', $pid)->first();
        $image = Image::make(storage_path()."/app/pictures/".$pic->p_dir);
        $filtername=array('Antique', 'Blur', 'Chrome', 'Monopin', 'Retro', 'Velvet', 'BlackWhite', 'Boost', 'Dreamy', 'Sepia', 'SynCity');
        return view('filter', ['image'=>$image->encode('data-url'), 'picture' => $pic,'last_filter'=>'none', 'filter'=>$filtername
        ]);
}
}