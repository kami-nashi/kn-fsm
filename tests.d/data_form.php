

<form action="resourcemain.php" method="post">
                        Date: <input type="text" name="resname" id="res"/><br>
                        Ice Time: <input type="text" name="ppi" id="price"/><br>
                        Ice Cost: <select name="resadd">
                        Coach Time:
                        Coach Name:

                        <?php
                        $con=mysqli_connect("localhost","root","","vendor") or die("Unable to connect");
                        $query = mysqli_query($con,"select venname from vendoradd");
                        while ($row=$query->fetch_assoc()){
                        echo "<option value=".$row['venname'].">".$row['venname']."</option>";
                        }
                        ?>

                        </select>
                        <center><input type="submit" value="ADD" id="ares">
                        <input type="reset" value="ADD MORE RESOURCE" id="more"></center>
                    </form>