			<?php
			include'inc/user.php';
			$db=new user();
			?>
			<?php
         		if(!isset($_GET['delid']) || $_GET['delid']==NULL)
                    {
                        echo "<script>window.location = 'index.php';</script>";   
                    }
                    else
                    {
                        $id = $_GET['delid'];
                        $sql = "select * from tbl_pdf where id = '$id'";
                        $result = $db->select($sql);
                        if($result)
                        {
                            while($delimg = $result->fetch_assoc())
                            {
                                $delin = $delimg['pdf_folder'];
                                unlink($delin);
                            }
                        }
                        $delsql = "delete  from tbl_pdf where id = '$id'";
                        $delresult = $db->delete($delsql);
                        if($delresult)
                        {
                            echo "<script>alert('Data deleted successfully');</script>";
                            echo "<script>window.location = 'index.php';</script>";
                        }
                        else
                        {
                            echo "<script>alert('Data not deleted successfully');</script>";
                            echo "<script>window.location = 'index.php';</script>";

                        }
                    }
                    ?>
