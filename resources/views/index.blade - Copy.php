@extends('layout')
@section('content')
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <div id="viewport">
    <div id="container">
      <div id="header">
      	<style type="text/css">
	
h3.blinkings{
    animation:blinkingText 1.2s infinite;
}
@keyframes blinkingText{
    0%{     color: #fff;    }
    49%{    color: red; }
    60%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: green;    }
}
#line{
    position: absolute;
    top: 71%;
    left: -3%;
    width: 340px;
    height: 200px;
    border-top: 7px solid red;

}
#win1{
	display: none;

	 position: absolute;
     top: 11%;
    right: -5%;
}
</style>

	<h3 class="blinkings">Play and Win</h3>
      </div>
      
      @php $i=0; @endphp
      @foreach($real as $list)
         <input type="hidden" id="imgid_{{$i++}}" value="{{substr($list->image,0,strpos($list->image, '.'))}}" name="">
      @endforeach
         <input type="hidden" id="count_lenght" name="" value="{{$real2}}">

      @php $i=0; @endphp
      @foreach($winimg as $winimgs)
         <input type="hidden" id="winimgid_{{$i++}}" value="{{substr($winimgs->image,0,strpos($winimgs->image, '.'))}}" name="">
      @endforeach
         <input type="hidden" id="win_count_lenght" name="" value="{{$real1}}">

      <div id="reels" style="    padding-top: 102px;
">
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
      	<div id="play" class="animate__animated animate__swing animate__delay-2s button button-default Spin1" >Spin Again</div>
  		</div>
  		  <input type="hidden" id="s_id"  value="{{session()->get('PLAY_ID')}}" name="">

      @else
       <div id="buttons">
	<div id="play" class="animate__animated animate__swing animate__delay-2s button button-default" data-toggle="modal" data-target="#myModal" >Spin The Wheel</div>
	  		  <input type="hidden" id="s_id"  value="0" name="">

      </div>


          @endif
             @if(session()->get('PLAY_ID')==2)
      <div id="buttons">
      	<div id="play" class="animate__animated animate__swing animate__delay-2s button button-default Spin4" >Spin Again</div>
  			      </div>
  			      <input type="hidden" id="s_id"  value="{{session()->get('PLAY_ID')}}" name="">
  			       @endif
  			       @if(session()->get('PLAY_ID')==3)
  			        <div id="buttons">
      	<div id="play" class="animate__animated animate__swing animate__delay-2s button button-default freeSpin" >FreeSpin</div>
  			      </div>
  			    <input type="hidden" id="s_id" value="{{session()->get('PLAY_ID')}}" name="">

  			      @endif
       <div id="url">
      </div>
     
      <div class="text-white" id="text" style="display: none;    margin-top: 110px;
"></div>
   <div id="line" style="display: none;">
      </div>
<div id="win1">
	<img src="{{asset('admin_asset/images/Gg_Jackpot.png')}}" width="360" height="360">
</div>
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
				<h4 class="modal-title text-center">Please Fill the Follwing</h4>
				<button type="button" class="close " data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<center>
									    <img src="{{asset('img/logo.png')}}" width="auto" height="150">

				</center>

				<form method="post" id="frmgetData">
					@csrf
						<div class="form-group text-center">
						<input type="checkbox" value="yes" name="terms"  id="terms">
						<label><b> User accepts <a href="www.google.com"> terms and conditions</a></b></label>
						

					</div>
					<span id="termserror" class="text-danger"></span>
						
				<span id="termserror" class="text-danger"></span>
					<div class="form-group text-center">
					<h5>Please confirm that you are over the age 18<h5>
						<input type="radio" value="yes" class="checkbox-primary ml-2" name="age" id="age">   Yes 
						<input type="radio" value="no" class="checkbox-danger ml-2" name="age" id="age">  No

					</div>
					<span id="ageerror" class="text-danger"></span>
						 
						<div class="input-group mb-3">
						<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i>

</span>
						</div>
						<input type="text" class="form-control "  name="number" placeholder="Phone"  id="number">
						

						</div>
						 {{-- @if ($errors->has('number'))
                 <span class="text-danger">{{ $errors->first('number') }}</span>
                    @endif --}}
						<span id="numerror" class="text-danger"></span>

					
					<div  style="text-align: center;">
						<div id="getData"  class="btn btn-primary "><i class="fa fa-facebook"></i> Sign in with Facebook</div>
					</div>
					    <div class="flex items-center justify-end mt-4" style="display:non ;">
                <a  class="btn btn-primary " id="fblogin" href="{{ route('login.facebook') }}" style="margin-top: 0px !important;background: blue;color: #ffffff;padding: 5px;border-radius:7px;" id="btn-fblogin">
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
