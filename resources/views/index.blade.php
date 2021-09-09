@extends('layout')
@section('content')
     <!-- PERCENT LOADER START-->
    	<div id="mainLoader"><img src="{{asset('slot/assets/loader.png')}}" /><br><span>0</span></div>
        <!-- PERCENT LOADER END-->
        
        <!-- CONTENT START-->
        <div id="mainHolder">
        
        	<!-- BROWSER NOT SUPPORT START-->
        	<div id="notSupportHolder">
                <div class="notSupport">YOUR BROWSER ISN'T SUPPORTED.<br/>PLEASE UPDATE YOUR BROWSER IN ORDER TO RUN THE GAME</div>
            </div>
            <!-- BROWSER NOT SUPPORT END-->
            
            <!-- ROTATE INSTRUCTION START-->
            <div id="rotateHolder">
                <div class="mobileRotate">
                	<div class="rotateDesc">
                    	<div class="rotateImg"><img src="{{asset('slot/assets/rotate.png')}}" /></div>
                        Rotate your device <br/>to landscape
                    </div>
                </div>
            </div>
            <!-- ROTATE INSTRUCTION END-->
            
            <!-- CANVAS START-->
            @php $i=0; @endphp
      @foreach($real as $list)
         <input type="hidden" id="imgid_{{$i++}}" value="{{$list->image}}" name="">
      @endforeach
      <input type="hidden" id="count_lenght" name="" value="{{$real2}}">
            <div id="canvasHolder">
                <canvas id="gameCanvas" width="768" height="1024"></canvas>
            </div>
            <!-- CANVAS END-->
            
        </div>
        <!-- CONTENT END-->
        
@endsection
