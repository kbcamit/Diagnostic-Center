<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Expense Report</h1>
    </div>
    <div class="col-lg-6">
        <!-- /.col-lg-12 -->
        <form action="report.php?source=view_expense_report" method="post"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">From Date</label>
                        <input type="text" value="<?php echo date("Y-m-d"); ?>" id="datepicker" class="form-control"
                               name="from_date">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">To Date</label>
                        <input type="text" value="<?php echo date("Y-m-d"); ?>" id="datepicker2" class="form-control"
                               name="to_date">
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit" value="View Report">
                </div>
            </div>
        </form>
    </div>
</div>