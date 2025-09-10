<?php


class Layouts {
   public function header($conf) {
      $title = isset($conf['title']) ? htmlspecialchars($conf['title']) : 'Welcome';
      echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>{$title}</title>
   <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <style>
      body { background: #f8fafc; }
      .main-banner {
         background: linear-gradient(90deg, #e0e7ff 0%, #f8fafc 100%);
         box-shadow: 0 4px 24px rgba(0,0,0,0.08);
         border-radius: 2rem;
         padding: 3rem 2rem;
         margin-bottom: 3rem;
         position: relative;
      }
      .main-banner .fa {
         font-size: 3rem;
         color: #6366f1;
         margin-bottom: 1rem;
      }
      .main-banner .btn-primary {
         margin-top: 2rem;
         padding: 0.75rem 2rem;
         font-size: 1.1rem;
         border-radius: 2rem;
      }
      .card-custom {
         border-radius: 1rem;
         box-shadow: 0 2px 8px rgba(0,0,0,0.03);
      }
      .navbar {
         box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      }
      .form-label { font-weight: 500; }
   </style>
</head>
HTML;
   }

   public function navbar($conf) {
      $site_name = isset($conf['site_name']) ? htmlspecialchars($conf['site_name']) : 'Site';
      echo <<<HTML
<body>
   <main>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
         <div class="container">
            <a class="navbar-brand fw-bold" href="#">{$site_name}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item"><a class="nav-link active" aria-current="page" href="./">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
                  <li class="nav-item"><a class="nav-link" href="signin.php">Sign In</a></li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="container">
HTML;
   }

   public function banner($conf) {
      $banner_title = isset($conf['banner_title']) ? htmlspecialchars($conf['banner_title']) : 'Welcome!';
      $banner_text = isset($conf['banner_text']) ? htmlspecialchars($conf['banner_text']) : 'This is your site banner.';
      $banner_btn_text = isset($conf['banner_btn_text']) ? htmlspecialchars($conf['banner_btn_text']) : 'Get Started';
      $banner_btn_link = isset($conf['banner_btn_link']) ? htmlspecialchars($conf['banner_btn_link']) : 'signup.php';
      echo <<<HTML
         <div class="main-banner text-center">
            <i class="fa fa-gamepad"></i>
            <h1 class="display-4 fw-bold">{$banner_title}</h1>
            <p class="lead">{$banner_text}</p>
            <a href="{$banner_btn_link}" class="btn btn-primary">{$banner_btn_text}</a>
         </div>
HTML;
   }

   public function content($conf) {
      echo <<<HTML
         <div class="row g-4 mb-5">
            <div class="col-md-6">
               <div class="card card-custom p-4 h-100">
                  <h2 class="h4 fw-bold mb-3">Change the background</h2>
                  <p class="mb-3">Swap the background-color utility and add a <code>.text-*</code> color utility to mix up the look.</p>
               </div>
            </div>
         </div>
HTML;
   }

   public function form_content($conf, $ObjForm) {
      echo <<<HTML
         <div class="row justify-content-center mb-5">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
               <div class="card card-custom p-4 shadow-lg border-0" style="margin: 0 auto;">
HTML;
      if ($_SERVER['PHP_SELF'] == '/IAP2.2/signup.php') {
         $ObjForm->signup();
      } else {
         $ObjForm->signin();
      }
      echo <<<HTML
               </div>
            </div>
         </div>
HTML;
   }

   public function footer($conf) {
      $site_name = isset($conf['site_name']) ? htmlspecialchars($conf['site_name']) : 'Site';
      $year = date('Y');
      echo <<<HTML
            <footer class="pt-4 mt-5 text-center text-body-secondary border-top small">
               <p class="mb-0">Copyright &copy; {$year} {$site_name}. All rights reserved.</p>
            </footer>
         </div>
      </main>
      <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js"></script>
   </body>
</html>
HTML;
   }
}