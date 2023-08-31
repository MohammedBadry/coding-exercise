<html>
	<head>
		<title>All Users</title>
		<link rel="stylesheet" href="/<?=BASE_URL;?>/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="/<?=BASE_URL;?>/assets/css/dashlite.css?ver=2.9.1">
		<link id="skin-default" rel="stylesheet" href="/<?=BASE_URL;?>/assets/css/theme.css?ver=2.9.1">
	</head>
	<body>
		<div class="nk-app-root">
			<!-- main @s -->
			<div class="nk-main ">
				<!-- wrap @s -->
				<div class="nk-wrap ">
					<!-- content @s -->
					<div class="nk-content ">
						<div class="container-fluid">
							<div class="nk-content-inner">
								<div class="nk-content-body">
									<div class="components-preview wide-md mx-auto">
										<div class="nk-block-head nk-block-head-lg wide-sm">
											<div class="nk-block-head-content">
												<h2 class="nk-block-title fw-normal">All Users</h2>
												<a href="/<?=BASE_URL;?>">Home Page</a>
											</div>
										</div><!-- .nk-block-head -->
										<div class="nk-block nk-block-lg">
											<div class="card card-preview">
												<div class="card-inner">
	                                                <div class="table-responsive">
														<table class="table">
															<thead>
																<tr>
																	<th scope="col">ID</th>
																	<th scope="col">First Name</th>
																	<th scope="col">Last Name</th>
																	<th scope="col">Image</th>
																	<th scope="col">Delete</th>
																</tr>
															</thead>
															<tbody>
																<?php 
																	foreach ($users as $user)
																	{
																		echo '<tr>
																			<td>'.$user['id'].'</td>
																			<td>'.$user['first_name'].'</td>
																			<td>'.$user['last_name'].'</td>
																			<td><img src="'.$user['image'].'" width="100" height="100"></td>
																			<td>
																				<form method="post" action="/'.BASE_URL.'/?act=delete-user">
																					<input type="hidden" name="id" value="'.$user['id'].'">
																					<button type="submit" class="btn btn-danger">Delete</button>
																				</form>
																			</td>
																		</tr>';
																	}
																?>
															</tbody>
														</table>
													</div>
												</div>
											</div><!-- .card-preview -->
										</div><!-- .nk-block -->
									</div><!-- .components-preview -->
								</div>
							</div>
						</div>
					</div>
					<!-- content @e -->
				</div>
				<!-- wrap @e -->
			</div>
			<!-- main @e -->
		</div>

	</body>
</html>
