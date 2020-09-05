<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Leadership Organization of Training and United Society</title>
        <link rel="stylesheet" href="<?php echo base_url()?>public/css/invoicePdfstyle.css" media="all" />
        <!--bootstrap -->
        <link href="<?php echo base_url()?>public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>public/js/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="header" class="clearfix">
            <div  id="logo">
                <img src="<?php echo base_url('assets/frontend/logo.png');?>">
                <h3 class="name"><?= $member_report->first_name.' '.$member_report->last_name; ?> Training Payment Report</h3>
                <div>Hotline: +8801968-800524</div>
                <div><a href="mailto:info.lotusbd.org@gmail.com"> Email: info.lotusbd.org@gmail.com</a></div>
            </div>
            <div id="company">
                
            </div>
        </div>

        <main>

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="desc">Member Name</th>
                        <th class="desc">Payment Date</th>
                        <th class="desc">Paid</th>
                        <th class="desc">Paid & Payable</th>
                        <th class="desc">Account Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $i=1;
                        $totalPaid = 0;
                        foreach($selected_info as $val) {
                            $totalPaid = $totalPaid+$val->total_paid;
                            
                        ?>
                            <tr>
                                <td class="no"><?php echo $i++; ?></td>
                                <td class="desc"><h3> <?php echo $val->first_name.' '.$val->last_name; ?></h3></td>
                                <td class="desc">
                                    <?php echo $val->payment_date; ?>
                                </td>
                                <td class="desc">
                                    <b>Paid:</b>BDT <?php echo $val->total_paid; ?>
                                </td>
                                
                                <td class="desc">
                                    <b>Total Paid:</b> BDT <?php echo $totalPaid; ?><br>
                                    <b>Total Payable:</b> BDT <?php echo $val->total_amount; ?>
                                </td>
                                <td class="desc">
                                    <?php
                                        $Total = $val->total_amount - $totalPaid;
                                        if($val->total_amount > $totalPaid){
                                            echo "<h3>"."BDT ".$Total." Due"."</h3>"."<br>";
                                        }elseif($val->total_amount < $totalPaid){
                                            echo "<h3>"."BDT ".$Total." Will have"."</h3>"."<br>";
                                        }elseif($val->total_amount == $totalPaid){
                                            echo "<h3>"."FULL PAID"."</h3>";
                                        }
                                    ?>
                                    <?php
                                        $Total = $val->total_amount - $totalPaid;
                                        if($val->total_amount > $totalPaid){
                                            echo "<h3>"."NOT FULL PAID"."</h3>";
                                        }elseif($val->total_amount < $totalPaid){
                                            echo "<h3>"."PAID"."</h3>";
                                        }elseif($val->total_amount == $totalPaid){
                                            echo "<h3>"."PAID"."</h3>";
                                        }
                                    ?> 
                                </td>
                            </tr>
                     <?php } ?>
                </tbody>
            </table>
        </main>

        <footer>
            Report was created on a computer and is valid without the signature and seal.
        </footer>
    </body>
</html>