<?php 
    $filename = date('Ymd');
	create_katakana_file(base_path("/data/katakana/{$filename}.txt"));
	$arr = file_to_array(base_path("/data/katakana/{$filename}.txt"));
	$word = get_rand_word($arr);
?>

<div class="jumbotron">
  <h1 class="display-4"><?php echo $word['en'], get_jp_word($arr, $word['en']); ?></h1>
  <style>
      #cardFlip{
        background: #ececec;
        border-radius: 10px;
        box-shadow: 0px 0px 5px #c5c5c5;
        border: 1px solid #d6d6d6;
        position: relative;
      }
      #stroke{
         transition: width .5s, height .5s, top .5s, left .5s;
      }
  </style>
  <form>
  	<fieldset class="form-group">
  		<label for="exampleInputEmail1">Your answer</label>
  		<input type="text" class="form-control form-inline" id="charInput" placeholder="Enter email">
  		<small class="text-muted">Input your answer and press check</small>
  	</fieldset>
  	<button type="submit" class="btn btn-primary">Check now!</button>
  </form>

  <div class="card-flip">
        <canvas id="cardFlip" width="300" height="300"></canvas>
        <canvas id="stroke" width="300" height="300"></canvas>
  </div>
</div>
<script>
    $(function(){
        var cv = document.getElementById('cardFlip');
        var context = cv.getContext('2d');
        context.font = '140pt Calibri';
        context.fillStyle = '#28a745';
        context.fillText("<?php echo $word['jp']; ?>", 60, 210);
        var url = window.location.href;
        var x = 100, y = 200;
        var max = 10, min = 300;
        var requestAnimationFrame = window.requestAnimationFrame || 
                            window.mozRequestAnimationFrame || 
                            window.webkitRequestAnimationFrame || 
                            window.msRequestAnimationFrame;
        $(document).on('click', '#cardFlip', function(e){
            var stro = document.getElementById('stroke');
            var ctStroke = stro.getContext('2d');

            setInterval(function(){
                ctStroke.beginPath();
                ctStroke.moveTo(x, y);
                var xRand =  Math.floor(Math.random() * (max - min) + min);
                var yRand = Math.floor(Math.random() *(max - min) + min);
                x = xRand, y = yRand;

                ctStroke.lineTo(xRand, yRand);
                ctStroke.lineWidth = 1;
                ctStroke.strokeStyle = "#ff0000";
                setInterval(function(){

                }, 500)

            }, 500);
           

            $.ajax({
                type: "GET",
                url: url+'/handle/check-char',
                data: {"char": $('#charInput').val()}

            });
        });
    });
</script>
