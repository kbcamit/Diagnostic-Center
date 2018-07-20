$(document).ready(function () {
    //category insert
    $("#message").hide();
    $("#categorySubmit").click(function () {
        var isValid = $("#categoryForm").valid();
        if (isValid) {
            $("#message").show();
            var category = $("#category_name").val();
            //alert(category);
            $.ajax({
                url: "ajax/categoryInsert.php",
                type: "POST",
                data: {category: category},
                cache: false,
                success: function (data) {
                    //alert(data);
                    $("#category_name").val("");
                    $("#message").html(data);
                }
            });
        }
        return false;
    });

    //update category
    $("#catMessage").hide();
    $("#editCategorySubmit").click(function () {
        $("#catMessage").show();
        var category = $("#editCatTextBox").val();
        var catId = $("#CatId").val();
        //alert(catId);
        $.ajax({
            url: "ajax/editCategory.php",
            type: "POST",
            data: {category: category, catId: catId},
            cache: false,
            success: function (data) {
                //alert(data);
                $("#catMessage").html(data);
            }
        });
        return false;
    });

    //expense insert
    $("#exMessage").hide();
    $("#expenseSubmit").click(function () {
        var isValid = $("#expenseForm").valid();
        if (isValid) {
            $("#exMessage").show();
            var expenseName = $("#expense_category_name").val();
            var expenseDesc = $("#expense_desc").val();
            $.ajax({
                url: "ajax/expenseInsert.php",
                type: "POST",
                data: {expenseName: expenseName, expenseDesc: expenseDesc},
                cache: false,
                success: function (data) {
                    //alert(data);
                    $("#expense_category_name").val("");
                    $("#expense_desc").val("");
                    $("#exMessage").html(data);
                }
            });
        }
        return false;
    });

    //update expense
    $("#editExMessage").hide();
    $("#editExpenseBtn").click(function () {
        $("#editExMessage").show();
        var expenseName = $("#editExpenseNameTxt").val();
        var expenseDesc = $("#editExpenseDesc").val();
        var expenseId = $("#editExpenseIdTxt").val();
        $.ajax({
            url: "ajax/editExpense.php",
            type: "POST",
            data: {expenseName: expenseName, expenseDesc: expenseDesc, expenseId: expenseId},
            cache: false,
            success: function (data) {
                //alert(data);
                $("#editExMessage").html(data);
            }
        });
        return false;
    });

    //admin insert
    $("#adminMessage").hide();
    $("#adminSubmit").click(function () {
        var isValid = $("#adminForm").valid();
        if (isValid) {
            $("#adminMessage").show();
            var adminName = $("#name").val();
            var adminEmail = $("#email").val();
            var password = $("#txtPassword").val();
            var adminRole = $("#adminRole").val();
            $.ajax({
                url: "ajax/adminInsert.php",
                type: "POST",
                data: {adminName: adminName, adminEmail: adminEmail, password: password, adminRole: adminRole},
                cache: false,
                success: function (data) {
                    //alert(data);
                    $("#name").val("");
                    $("#email").val("");
                    $("#txtPassword").val("");
                    $("#txtConfirmPassword").val("");
                    $("#adminRole").val("");
                    $("#adminMessage").html(data);
                }
            });
        }
        return false;
    });

    //edit admin
    $("#editAdminMessage").hide();
    $("#editAdminSubmit").click(function () {
        $("#editAdminMessage").show();
        var adminName = $("#admin_name").val();
        var adminId = $("#admin_id").val();
        var adminEmail = $("#admin_email").val();
        var adminRole = $("#admin_role").val();
        var password = $("#password").val();
        var confirm_password = $("#confirm_password").val();
        if (password !== confirm_password) {
            alert("Password and Confirm Password did not match");
            return false;
        }
        //alert(adminId);
        $.ajax({
            url: "ajax/editAdmin.php",
            type: "POST",
            data: {
                adminName: adminName,
                adminEmail: adminEmail,
                adminRole: adminRole,
                adminId: adminId,
                password: password
            },
            cache: false,
            success: function (data) {
                //alert(data);
                $("#editAdminMessage").html(data);
            }
        });
        return false;
    });

    //sub category insert
    $("#subCategoryMessage").hide();
    $("#subCategoryBtn").click(function () {
        var isValid = $("#subCategoryForm").valid();
        if (isValid) {
            $("#subCategoryMessage").show();
            var categoryId = $("#categoryId").val();
            var subTest = $("#subTest").val();
            var labId = $("#labID").val();
            var subTestPrice = $("#subTestPrice").val();
            $.ajax({
                url: "ajax/subCategoryInsert.php",
                type: "POST",
                data: {categoryId: categoryId, subTest: subTest, labId: labId, subTestPrice: subTestPrice},
                cache: false,
                success: function (data) {
                    //alert(data);
                    $("#categoryId").val("");
                    $("#subTest").val("");
                    $("#labID").val("");
                    $("#subTestPrice").val("");
                    $("#subCategoryMessage").html(data);
                }
            });
        }
        return false;
    });

    //expense invoice insert
    $("#expenseInvoiceMessage").hide();
    $("#expenseInvoiceBtn").click(function () {
        var isValid = $("#expenseInvoiceForm").valid();
        if (isValid) {
            $("#expenseInvoiceMessage").show();
            var invoiceNo = $("#invoiceNo").val();
            var date = $("#datepicker").val();
            var expenseInvoiceCategory = $("#expenseInvoiceCategory").val();
            var expenseInvoiceDesc = $("#expenseInvoiceDesc").val();
            var amount = $("#amount").val();
            $.ajax({
                url: "ajax/expenseInvoiceInsert.php",
                type: "POST",
                data: {
                    invoiceNo: invoiceNo,
                    date: date,
                    expenseInvoiceCategory: expenseInvoiceCategory,
                    expenseInvoiceDesc: expenseInvoiceDesc,
                    amount: amount
                },
                cache: false,
                success: function (data) {
                    //alert(data);
                    $("#invoiceNo").val("");
                    $("#datepicker").val("");
                    $("#expenseInvoiceCategory").val("");
                    $("#expenseInvoiceDesc").val("");
                    $("#amount").val("");
                    $("#expenseInvoiceMessage").html(data);
                }
            });
        }
        return false;
    });


    $('#docMessage').hide();
    //doctor insert
    $('#doctorForm').on('submit', (function (e) {
        var isValid = $('#doctorForm').valid();
        if (isValid) {
            e.preventDefault();
            $('#docMessage').show();
            $.ajax({
                url: "ajax/doctorInsert.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#doctorForm')[0].reset();
                    $('#docMessage').html(data);
                }
            });
        }
        return false;
    }));

    //edit doctor
    $('#editDocMessage').hide();
    $('#editDoctorForm').on('submit', (function (e) {
        $('#editDocMessage').show();
        e.preventDefault();
        $.ajax({
            url: "ajax/editDoctor.php",
            type: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $('#editDoctorForm')[0].reset();
                $('#editDocMessage').html(data);
            }
        });
    }));


    //test invoice add
    /*$('.cb').click(function () {
        var test_id = $(this).attr("id");
        var test_name = $('#name' + test_id).val();
        var test_price = $('#price' + test_id).val();
        var qty = $('#qty' + test_id).val();
        var action = "add";
        if (qty > 0) {
            $.ajax({
                url: "ajax/addInvoice.php",
                method: "POST",
                dataType: "json",
                data: {
                    test_id: test_id,
                    test_name: test_name,
                    test_price: test_price,
                    qty: qty,
                    action: action
                },
                success: function (data) {
                    $('#invoice_section').html(data.order_table);
                }
            });
        } else {
            alert("Please Select Test");
        }
    });*/

    /*$(document).on('click', '.delete', function () {
        var test_id = $(this).attr("id");
        var action = "remove";
        if (confirm("Are you sure want to remove?")) {
            $.ajax({
                url: "ajax/addInvoice.php",
                method: "POST",
                dataType: "json",
                data: {
                    test_id: test_id,
                    action: action
                },
                success: function (data) {
                    $('#invoice_section').html(data.order_table);
                }
            });
        } else {
            return false;
        }
    });*/

    /*$(document).on('keyup', '.qty', function () {
        var test_id = $(this).data("test_id");
        var qty = $(this).val();
        var action = "qty_change";
        if (qty != '') {
            $.ajax({
                url: "ajax/addInvoice.php",
                method: "POST",
                dataType: "json",
                data: {
                    test_id: test_id,
                    qty: qty,
                    action: action
                },
                success: function (data) {
                    $('#invoice_section').html(data.order_table);
                }
            });
        }
    });*/
});