<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?= $title; ?></title>
        <link rel="stylesheet" href="<?php echo base_url()?>public/css/invoicePdfstyle.css" media="all" />
        <!--bootstrap -->
        <link href="<?php echo base_url()?>public/js/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url()?>public/js/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    </head>

    <style type="text/css">
        thead tr th{
            background: #000;
            color: #fff;
        }
    </style>

    <body>
        <div id="header" class="clearfix">
            <div  id="logo">
                <img src="<?php echo base_url('assets/frontend/logo.png');?>">
                <h3 class="name">Report of <?= $get_member->first_name.' '.$get_member->last_name; ?></h3>
                <div>Registration No: <?= $get_member->reg_no; ?></div>
                <div>Mobile: <?= $get_member->mobile; ?></div>
                <div>Registration Date: <?= $get_member->created_datetime; ?></div>
            </div>
            <div id="company">
                
            </div>
        </div>

        <main>
            <p style="background-color: #e55932; color: #fff; text-align: center; padding: 10px;">Membership Fees Record</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="desc">Payment Date</th>
                        <th class="desc">Total Payable</th>
                        <th class="desc">Total Paid</th>
                        <th class="desc">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(!empty($get_memberFees)){ ?>

                            <tr>
                                <td class="no">1</td>
                                <td class="desc">
                                    <?php echo $get_memberFees->payment_date; ?>
                                </td>
                                <td class="desc">
                                    BDT <?php echo $get_memberFees->total_fees; ?>
                                </td>
                                <td class="desc">
                                    BDT <?php echo $get_memberFees->total_paid; ?>
                                </td>
                                <td class="desc">
                                    <?php SelectedStatus($get_memberFees->status); ?>
                                </td>
                                
                                <!-- <td class="desc">
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
                                </td> -->
                            </tr>

                       <?php }else{?>
                            
                             <tr>
                                <td colspan="5">No Data Found</td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>

            <p style="background-color: #e55932; color: #fff; text-align: center; padding: 10px;">Monthly Membership Subscription Fees Record</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="desc">Payment Date</th>
                        <th class="desc">Month</th>
                        <th class="desc">Total Paid</th>
                        <th class="desc">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(!empty($get_memberSubscription)){ ?>
                            <tr>
                                <td class="no">1</td>
                                <td class="desc">
                                    <?php echo $get_memberSubscription->payment_date; ?>
                                </td>
                                <td class="desc">
                                    <?php SelectedMonth($get_memberSubscription->month); ?>
                                </td>
                                <td class="desc">
                                    BDT <?php echo $get_memberSubscription->total_paid; ?>
                                </td>
                                <td class="desc">
                                    <?php SelectedStatus($get_memberSubscription->status); ?>
                                </td>
                            </tr>
                        <?php }else{?>
                            
                             <tr>
                                <td colspan="5">No Data Found</td>
                            </tr>
                        <?php } ?>
                </tbody>
            </table>

            <p style="background-color: #e55932; color: #fff; text-align: center; padding: 10px;">Exam Fees Record</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="desc">Payment Date</th>
                        <th class="desc">Registration No</th>
                        <th class="desc">Total Payable</th>
                        <th class="desc">Total Paid</th>
                        <th class="desc">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(!empty($get_memberExamFee)){ ?>
                            <tr>
                                <td class="no">1</td>
                                <td class="desc">
                                    <?php echo $get_memberExamFee->date; ?>
                                </td>
                                <td class="desc">
                                    <?php echo $get_memberExamFee->reg_no; ?>
                                </td>
                                <td class="desc">
                                    BDT <?php echo $get_memberExamFee->total_amount; ?>
                                </td>
                                <td class="desc">
                                    BDT <?php echo $get_memberExamFee->exam_fees; ?>
                                </td>
                                <td class="desc">
                                    <?php
                                        $Total = $get_memberExamFee->total_amount - $get_memberExamFee->exam_fees;
                                        if($get_memberExamFee->total_amount > $get_memberExamFee->exam_fees){
                                            echo "<p style='color:#ff0000;font-weight:bold;'>"."NOT PAID"."</p>";
                                        }elseif($get_memberExamFee->total_amount < $get_memberExamFee->exam_fees){
                                            echo "<p style='color:green;font-weight:bold;'>"."PAID"."</p>";
                                        }
                                    ?>
                                </td>
                            </tr>

                    <?php }else{?>
                            
                        <tr>
                            <td colspan="5">No Data Found</td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>

            <p style="background-color: #e55932; color: #fff; text-align: center; padding: 10px;">Learner Card Payment Record</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="desc">Payment Date</th>
                        <th class="desc">Registration No</th>
                        <th class="desc">Total Payable</th>
                        <th class="desc">Total Paid</th>
                        <th class="desc">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(!empty($get_memberLearnerCardFee)){ ?>
                            <tr>
                                <td class="no">1</td>
                                <td class="desc">
                                    <?php echo $get_memberLearnerCardFee->payment_date; ?>
                                </td>
                                <td class="desc">
                                    <?php echo $get_memberLearnerCardFee->reg_no; ?>
                                </td>
                                <td class="desc">
                                    BDT <?php echo $get_memberLearnerCardFee->total_amount; ?>
                                </td>
                                <td class="desc">
                                    BDT <?php echo $get_memberLearnerCardFee->total_paid; ?>
                                </td>
                                <td class="desc">
                                    <?php SelectedStatus($get_memberLearnerCardFee->status); ?>
                                </td>
                            </tr>
                    <?php }else{?>
                            
                        <tr>
                            <td colspan="5">No Data Found</td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
            <br><br><br>

            <p style="background-color: #e55932; color: #fff; text-align: center; padding: 10px;">Training Payment Record</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th class="no">#</th>
                        <th class="desc">Payment Date</th>
                        <th class="desc">Registration No</th>
                        <th class="desc">Total Payable</th>
                        <th class="desc">Total Paid</th>
                        <th class="desc">Have/Give</th>
                        <th class="desc">Status</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if(!empty($get_memberTrainingFee)){ ?>
                            <tr>
                                <td class="no">1</td>
                                <td class="desc">
                                    <?php echo $get_memberTrainingFee->payment_date; ?>
                                </td>
                                <td class="desc">
                                    <?php echo $get_memberTrainingFee->reg_no; ?>
                                </td>
                                <td class="desc">
                                    BDT <?php echo $get_memberTrainingFee->total_amount; ?>
                                </td>
                                <td class="desc">
                                    BDT <?php echo $get_memberTrainingFee->total_paid; ?>
                                </td>
                                <td class="desc">
                                    <?php
                                        $Rst = $get_memberTrainingFee->total_amount - $get_memberTrainingFee->total_paid;
                                        if($get_memberTrainingFee->total_amount > $get_memberTrainingFee->total_paid){
                                            echo "BDT ".$Rst." Due";
                                        }elseif ($get_memberTrainingFee->total_amount < $get_memberTrainingFee->total_paid) {
                                            echo "BDT ".$Rst." will have";
                                        }
                                    ?>
                                </td>
                                <td class="desc">
                                    <?php
                                        if($get_memberTrainingFee->total_amount >= $get_memberTrainingFee->total_paid){
                                            echo "<p style='color:#ff0000;font-weight:bold;'>"."NOT PAID"."</p>";

                                        }else if($get_memberTrainingFee->total_amount <= $get_memberTrainingFee->total_paid){
                                            echo "<p style='color:green;font-weight:bold;'>"."PAID"."</p>";
                                        }
                                    ?>
                                </td>
                            </tr>
                    <?php }else{?>
                            
                        <tr>
                            <td colspan="5">No Data Found</td>
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