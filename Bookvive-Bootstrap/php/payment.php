<?php
require_once 'config.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script
        src="https://www.paypal.com/sdk/js?client-id=<?php echo PAYPAL_SANDBOX ? PAYPAL_SANDBOX_CLIENT_ID : PAYPAL_PROD_CLIENT_ID; ?>&currency=<?php echo $currency; ?>"></script>
    <link rel="stylesheet" href="paypal.css">
</head>

<body>
    <div class="panel">
        <div class="overlay hidden">
            <div class="overlay-content">
                <p>Loading</p>
            </div>
        </div>

        <div class="panel-heading">
            <h3 class="panel-title">Charge
                <?php echo '$' . $itemPrice; ?> with PayPal
            </h3>

            <!-- Product Info -->
            <p><b>Item Name:</b>
                <?php echo $itemName; ?>
            </p>
            <p><b>Price:</b>
                <?php echo '$' . $itemPrice . ' ' . $currency; ?>
            </p>
        </div>
        <div class="panel-body">
            <!-- Display status message -->
            <div id="paymentResponse" class="hidden"></div>

            <!-- Set up a container element for the button -->
            <div id="paypal-button-container"></div>
        </div>
    </div>
    <script>
        paypal.Buttons({
            // Sets up the transaction when a payment button is clicked
            createOrder: (data, actions) => {
                return actions.order.create({
                    "purchase_units": [{
                        "custom_id": "<?php echo $itemNumber; ?>",
                        "description": "<?php echo $itemName; ?>",
                        "amount": {
                            "currency_code": "<?php echo $currency; ?>",
                            "value": <?php echo $itemPrice; ?>,
                            "breakdown": {
                                "item_total": {
                                    "currency_code": "<?php echo $currency; ?>",
                                    "value": <?php echo $itemPrice; ?>
                                }
                            }
                        },
                        "items": [
                            {
                                "name": "<?php echo $itemName; ?>",
                                "description": "<?php echo $itemName; ?>",
                                "unit_amount": {
                                    "currency_code": "<?php echo $currency; ?>",
                                    "value": <?php echo $itemPrice; ?>
                                },
                                "quantity": "1",
                                "category": "DIGITAL_GOODS"
                            },
                        ]
                    }]
                });
            },
            // Finalize the transaction after payer approval
            onApprove: (data, actions) => {
                return actions.order.capture().then(function (orderData) {
                    setProcessing(true);

                    var postData = { paypal_order_check: 1, order_id: orderData.id };
                    fetch('paypalValidate.php', {
                        method: 'POST',
                        headers: { 'Accept': 'application/json' },
                        body: encodeFormData(postData)
                    })
                        .then((response) => response.json())
                        .then((result) => {
                            if (result.status == 1) {
                                // Redirige al usuario a la página de productos después de que se haya completado el pago
                                window.location.href = "productos.php";
                            } else {
                                const messageContainer = document.querySelector("#paymentResponse");
                                messageContainer.classList.remove("hidden");
                                messageContainer.textContent = result.msg;

                                setTimeout(function () {
                                    messageContainer.classList.add("hidden");
                                    messageText.textContent = "";
                                }, 5000);
                            }
                            setProcessing(false);
                        })
                        .catch(error => console.log(error));
                });
            }
        }).render('#paypal-button-container');

        const encodeFormData = (data) => {
            var form_data = new FormData();

            for (var key in data) {
                form_data.append(key, data[key]);
            }
            return form_data;
        }

        // Show a loader on payment form processing
        const setProcessing = (isProcessing) => {
            if (isProcessing) {
                document.querySelector(".overlay").classList.remove("hidden");
            } else {
                document.querySelector(".overlay").classList.add("hidden");
            }
        }    
    </script>
</body>

</html>