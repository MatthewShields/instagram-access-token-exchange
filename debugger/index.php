<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Debugger | Instagram Exchange Tool</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet" />
  </head>
  <body>
    <div class="col-lg-8 mx-auto p-3 py-md-5">
      <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
        <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
          <span class="fs-4">Instagram Token Exchange</span>
        </a>
      </header>

      <?php

      if( isset($_GET['access_token']) ) {

        $access_token = str_replace(' ', '', $_GET['access_token']);

      }

      elseif( isset($_POST['access_token']) ) {

        $access_token = str_replace(' ', '', $_POST['access_token']);

      }

      else {

        $access_token = '';
        
      }
      ?>

      <main>
        <h1>Access Token Debugger</h1>
        <p class="fs-5 col-md-8">This tool will let you debug an existing access token including if it is valid and how long till it expires.</p>

        <form method="GET">
          <div class="row g-3 my-2">
            <div class="col-sm-12">
              <label for="access_token" class="form-label">Access Token</label>
              <input type="text" class="form-control" id="access_token" name="access_token" placeholder="" value="<?php echo $access_token; ?>" required="" />
            </div>
          </div>

          <button class="w-100 btn btn-primary btn-lg my-2" type="submit">Exhange Token</button>
        </form>

        <?php

				$display_output = false;

				if( $access_token !== '' ) {

					$display_output = true;

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/debug_token?input_token=$access_token&access_token=$access_token"); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					$output = curl_exec($ch);

					$json_output = json_decode($output);

          $loop_data = false;

					if(isset($json_output->data)) {
						$loop_data = $json_output->data;
					}

					curl_close($ch);
				
				}

        ?>
				<?php if($display_output) : ?>
					<div class="my-6">
						<!-- <div class="my-4">
							<label for="long_lived_access_token" class="form-label">Long Lived Access Token</label>
							<input type="text" class="form-control" id="long_lived_access_token" name="long_lived_access_token" placeholder="" value="<?php echo $long_lived_token; ?>" required="" onclick="this.focus();this.select()" readonly />
						</div> -->
						<div class="my-4">
							<label for="long_lived_access_token" class="form-label">Response</label>
							<textarea type="text" class="form-control" id="long_lived_access_token" name="long_lived_access_token" readonly><?php echo ($output); ?></textarea>
						</div>

            <?php if($loop_data) : ?>
              <?php foreach ($loop_data as $key => $value) : ?>
                <?php if(is_object($value) || is_array($value) ) : ?>
                  <h4><?php echo $key; ?></h4>
                  <?php foreach ($value as $sub_key => $sub_value) : ?>
                    <div class="my-4">
                      <label for="<?php echo $sub_key; ?>" class="form-label"><?php echo $sub_key; ?></label>
                      <input type="text" class="form-control" id="<?php echo $sub_key; ?>" name="<?php echo $sub_key; ?>" value="<?php echo ($sub_value); ?>" readonly>
                    </div>
                  <?php endforeach; ?>
                <?php else : ?>

                  <?php if($key === 'expires_at' || $key === 'data_access_expires_at') {
                    $time_diff = $value - time();
                    $dtF = new \DateTime('@0');
                    $dtT = new \DateTime("@$time_diff");
                    $time_diff_nice = $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
                    $value = "$value ($time_diff_nice)";
                  } ?>
                  <div class="my-4">
                    <label for="<?php echo $key; ?>" class="form-label"><?php echo $key; ?></label>
                    <input type="text" class="form-control" id="<?php echo $key; ?>" name="<?php echo $key; ?>" value="<?php echo ($value); ?>" readonly>
                  </div>
                <?php endif; ?>
              <?php endforeach; ?>
            <?php endif;?>
					</div>
				<?php endif; ?>
      </main>
      <footer class="pt-5 my-5 text-muted border-top">Created by Matthew Shields</footer>
    </div>
  </body>
</html>
