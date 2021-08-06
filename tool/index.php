<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exchange Tool | Instagram Exchange Tool</title>

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

      if(isset($_GET['client_id']) && isset($_GET['client_secret']) && isset($_GET['short_lived_access_token']) ) {

        $client_id = str_replace(' ', '', $_GET['client_id']);
        $client_secret = str_replace(' ', '', $_GET['client_secret']);
        $short_lived_access_token = str_replace(' ', '', $_GET['short_lived_access_token']);

      }

      elseif(isset($_POST['client_id']) && isset($_POST['client_secret']) && isset($_POST['short_lived_access_token']) ) {

        $client_id = str_replace(' ', '', $_POST['client_id']);
        $client_secret = str_replace(' ', '', $_POST['client_secret']);
        $short_lived_access_token = str_replace(' ', '', $_POST['short_lived_access_token']);

      }

      else {

        $client_id = '';
        $client_secret = '';
        $short_lived_access_token = '';
        
      }
      ?>

      <main>
        <h1>Access Token Exchange</h1>
        <p class="fs-5 col-md-8">For using the Instagram oEmbed API you will need to create an application. As part of that process you will be given a short term lived access token which lasts only an hour. This tool will help you exchange this token for a long term access token, which lasts 60 days and can be programatically refreshed.</p>
        <p>
          <strong>Note: This tool isn't specific to the oEmbed API though and can exchange any short term lived access token.</strong>
        </p>

        <form method="GET">
          <div class="row g-3 my-2">
            <div class="col-sm-6">
              <label for="client_id" class="form-label">Client ID</label>
              <input type="text" class="form-control" id="client_id" name="client_id" placeholder="" value="<?php echo $client_id; ?>" required="" />
            </div>

            <div class="col-sm-6">
              <label for="client_secret" class="form-label">Client Secret</label>
              <input type="text" class="form-control" id="client_secret" name="client_secret" placeholder="" value="<?php echo $client_secret; ?>" required="" />
            </div>
          </div>
          <div class="row g-3 my-2">
            <div class="col-sm-12">
              <label for="short_lived_access_token" class="form-label">Short Lived Access Token</label>
              <input type="text" class="form-control" id="short_lived_access_token" name="short_lived_access_token" placeholder="" value="<?php echo $short_lived_access_token; ?>" required="" />
            </div>
          </div>

          <button class="w-100 btn btn-primary btn-lg my-2" type="submit">Exhange Token</button>
        </form>

        <?php

				$display_output = false;

				if( $client_id !== '' && $client_secret !== '' && $short_lived_access_token !== '' ) {

					$display_output = true;

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/v11.0/oauth/access_token?grant_type=fb_exchange_token&client_id=$client_id&client_secret=$client_secret&fb_exchange_token=$short_lived_access_token"); 
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
					$output = curl_exec($ch);

					$json_output = json_decode($output);

					$long_lived_token = 'Not Available';

					if(isset($json_output->access_token)) {
						$long_lived_token = $json_output->access_token;
					}

					curl_close($ch);
				
				}

        ?>
				<?php if($display_output) : ?>
					<div class="my-6">
						<div class="my-4">
							<label for="long_lived_access_token" class="form-label">Long Lived Access Token</label>
							<input type="text" class="form-control" id="long_lived_access_token" name="long_lived_access_token" placeholder="" value="<?php echo $long_lived_token; ?>" required="" onclick="this.focus();this.select()" readonly />
						</div>
						<div class="my-4">
							<label for="long_lived_access_token" class="form-label">Response</label>
							<textarea type="text" class="form-control" id="long_lived_access_token" name="long_lived_access_token" readonly><?php echo ($output); ?></textarea>
						</div>
					</div>
				<?php endif; ?>
      </main>
      <footer class="pt-5 my-5 text-muted border-top">Created by Matthew Shields</footer>
    </div>
  </body>
</html>
