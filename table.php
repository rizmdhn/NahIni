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
                            <h3>Data</h3>
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
                                        echo '<tr>';
                                        echo '<td>' . $no++ . '</td>';
                                        echo '<td>' . $d['nama'] . '</td>';
                                        $data = json_decode($d['array_jawaban']);
                                        foreach ($data as $dat) {
                                            echo '<td>' . $dat . '</td>';
                                        }
                                    }
                                    ?>
                                    </tr>
                                </tbody>
                            </table>

                            <table class="table table-striped table-bordered">
                                <h3>Tabel Ternormalisasi</h3>
                                <thead>
                                    <tr>
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
                                    $c1 = array();
                                    $c2 = array();
                                    $c3 = array();
                                    $c4 = array();
                                    $c5 = array();
                                    $c6 = array();
                                    $c7 = array();
                                    $c8 = array();
                                    $c9 = array();
                                    $datas = mysqli_query($conn, "select * from hasil 
                                    LEFT JOIN user ON hasil.user_id=user.user_id");
                                    if (!$datas) {
                                        printf("Error: %s\n", mysqli_error($conn));
                                    }
                                    while ($d = mysqli_fetch_array($datas)) {
                                        $data = json_decode($d['array_jawaban']);
                                        array_push($c1, $data[0]);
                                        array_push($c2, $data[1]);
                                        array_push($c3, $data[2]);
                                        array_push($c4, $data[3]);
                                        array_push($c5, $data[4]);
                                        array_push($c6, $data[5]);
                                        array_push($c7, $data[6]);
                                        array_push($c8, $data[7]);
                                        array_push($c9, $data[8]);
                                    }
                                    // perhitungan normalisasi
                                    echo '<tr>';
                                    $hasil1 = 0;
                                    $hasil2 = 0;
                                    $hasil3 = 0;
                                    $hasil4 = 0;
                                    $hasil5 = 0;
                                    $hasil6 = 0;
                                    $hasil7 = 0;
                                    $hasil8 = 0;
                                    $hasil9 = 0;
                                    foreach ($c1 as $num) {
                                        $hasil1 += $num * $num;
                                    }
                                    foreach ($c2 as $num) {
                                        $hasil2 += $num * $num;
                                    }
                                    foreach ($c3 as $num) {
                                        $hasil3 += $num * $num;
                                    }
                                    foreach ($c4 as $num) {
                                        $hasil4 += $num * $num;
                                    }
                                    foreach ($c5 as $num) {
                                        $hasil5 += $num * $num;
                                    }
                                    foreach ($c6 as $num) {
                                        $hasil6 += $num * $num;
                                    }
                                    foreach ($c7 as $num) {
                                        $hasil7 += $num * $num;
                                    }
                                    foreach ($c8 as $num) {
                                        $hasil8 += $num * $num;
                                    }
                                    foreach ($c9 as $num) {
                                        $hasil9 += $num * $num;
                                    }
                                    for ($x = 0; $x < sizeof($c1); $x++) {

                                        $x1 = $c1[$x] / sqrt($hasil1);
                                        $x2 = $c2[$x] / sqrt($hasil2);
                                        $x3 = $c3[$x] / sqrt($hasil3);
                                        $x4 = $c4[$x] / sqrt($hasil4);
                                        $x5 = $c5[$x] / sqrt($hasil5);
                                        $x6 = $c6[$x] / sqrt($hasil6);
                                        $x7 = $c7[$x] / sqrt($hasil7);
                                        $x8 = $c8[$x] / sqrt($hasil8);
                                        $x9 = $c9[$x] / sqrt($hasil9);
                                        echo '<td>' . round($x1, 4) . '</td>';
                                        echo '<td>' . round($x2, 4) . '</td>';
                                        echo '<td>' . round($x3, 4) . '</td>';
                                        echo '<td>' . round($x4, 4) . '</td>';
                                        echo '<td>' . round($x5, 4) . '</td>';
                                        echo '<td>' . round($x6, 4) . '</td>';
                                        echo '<td>' . round($x7, 4) . '</td>';
                                        echo '<td>' . round($x8, 4) . '</td>';
                                        echo '<td>' . round($x9, 4) . '</td>';
                                        echo '</tr>';
                                        $x1 = 0;
                                        $x2 = 0;
                                        $x3 = 0;
                                        $x4 = 0;
                                        $x5 = 0;
                                        $x6 = 0;
                                        $x7 = 0;
                                        $x8 = 0;
                                        $x9 = 0;
                                    }
                                    ?>
                                </tbody>
                            </table>

                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
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
                                    $c1 = array();
                                    $c2 = array();
                                    $c3 = array();
                                    $c4 = array();
                                    $c5 = array();
                                    $c6 = array();
                                    $c7 = array();
                                    $c8 = array();
                                    $c9 = array();
                                    $datas = mysqli_query($conn, "select * from hasil 
                                    LEFT JOIN user ON hasil.user_id=user.user_id");
                                    if (!$datas) {
                                        printf("Error: %s\n", mysqli_error($conn));
                                    }
                                    while ($d = mysqli_fetch_array($datas)) {
                                        $data = json_decode($d['array_jawaban']);

                                        array_push($c1, $data[0]);
                                        array_push($c2, $data[1]);
                                        array_push($c3, $data[2]);
                                        array_push($c4, $data[3]);
                                        array_push($c5, $data[4]);
                                        array_push($c6, $data[5]);
                                        array_push($c7, $data[6]);
                                        array_push($c8, $data[7]);
                                        array_push($c9, $data[8]);
                                    }
                                    // perhitungan normalisasi
                                    echo '<tr>';
                                    $hasil1 = 0;
                                    $hasil2 = 0;
                                    $hasil3 = 0;
                                    $hasil4 = 0;
                                    $hasil5 = 0;
                                    $hasil6 = 0;
                                    $hasil7 = 0;
                                    $hasil8 = 0;
                                    $hasil9 = 0;
                                    foreach ($c1 as $num) {
                                        $hasil1 += $num * $num;
                                    }
                                    foreach ($c2 as $num) {
                                        $hasil2 += $num * $num;
                                    }
                                    foreach ($c3 as $num) {
                                        $hasil3 += $num * $num;
                                    }
                                    foreach ($c4 as $num) {
                                        $hasil4 += $num * $num;
                                    }
                                    foreach ($c5 as $num) {
                                        $hasil5 += $num * $num;
                                    }
                                    foreach ($c6 as $num) {
                                        $hasil6 += $num * $num;
                                    }
                                    foreach ($c7 as $num) {
                                        $hasil7 += $num * $num;
                                    }
                                    foreach ($c8 as $num) {
                                        $hasil8 += $num * $num;
                                    }
                                    foreach ($c9 as $num) {
                                        $hasil9 += $num * $num;
                                    }
                                    for ($x = 0; $x < sizeof($c1); $x++) {

                                        $x1 = $c1[$x] / sqrt($hasil1);
                                        $x2 = $c2[$x] / sqrt($hasil2);
                                        $x3 = $c3[$x] / sqrt($hasil3);
                                        $x4 = $c4[$x] / sqrt($hasil4);
                                        $x5 = $c5[$x] / sqrt($hasil5);
                                        $x6 = $c6[$x] / sqrt($hasil6);
                                        $x7 = $c7[$x] / sqrt($hasil7);
                                        $x8 = $c8[$x] / sqrt($hasil8);
                                        $x9 = $c9[$x] / sqrt($hasil9);
                                        echo '<td>' . round($x1, 4) * 0.1333 . '</td>';
                                        echo '<td>' . round($x2, 4) * 0.1333 . '</td>';
                                        echo '<td>' . round($x3, 4) * 0.1 . '</td>';
                                        echo '<td>' . round($x4, 4) * 0.1333 . '</td>';
                                        echo '<td>' . round($x5, 4) * 0.1 . '</td>';
                                        echo '<td>' . round($x6, 4) * 0.1 . '</td>';
                                        echo '<td>' . round($x7, 4) * 0.1 . '</td>';
                                        echo '<td>' . round($x8, 4) * 0.1 . '</td>';
                                        echo '<td>' . round($x9, 4) * 0.1 . '</td>';
                                        echo '</tr>';
                                        $x1 = 0;
                                        $x2 = 0;
                                        $x3  = 0;
                                        $x4 = 0;
                                        $x5 = 0;
                                        $x6 = 0;
                                        $x7 = 0;
                                        $x8 = 0;
                                        $x9 = 0;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- <table class="table table-striped table-bordered">
                                <h3>Tabel A+ & A-</h3>
                                <thead>
                                    <tr>
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
                                    $c1 = array();
                                    $c2 = array();
                                    $c3 = array();
                                    $c4 = array();
                                    $c5 = array();
                                    $c6 = array();
                                    $c7 = array();
                                    $c8 = array();
                                    $c9 = array();
                                    $datas = mysqli_query($conn, "select * from hasil 
                                    LEFT JOIN user ON hasil.user_id=user.user_id");
                                    if (!$datas) {
                                        printf("Error: %s\n", mysqli_error($conn));
                                    }
                                    while ($d = mysqli_fetch_array($datas)) {
                                        $data = json_decode($d['array_jawaban']);
                                        array_push($c1, $data[0]);
                                        array_push($c2, $data[1]);
                                        array_push($c3, $data[2]);
                                        array_push($c4, $data[3]);
                                        array_push($c5, $data[4]);
                                        array_push($c6, $data[5]);
                                        array_push($c7, $data[6]);
                                        array_push($c8, $data[7]);
                                        array_push($c9, $data[8]);
                                    }
                                    // perhitungan normalisasi
                                    echo '<tr>';
                                    $hasil1 = 0;
                                    $hasil2 = 0;
                                    $hasil3 = 0;
                                    $hasil4 = 0;
                                    $hasil5 = 0;
                                    $hasil6 = 0;
                                    $hasil7 = 0;
                                    $hasil8 = 0;
                                    $hasil9 = 0;
                                    foreach ($c1 as $num) {
                                        $hasil1 += $num * $num;
                                    }
                                    foreach ($c2 as $num) {
                                        $hasil2 += $num * $num;
                                    }
                                    foreach ($c3 as $num) {
                                        $hasil3 += $num * $num;
                                    }
                                    foreach ($c4 as $num) {
                                        $hasil4 += $num * $num;
                                    }
                                    foreach ($c5 as $num) {
                                        $hasil5 += $num * $num;
                                    }
                                    foreach ($c6 as $num) {
                                        $hasil6 += $num * $num;
                                    }
                                    foreach ($c7 as $num) {
                                        $hasil7 += $num * $num;
                                    }
                                    foreach ($c8 as $num) {
                                        $hasil8 += $num * $num;
                                    }
                                    foreach ($c9 as $num) {
                                        $hasil9 += $num * $num;
                                    }
                                    for ($x = 0; $x < sizeof($c1); $x++) {

                                        $x1 = $c1[$x] / sqrt($hasil1);
                                        $x2 = $c2[$x] / sqrt($hasil2);
                                        $x3 = $c3[$x] / sqrt($hasil3);
                                        $x4 = $c4[$x] / sqrt($hasil4);
                                        $x5 = $c5[$x] / sqrt($hasil5);
                                        $x6 = $c6[$x] / sqrt($hasil6);
                                        $x7 = $c7[$x] / sqrt($hasil7);
                                        $x8 = $c8[$x] / sqrt($hasil8);
                                        $x9 = $c9[$x] / sqrt($hasil9);
                                        echo '<td>' . round($x1, 4) * 5 . '</td>';
                                        echo '<td>' . round($x2, 4) * 5 . '</td>';
                                        echo '<td>' . round($x3, 4) * 3 . '</td>';
                                        echo '<td>' . round($x4, 4) * 5 . '</td>';
                                        echo '<td>' . round($x5, 4) * 3 . '</td>';
                                        echo '<td>' . round($x6, 4) * 3 . '</td>';
                                        echo '<td>' . round($x7, 4) * 3 . '</td>';
                                        echo '<td>' . round($x8, 4) * 3 . '</td>';
                                        echo '<td>' . round($x9, 4) * 3 . '</td>';
                                        echo '</tr>';
                                        $x1 = 0;
                                        $x2 = 0;
                                        $x3 = 0;
                                        $x4 = 0;
                                        $x5 = 0;
                                        $x6 = 0;
                                        $x7 = 0;
                                        $x8 = 0;
                                        $x9 = 0;
                                    }
                                    ?>
                                </tbody>
                                </table> -->


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