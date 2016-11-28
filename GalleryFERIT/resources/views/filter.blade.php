@extends('layouts.app')
@section('content')
<html>
<h1>Uredi sliku:</h1>
<div class="fimagediv">   
    <table>    
            <tr><img id="uredi" class="fimg object-fit_cover" src="<?php echo $image ?>"  />
            </tr></br>
           <form method="post" action="{{ url('/filter#uredi')}}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="hidden" name="p_dir" value="<?php echo $picture->p_dir?>">
                <div> 
                <tr>
                 <label>Naziv:</label></tr></br>
                <tr><input type="text" name="pname" id="pname" value="<?php echo $picture->p_name;?>" required/>
                </tr></br>
                <tr>
                <label>Opis:</label></tr></br>
                <tr>
                <textarea name="description" id="description"  required><?php echo $picture->description;?></textarea>
                </tr></div>
                <tr>
                <?php foreach($filter as $value): ?>
                <td><button class="btn btn-default" type="submit" value="<?php echo $value ?>" name="filter"><?php echo $value ?></button></td>
                <?php endforeach; ?>
                </tr>
               
                <tr><button class="butt subbutt" type="submit" value="<?php echo $last_filter;?>" name="final_filter">Odaberi</button></tr>
               
            </form>
            
            </tr>
</table>
</div>        
</html>
@endsection

