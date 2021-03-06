paypal.Buttons({
    style : {
        display: 'block'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units : [{
                amount: {
                    value: document.querySelector("#totalPrice").value
                }
            }]
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            console.log(details)
            // window.location.replace("http://localhost:63342/tutorial/paypal/success.php")
        })
    },
    onCancel: function (data) {
        window.location.replace("http://localhost:63342/tutorial/paypal/Oncancel.php")
    }
}).render('#paypalBtn');