</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/jquery/jquery.validate.min.js"></script>
<script src="js/ajax.js"></script>
<script src="data/validate.js"></script>
<script src="vendor/jquery/jquery-ui.min.js"></script>
<script src="vendor/jquery/jquery.timepicker.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="vendor/raphael/raphael.min.js"></script>
<script src="vendor/morrisjs/morris.min.js"></script>
<script src="data/morris-data.js"></script>

<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>

<!-- Custom Theme JavaScript -->
<script src="dist/js/sb-admin-2.js"></script>

<script>
    $(document).ready(function () {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });

    $(function () {
        $("#datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            yearRange: "-50:+0"
        });
    });

    $(function () {
        $("#datepicker2").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "yy-mm-dd",
            yearRange: "-50:+0"
        });
    });

    $(function () {
        $('#basicExample').timepicker();
    });

    $(function () {
        $("#btnSubmit").click(function () {
            var password = $("#txtPassword").val();
            var confirmPassword = $("#txtConfirmPassword").val();

            if (password != confirmPassword) {
                alert("Password do not match");
                return false;
            }
            return true;
        });
    });

    function printContent(el) {
        var restorePage = document.body.innerHTML;
        var printContent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = restorePage;
    }

    $(function () {
        //expense invoice validation
        $("#expenseInvoiceForm").validate({
            rules: {
                invoice_no: "required",
                date: "required",
                expense_category: "required",
                description: "required",
                amount: "required"
            },
            messages: {}
        });
    });
</script>
<!--<body oncontextmenu="return false"></body>-->
<script>
    //calculate due price
    /*
    $('.price').keyup(function () {
        var price = 0;
        $('.price').each(function () {
            var totalPrice = $('.total').val();
            var payPrice = $('.pay').val();

            price = totalPrice - payPrice;
        });
        $('.due_price').val(price);
    });
    */
    function dueCalculation() {
        var pay = document.getElementsByClassName('pay')[0].value;

        var total = document.getElementsByClassName('total')[0].value;
        var due=(total-pay);
        document.getElementsByClassName('due_price')[0].value=due;
    }

    var pay=document.getElementsByClassName('pay')[0];
    pay.addEventListener("change",dueCalculation,false);
</script>
</body>

</html>