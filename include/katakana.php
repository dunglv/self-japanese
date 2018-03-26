<?php 
$filename = date('Ymd');
	create_katakana_file(base_path("/data/katakana/{$filename}.txt"));
	$arr = file_to_array(base_path("/data/katakana/{$filename}.txt"));
	$word = get_rand_word($arr);
?>

<div class="jumbotron">
  <h1 class="display-4"><?php echo $word['en'], get_jp_word($arr, $word['en']); ?></h1>
  <form>
  	<fieldset class="form-group">
  		<label for="exampleInputEmail1">Your answer</label>
  		<input type="email" class="form-control form-inline" id="exampleInputEmail1" placeholder="Enter email">
  		<small class="text-muted">Input your answer and press check</small>
  	</fieldset>
  	<button type="submit" class="btn btn-primary">Check now!</button>
  </form>
</div>