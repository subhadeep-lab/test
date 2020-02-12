<?php
                    $connection = mysqli_connect("localhost","root","","phpcurd");
                    $query = "SELECT * FROM category_details";
                    $query_run = mysqli_query($connection,$query);
                    $number = 1;
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                        $id =$row['id'];
                        $itemname = $row['Itemname'];
                        $colour = $row['colour'];
                        echo "<tr>";
                        echo "<td>$number</td>";
                        echo "<td>$itemname</td>";
                        echo "<td>$colour</td>";
                        echo"<td><button onclick='GetUserDetails(".$row['id'].")' class='btn btn-success'>Edit</button></td>";
                        echo"<td><button onclick='DeleteUser(".$row['id'].")' class='btn btn-danger'>Delete</button></td>";
                        echo "</tr>";
                        $number++;
                    }
                ?>