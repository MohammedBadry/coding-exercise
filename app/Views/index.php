<!DOCTYPE html>
<html>
	<head>
		<title>Native PHP Example</title>
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
                                            <h2 class="nk-block-title fw-normal">Add Users</h2>
                                            <a href="/<?=BASE_URL;?>?act=all-users">Show Users</a>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-preview">
											<div class="example-alert">
												<div class="alert alert-success alert-icon alert-dismissible" style="display: none;"></div>
												<div class="alert alert-danger alert-icon alert-dismissible" style="display: none;"></div>
											</div>
                                            <div class="card-inner">
												<form method="post" id="user_form" enctype="multipart/form-data">
                                                <div class="preview-block">
                                                    <div class="row gy-4">
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="first_name">First Name</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="text" name="first_name" class="form-control" id="first_name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="form-label" for="last_name">Last Name</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="text" name="last_name" class="form-control" id="last_name" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label class="form-label">Image</label>
                                                                <div class="form-control-wrap">
                                                                    <div class="custom-file">
                                                                        <input type="file" name="image" class="custom-file-input" id="image" required>
                                                                        <label class="custom-file-label" for="image">Choose file</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
													</div>
                                                    <div class="preview" style="display: none;"></div>
                                                    <div class="row gy-4">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
																<button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												</form>
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

    <script src="/<?=BASE_URL;?>/assets/js/jquery.min.js"></script>    

    <script>
        $(document).ready(function (e) {
            $("#user_form").on('submit',(function(e) {
                e.preventDefault();
                var image = $('input[name="image"]').get(0).files[0];
                var formData = new FormData();
                formData.append('image', image);
                formData.append('first_name', $('#first_name').val());
                formData.append('last_name', $('#last_name').val());

                $.ajax({
                    type: "POST",
                    url: "/<?=BASE_URL;?>/?act=save-user",
                    data: formData,
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(data) {
                        if(data.status=='error') {
                            $(".alert-danger").html(data.message).fadeIn();
                        } else {
                            // view uploaded file.
                            $(".preview").html(data.image).fadeIn();
                            $(".alert-success").html(data.message).fadeIn();
                            $("#user_form")[0].reset(); 
                        }
                    }
                });

            }));
        });
    </script>
</body>

</html>