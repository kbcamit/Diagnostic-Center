<?php
session_start();
if (isset($_POST['test_id'])) {
    $order_table = '';
    if ($_POST['action'] == "add") {
        if (isset($_SESSION['test_cart'])) {
            $is_available = 0;
            foreach ($_SESSION['test_cart'] as $keys => $value) {
                if ($_SESSION['test_cart'][$keys]['test_id'] == $_POST['test_id']) {
                    $is_available++;
                    $_SESSION['test_cart'][$keys]['qty'] = $_SESSION['test_cart'][$keys]['qty'] + $_POST['qty'];
                }
            }
            if ($is_available < 1) {
                $item_array = array(
                    'test_id' => $_POST['test_id'],
                    'test_name' => $_POST['test_name'],
                    'test_price' => $_POST['test_price'],
                    'qty' => $_POST['qty']
                );
                $_SESSION['test_cart'][] = $item_array;
            }
        } else {
            $item_array = array(
                'test_id' => $_POST['test_id'],
                'test_name' => $_POST['test_name'],
                'test_price' => $_POST['test_price'],
                'qty' => $_POST['qty']
            );
            $_SESSION['test_cart'][] = $item_array;
        }
    }
    if ($_POST['action'] == "remove") {
        foreach ($_SESSION['test_cart'] as $keys => $value) {
            if ($value['test_id'] == $_POST['test_id']) {
                unset($_SESSION['test_cart'][$keys]);
            }
        }
    }
    /*if ($_POST['action'] == "qty_change") {
        foreach ($_SESSION['test_cart'] as $keys => $value) {
            if ($_SESSION['test_cart'][$keys]['test_id'] == $_POST['test_id']) {
                $_SESSION['test_cart'][$keys]['qty'] = $_POST['qty'];
            }
        }
    }*/
    $order_table .= '
        <table class="table table-bordered">
        <tr>
            <th>Test Name</th>
            <th>Test Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    ';
    if (!empty($_SESSION['test_cart'])) {
        $total = 0;
        foreach ($_SESSION['test_cart'] as $keys => $value) {
            $order_table .= '
                <tr>
                    <td>' . $value['test_name'] . '</td>
                    <td width="20%"><input type="text" readonly name="qty[]" value="' . $value['qty'] . '" id="test_qty' . $value['test_id'] . '" class="form-control qty" data-test-id="' . $value['test_id'] . '"></td>
                    <td>' . $value['test_price'] . '</td>
                    <td>' . $value['test_price'] * $value['qty'] . '</td>
                    <td><button name="delete" class="btn btn-danger btn-xs delete" id="' . $value['test_id'] . '">Remove</button></td>
                </tr>
            ';
            $total += ($value['qty'] * $value['test_price']);
        }

    }
    $order_table .= '</table>';
    $order_table .= '<input type="hidden" value="' . $total . '" name="total_price" class="price total" id="total">';
    $output = array(
        'order_table' => $order_table,
    );
    echo json_encode($output);
}


