<?php
include "../../function/koneksi.php";

$ambil = mysqli_query($dbh,"select no_idn,nama,email,telp_p,telp_k from pendana where stat=0");
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from preview.freewebtemplatesdownload.com/syntra/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 03:15:44 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Mannat Themes">
        <meta name="keyword" content="">

        <title>Pinjam Aja | P2P Lending</title>

        <link rel="shortcut icon" href="../assets/images/favicon.png">

        <link href="../assets/plugins/morris-chart/morris.css" rel="stylesheet">
        <!-- Theme Css -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/css/slidebars.min.css" rel="stylesheet">
        <link href="../../assets/css/icons.css" rel="stylesheet">
        <link href="../../assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href="../../assets/css/style.css" rel="stylesheet">
		
		<link href="../../assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="../../assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body style="background-color:#F3F4F5;">
        	    <div class="container-fluid">
                    <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="card m-b-30">
                                    <div class="card-body table-responsive">
                                        <h5 class="header-title">Row Border Bottom Example</h5>
                                        <p class="text-muted">DataTables has most features enabled by default, so all you need to do to use it with your own ables is to call the construction function: <code>$().DataTable();</code> and border bottom.</p>
                                        <div class="">
                                            <table id="datatable2" class="table">
                                                <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Telp_Pribadi</th>
                                                    <th>Telp_Kantor</th>
                                                    <th>Accept</th>
                                                    <th>Detail</th>
                                                </tr>
                                                </thead>
													
                                                <tbody>
                                                    <?php
														while($ambil2=mysqli_fetch_row($ambil)) {
															echo "<tr>";
															echo "<td>".$ambil2[1]."</td>";
															echo "<td>".$ambil2[2]."</td>";
															echo "<td>".$ambil2[3]."</td>";
															echo "<td>".$ambil2[4]."</td>";
															echo "<td>Pre-Test</td>";
															echo "<td><button id=".$ambil2[0]."/".$ambil2[2]." onclick=aktiv_idn(this.id)>Accept</button></td>";
															echo "</tr>";
														}													
													?>
                                                </tbody>
                                            </table>
                                        </div>           
                                    </div>
                                </div>
                            </div>
                        </div>             
                    
                </div><!--end container-->
			
            
        
        <script src="../../assets/js/jquery-3.2.1.min.js"></script>
        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>
        <script src="../../assets/js/jquery-migrate.js"></script>
        <script src="../../assets/js/modernizr.min.js"></script>
        <script src="../../assets/js/jquery.slimscroll.min.js"></script>
        <script src="../../assets/js/slidebars.min.js"></script>

        <!--plugins js-->
        <script src="../../assets/plugins/counter/jquery.counterup.min.js"></script>
        <script src="../../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../../assets/plugins/sparkline-chart/jquery.sparkline.min.js"></script>
        <script src="../../assets/pages/jquery.sparkline.init.js"></script>

        <script src="../../assets/plugins/chart-js/Chart.bundle.js"></script>
        <script src="../../assets/plugins/morris-chart/raphael-min.js"></script>
        <script src="../../assets/plugins/morris-chart/morris.js"></script>
        <script src="../../assets/pages/dashboard-init.js"></script>

		<script src="../../assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="../../assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../../assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

		<script>
		function aktiv_idn(kode) {
				var a = kode.split("/");
				var answer = confirm ("Anda Yakin Ingin Mengaktivasi?");
				if(answer == true) {	
				$("#loading").show();
				scroll(0,0);
				
				var b = "../../Function/registIDN.php";
				
				$.post(b,{idv:a[0],emailv:a[1]},function(resp){
					
								var a = resp.split("-");
								
								if (a[0] == '0'){
									$("#loading").hide();
									alert("Aktivasi Gagal.");
								}else if (a[0] == '1'){
									$("#loading").hide();
									alert("Aktivasi Sukses. ID :"+a[1]);
								}else{
									$("#loading").hide();
									alert("Error: "+resp);
									//document.location='../index.php';
								}
					});
				}else{
					   alert("Proses Dibatalkan");
					}
			}
		</script>
		
        
        <script src="../../assets/js/jquery.app.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable(),
                $('#datatable2').DataTable();  
            } );
        </script>
        <!--app js-->
        <script src="../../assets/js/jquery.app.js"></script>
        <script>
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                delay: 100,
                time: 1200
                });
            });
        </script>
    </body>
</html>
