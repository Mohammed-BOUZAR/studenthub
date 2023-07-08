@include('admin.include.header')

<?php
$db_username = 'root';
$db_password = '';
$db_name = 'studenthub';
$db_host = 'localhost';
($sql_con = mysqli_connect($db_host, $db_username, $db_password, $db_name)) or die('could not connect to database');
?>

<!-- partial -->

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row purchace-popup">
            <div class="col-12">
                <span class="d-block d-md-flex align-items-center">
                    <p class="text-muted"><i class="fas fa-university bred-icons"></i> <span class="bred-line">/</span>
                        Manage Department</p>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel2">
                    <div class="table-responsive">
                        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0"
                            width="100%">
                            <thead>
                                <tr>
                                    <th class="th-sm">ID
                                    </th>
                                    <th class="th-sm">Department
                                    </th>
                                    <th class="th-sm">Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                        $data = mysqli_query($sql_con,"select *from departments");
                        if (!$data) {
                                    die('Query error: ' . mysqli_error($sql_con));
                                }
                        while ($row = mysqli_fetch_array($data)) {
                          
                         ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['depname']; ?></td>
                                    <td>
                                        <a href="update_department/<?php echo $row['id']; ?>"
                                            class="btn btn-outline-primary btn-rounded"><i class="fa fa-edit"></i></a>
                                        <a href="" data-toggle="modal"
                                            data-target="#exampleModaldep<?php echo $row['id']; ?>"
                                            class="btn btn-outline-danger btn-rounded"><i class="fa fa-trash"></i></a>


                                        <!-- MODEL -->
                                        <div class="modal fade" id="exampleModaldep<?php echo $row['id']; ?>" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Department
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you really want to delete department?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="delete_department/<?php echo $row['id']; ?>"
                                                            class="btn btn-outline-primary btn-rounded">YES</a>
                                                        <button type="button"
                                                            class="btn btn-outline-danger btn-rounded"
                                                            data-dismiss="modal">NO</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

        @include('admin.include.footer');

        <script type="text/javascript">
            $(document).ready(function() {
                $('#dtBasicExample').DataTable();
                $('.dataTables_length').addClass('bs-select');
            });
        </script>
        </body>

        </html>
