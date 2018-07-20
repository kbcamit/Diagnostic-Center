$(document).ready(function () {
    //admin form validation
    $("#adminForm").validate({
        rules: {
            name: "required",
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 5
            },
            confirm_password: {
                required: true,
                minlength: 5,
                equalTo: "#txtPassword"
            },
            admin_role: {
                required: true
            }
        },
        messages: {
            name: "Please provide your name",
        }
    });

    //category form validation
    $("#categoryForm").validate({
        rules: {
            category_name: "required"
        },
        messages: {}
    });

    //doctor form validation
    $("#doctorForm").validate({
        rules: {
            image: "required",
            doctor_name: "required",
            father_name: "required",
            mother_name: "required",
            email: {
                required: true,
                email: true
            },
            doc_dob: "required",
            mobile_no: "required",
            contact_address: "required",
            designation: "required",
            doc_join_date: "required",
        },
        messages: {}
    });

    //expense form validation
    $("#expenseForm").validate({
        rules: {
            expense_category_name: "required",
            expense_desc: "required"
        },
        messages: {}
    });

    //sub category validation
    $("#subCategoryForm").validate({
        rules: {
            category_id: "required",
            sub_test: "required",
            lab_id: "required",
            sub_test_price: "required"
        },
        messages: {}
    });


});