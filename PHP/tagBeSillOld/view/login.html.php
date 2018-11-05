<?php 
$content = <<< EOT
    <div class=container>
    $success
    <form method='POST'>
    
      <div class="form-group">
      
        <input class="form-control" type="text" value="$nickname"  name="nickname">
      </div>
        $nicknameError
        
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password1">
      </div>
       $password1Error

     <button type="submit" class="btn btn-primary">Submit</button>

    </form>
</div>
EOT;
?>