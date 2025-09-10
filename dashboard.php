
<?php
require 'ClassAutoLoad.php';

$ObjLayout->header($conf);
$ObjLayout->navbar($conf);
echo '<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<div class="card card-custom p-4 shadow-lg border-0 text-center">
				<h2 class="mb-4"><i class="fa fa-gamepad text-primary"></i> Gaming Hub Dashboard</h2>
				<p class="lead">Welcome to your gaming dashboard! Here you can see your profile, latest games, and community stats.</p>
				<hr>
				<div class="row">
					<div class="col-md-4 mb-3">
						<div class="p-3 bg-light rounded">
							<h5><i class="fa fa-user"></i> Profile</h5>
							<p>Username: <strong>Player1</strong></p>
							<p>Level: <strong>Beginner</strong></p>
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<div class="p-3 bg-light rounded">
							<h5><i class="fa fa-gamepad"></i> Latest Game</h5>
							<p>Game: <strong>Space Invaders</strong></p>
							<p>Score: <strong>1200</strong></p>
						</div>
					</div>
					<div class="col-md-4 mb-3">
						<div class="p-3 bg-light rounded">
							<h5><i class="fa fa-users"></i> Community</h5>
							<p>Players Online: <strong>15</strong></p>
							<p>Top Player: <strong>GamerX</strong></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>';
$ObjLayout->footer($conf);
