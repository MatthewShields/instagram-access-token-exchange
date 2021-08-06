<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Instagram Exchange Tool</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

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
    <link href="starter-template.css" rel="stylesheet">
  </head>
  <body>
    
<div class="col-lg-8 mx-auto p-3 py-md-5">
  <header class="d-flex align-items-center pb-3 mb-5 border-bottom">
    <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
      <span class="fs-4">Instagram Token Exchange</span>
    </a>
  </header>

  <main>
    <h1>What the Instagram Token Exchange tool is for</h1>
    <p class="fs-5 col-md-8">For using the Instagram oEmbed API you will need to create an application. As part of that process you will be given a short term lived access token which lasts only an hour. This tool will help you exchange this token for a long term access token, which lasts 60 days and can be programatically refreshed.</p>
    <p><strong>Note: This tool isn't specific to the oEmbed API though and can exchange any short term lived access token.</strong></p>

    <div class="mb-5">
        <a href="/tool/" class="btn btn-primary btn-lg px-4">Use Exchange Tool</a>
        <a href="/debugger/" class="btn btn-secondary btn-lg px-4">Use Debugger</a>
    </div>

    <hr class="col-3 col-md-2 my-5">

    <h2>What you will need prior to this:</h2>

    <ol>
        <li>Access to <a href="https://developers.facebook.com" target="_blank" rel="noreferrer noopener">developers.facebook.com</a> the account can be found on the passwords list.</li>
        <li>An approved and live application on <a href="https://developers.facebook.com" target="_blank" rel="noreferrer noopener">developers.facebook.com</a></li>
    </ol>

    <hr class="col-3 col-md-2 my-5">

    <h2>Steps to get short lived access token:</h2>

    <ol>
        <li>Visit the <a href="https://developers.facebook.com/tools/explorer/378772193683733/?method=GET&path=instagram_oembed%3Furl%3Dhttps%3A%2F%2Fwww.instagram.com%2Fp%2FBCkP2PgEWHP%2F&version=v11.0" target="_blank" rel="noreferrer noopener">Facebook Graph API Explorer</a></li>
        <li>Select the relevant Facebook App from the right hand sidebar</li>
        <li>Click generate Access Token</li>
        <li>Autorise Application</li>
        <li>The Access Token will appear in the field above</li>
        <li>You can then bring that token into this tool</li>
    </ol>

    <!-- <div class="row g-5">
      <div class="col-md-6">
        <h2>Starter projects</h2>
        <p>Ready to beyond the starter template? Check out these open source projects that you can quickly duplicate to a new GitHub repository.</p>
        <ul class="icon-list">
          <li><a href="https://github.com/twbs/bootstrap-npm-starter" rel="noopener" target="_blank">Bootstrap npm starter</a></li>
          <li class="text-muted">Bootstrap Parcel starter (coming soon!)</li>
        </ul>
      </div>

      <div class="col-md-6">
        <h2>Guides</h2>
        <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
        <ul class="icon-list">
          <li><a href="../getting-started/introduction/">Bootstrap quick start guide</a></li>
          <li><a href="../getting-started/webpack/">Bootstrap Webpack guide</a></li>
          <li><a href="../getting-started/parcel/">Bootstrap Parcel guide</a></li>
          <li><a href="../getting-started/contribute/">Contributing to Bootstrap</a></li>
        </ul>
      </div>
    </div> -->
  </main>
  <footer class="pt-5 my-5 text-muted border-top">
    Created by Matthew Shields
  </footer>
</div>


      
  </body>
</html>
