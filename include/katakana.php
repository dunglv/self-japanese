<?php 
    $filename = date('Ymd');
	create_katakana_file(base_path("/data/katakana/{$filename}.txt"));
	$arr = file_to_array(base_path("/data/katakana/{$filename}.txt"));
	$word = get_rand_word($arr);
?>

<div class="jumbotron">
  <div class="display-10 center">Check your hiragana table japanase. Click on card to show answer</div>
  <div id="card">
    <div class="card-kata">
      <div class="item-card card-fore">
          <?php echo $word['en'] ?>
      </div>
      <div class="item-card card-behind">
          <?php echo $word['jp'] ?>
      </div>
    </div>
  </div>
  <form method="post">
  	<fieldset class="form-group">
  		<label for="exampleInputEmail1">Your answer</label>
  		<input type="text" class="form-control form-inline" placeholder="Enter your answer" name="answer">
  		<small class="text-muted">Input your answer and press check</small>
  	</fieldset>
  	<button type="submit" class="btn btn-primary">Check now!</button>
  </form>

  <!-- <div class="card-flip">
        <canvas id="cardFlip" width="300" height="300"></canvas>
        <canvas id="stroke" width="300" height="300"></canvas>
  </div> -->
</div>
<script>
    // $(function(){
    //     var cv = document.getElementById('cardFlip');
    //     var context = cv.getContext('2d');
    //     context.font = '140pt Calibri';
    //     context.fillStyle = '#28a745';
    //     context.fillText("<?php echo $word['jp']; ?>", 60, 210);
    //     var url = window.location.href;
    //     var x = 100, y = 200;
    //     var max = 10, min = 300;
    //     var requestAnimationFrame = window.requestAnimationFrame || 
    //                         window.mozRequestAnimationFrame || 
    //                         window.webkitRequestAnimationFrame || 
    //                         window.msRequestAnimationFrame;
    // });
</script>
