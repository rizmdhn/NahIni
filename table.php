<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>NAHINI Warehouse</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet" />

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Warehouse</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Warehouse Stocks</div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>C1</th>
                                        <th>C2</th>
                                        <th>C3</th>
                                        <th>C4</th>
                                        <th>C5</th>
                                        <th>C6</th>
                                        <th>C7</th>
                                        <th>C8</th>
                                        <th>C9</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $datas = mysqli_query($conn, "select * from hasil 
                                    LEFT JOIN user ON hasil.user_id=user.user_id");
                                    if (!$datas) {
                                        printf("Error: %s\n", mysqli_error($conn));
                                    }
                                    while ($d = mysqli_fetch_array($datas)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $d['nama']; ?></td>
                                            <?php
                                            $data = json_decode($d['array_jawaban']);
                                            foreach ($data as $dat) {
                                                echo "<td>" . $dat . "</td>";
                                            }

                                            ?>

                                        </tr>
                                </tbody>
                            <?php
                                    }
                            ?>
                            </table>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Hasil ID</th>
                                        <th>Nama</th>
                                        <th>Hasil VI</th>
                                        <th>Status</th>
                                        <th>Jawaban</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'koneksi.php';
                                    $no = 1;
                                    $sql = "Select hasil.hasilid, hasil.userid, hasil.hasil,hasil.array_jawaban,hasil.vi, user.nama from hasil LEFT JOIN user ON hasil.user_id = user.user_id";
                                    $data = mysqli_query($conn, "select * from hasil 
                                    LEFT JOIN user ON hasil.user_id=user.user_id");
                                    if (!$data) {
                                        printf("Error: %s\n", mysqli_error($conn));
                                    }
                                    while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>

                                            <td><?php echo $d['hasil_id']; ?></td>
                                            <td><?php echo $d['nama']; ?></td>
                                            <td><?php echo $d['Vi']; ?></td>
                                            <td><?php echo $d['hasil']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" onclick="">Terima</button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="">Tolak</button>
                                            </td>
                                        </tr>
                                </tbody>
                            <?php
                                    }
                            ?>
                            </table>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</body>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- DataTables JavaScript -->
<script src="js/dataTables/jquery.dataTables.min.js"></script>
<script src="js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</html>