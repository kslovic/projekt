@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{asset('css/modal.css')}}">
<html>
<h1>Welcome to FERIT Gallery</h1>
<hr class="style17">
<?php 
$i=0;
foreach($slike as $slika): 
$i++;    ?>  
        <?php if($slika['type']=='private' && Auth::guest()){} 
        else{ if($slika['type']=='private' && Auth::check() && Auth::user()->id!=$slika->uid){} else{?>
            
            <div class="image"><a href="#" id="myImg<?php echo $i;?>" class="myImg" data-src="../storage/app/pictures/<?php echo $slika->p_dir ?>" data-title="<?php echo $slika->p_name ?>" data-description="<?php echo $slika->description ?>" data-elink="../public/edit/<?php echo $slika->pid ?>" data-dlink="../public/delete/<?php echo $slika->pid ?>"><img  class="myImg object-fit_cover timg" src="../storage/app/pictures/<?php echo $slika->p_dir ?>" alt="<?php echo $slika->p_name ?>"  />
            </div
            <!-- The Modal -->
<div id="myModal<?php echo $i;?>" class="modal">

  <!-- The Close Button -->
  <span class="close" onclick="document.getElementById('myModal<?php echo $i;?>').style.display='none'">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img<?php echo $i;?>">
  

  <!-- Modal Caption (Image Text) -->
  
  <div class="rightdiv"> 
  <h3 class="pictitle">Name:</h3>
  <div id="caption<?php echo $i;?>" class="caption"></div>
  <h3 class="pictitle">Description:</h3>
  <p class="caption " id="description<?php echo $i;?>"><?php echo $slika->description ?></p>
  <a class="caption piclinks" id="edit<?php echo $i;?>"href="{{ route('edit',$slika->pid) }}">Edit</a>
  <a class="caption piclinks" id="delete<?php echo $i;?>" href="{{ route('delete',$slika->pid) }}">Delete</a>
  </div>
</div> 
<script>var i={!! json_encode($i); !!}; </script>
<script src="js/modal.js"></script>
        <?php 
        } }
 endforeach; ?>
        
</html>


@endsection
