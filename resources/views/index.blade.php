@extends('layout')
@section('content')

  <div id="viewport">
    <div id="container">
      <div id="header">
	<h3>Play and Win</h3>
      </div>
      @php $i=0; @endphp
      @foreach($real as $list)
         <input type="hidden" id="imgid_{{$i++}}" value="{{substr($list->image,0,strpos($list->image, '.'))}}" name="">
      @endforeach
         <input type="hidden" id="count_lenght" name="" value="{{$real2}}">

      <div id="reels">
	<canvas id="canvas1" width="70" height="300"></canvas>
	<canvas id="canvas2" width="70" height="300"></canvas>
	<canvas id="canvas3" width="70" height="300"></canvas>
	<div id="overlay">
	  <div id="winline"></div>
	</div>
	{{-- <div id="results">
	  <div id="score">
	    <span id="multiplier">0</span> x <img src="img/gold-64.png"/>
	  </div>
	  <div id="status"></div>
	</div> --}}
      </div>


       @if(session()->has('PLAY_ID')==1)
      <div id="buttons">
      	<div id="play" class="button button-default Spin1" >Spin</div>
  		</div>

      @else
       <div id="buttons">
	<div id="play" class="button button-default" data-toggle="modal" data-target="#myModal" >Spin The Wheel</div>
      </div>


          @endif
             @if(session()->get('PLAY_ID')==2)
      <div id="buttons">
      	<div id="play" class="button button-default Spin4" >Spin</div>
  			      </div>
  			      
  			       @endif
  			       @if(session()->get('PLAY_ID')==3)
  			        <div id="buttons">
      	<div id="play" class="button button-default freeSpin" >FreeSpin</div>
  			      </div>
  			      @endif
       <div id="url">
      </div>

      <div class="text-white" id="text" style="display: none;    margin-top: 110px;
"></div>
  

     {{--  <div class="fb-share-button" 
data-href="https://www.google.com/" id="fb_share" style="margin-top: 80px;" 
data-layout="button_count">
</div>
     <div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id))

 return;

js = d.createElement(s); js.id = id;

js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->

   </div> --}}

   <script type="text/javascript">
   	$('document').ready(function(){
   		$('#fb_share').click(function(){
				$('.Spin4').hide();
	});
   	});

   </script>


							
<!-- The Modal -->
<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Fill filed</h4>
				<button type="button" class="close " data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<form method="post" id="frmgetData">
					@csrf
					<div class="mt-4 form-group">
						
						<div class="input-group mb-3">
						<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Phone</span>
						</div>
						<input type="text" class="form-control "  name="number"  id="number">
						

						</div>
						 {{-- @if ($errors->has('number'))
                 <span class="text-danger">{{ $errors->first('number') }}</span>
                    @endif --}}
						<span id="numerror" class="text-danger"></span>

					<div class="form-group">
						<input type="checkbox" value="yes" name="terms"  id="terms">
						<label>User accepts terms and conditions</label>
						

					</div>
					<span id="termserror" class="text-danger"></span>
						
				<span id="termserror" class="text-danger"></span>
					<div class="form-group">
						<input type="checkbox" value="yes" class="checkbox-primary" name="age"  id="age"  >
						<label>please confirm that you are over the age 18</label>
					</div>
					<span id="ageerror" class="text-danger"></span>
						 
					<div  style="text-align: center;">
						<div id="getData"  class="btn btn-primary "><i class="fa fa-facebook"></i> Facebook Login</div>
					</div>
					    <div class="flex items-center justify-end mt-4" style="display: none;">
                <a  class="btn btn-primary " id="fblogin" href="{{ url('auth/facebook') }}" style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;" id="btn-fblogin">
                    <i class="fa fa-facebook-square" aria-hidden="true"></i> Login with Facebook
                </a>
            </div>
				</form>

			</div>

		</div>
	</div>
</div>
</section>


@endsection


<script type="text/javascript">
function getDatamodel(){
	 // var number=jQuery('#number').val();
	 // var terms=jQuery('#terms').val();
	 // var age=jQuery('#age').val();
	 // alert(number);
	 // if(number==''){
	 // 	jQuery('#numerror').text('please Enter number');
	 //  }
	 //  $('#myModal').hide();
	 //  game.restart();
	  // if(terms==''){
	 	// jQuery('#termserror').text('please accepts terms and conditions');
	  // }
	  //  if(age==''){
	 	// jQuery('#ageerror').text('please confirm over the age 18');
	  // }
	  
	// jQuery.ajax({
 //    url:'/place_order',
 //    data:jQuery('#frmgetData').serialize(),
 //    type:'post',
 //    success:function(result){
      
            
 //    }
 //  });
}
</script>
