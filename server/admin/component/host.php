<?php
require_once "../../../modules/config.php";
require_once "../lib/private/head.php";
require_once "../lib/private/nav.php";
?>

<script type="text/javascript">
    bkLib.onDomLoaded(function() {
        new nicEditor({
            maxHeight: 200
        }).panelInstance('content_tours');
    });
</script>

<section class="col-lg-12 connectedSortable">
    <div class="card card-primary card-outline">
        <div class="card-header ">
            <h3 class="card-title">
                <i class="fas fa-history mr-1"></i>
                ĐĂNG GÓI HOSTING
            </h3>
            <div class="card-tools">
                <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn bg-warning btn-sm" data-card-widget="maximize"><i class="fas fa-expand"></i>
                </button>
                <button type="button" class="btn bg-danger btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Nội dung</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Tên">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Gói</label>
                                <input type="text" class="form-control" id="package" name="package" placeholder="vd: AA1">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá</label>
                                <input type="text" class="form-control" id="price" name="price" placeholder="Giá">
                            </div>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Nội dung</h3>
                        </div>
                        <div class="card-body">
                            <textarea name="content" id="content" style="width:100%;height:200px;">
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button id="post_host" name="post_host" type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
    <?php require_once "../controller/hosting.php"; ?>
    </div>
</section>

<?php
require_once "../lib/private/foot.php";
?>