<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Online hostel management system</title>
        <link rel="stylesheet" href="<?php echo base_url()?>public/css/invoicePdfstyle.css" media="all" />
        <!--bootstrap -->
        <link href="<?php echo base_url()?>public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>public/js/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div id="header" class="clearfix">
            <div  id="logo">
                <h3 class="name">Payment Report</h3>
            </div>
            <div id="company">
                <h4 class="name">Online hostel management system</h4>
                <div>Hotline: +88017xxxxxxxx</div>
            </div>
        </div>

        <main>

            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="desc">Member Name</th>
                        <th class="desc">Seat Rent</th>
                        <th class="desc">Meal Cost</th>
                        <th class="desc">Other</th>
                        <th class="desc">Payment for</th>
                        <th class="total">Total Payable</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $i=1;
                        foreach($all_payment as $payment) { ?>
                            <tr>
                                <td class="no"><?php echo $i++; ?></td>
                                <td class="desc"><h3> <?php echo $payment->first_name.' '.$payment->last_name; ?></h3></td>
                                <td class="desc">BDT <?php echo $payment->seat_rent;?></td>
                                <td class="desc">BDT <?php echo $payment->meal_cost;?></td>
                                <td class="desc">BDT <?php echo $payment->other_cost;?></td>
                                <td class="desc">BDT <?php echo $payment->payment_for;?></td>
                                <td class="total">BDT <?php echo $payment->total_payment; ?></td>
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