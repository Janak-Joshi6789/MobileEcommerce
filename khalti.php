
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>khalti</title>
<script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>


<style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Set background color */
            padding: 20px;
        }

        #payment-button {
            background-color: #4CAF50; /* Green background color */
            color: white; /* White text color */
            padding: 10px 20px; /* Padding */
            font-size: 16px; /* Font size */
            border: none; /* Remove border */
            border-radius: 5px; /* Add border radius */
            cursor: pointer; /* Cursor on hover */
            transition: background-color 0.3s; /* Smooth transition */
        }

        #payment-button:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        #payment-button:focus {
            outline: none; /* Remove focus outline */
        }

        #payment-button:active {
            background-color: #3e8e41; /* Darker green when clicked */
        }

        img {
            width: 100%; /* Make image fill the width of the container */
            margin-top: 20px; /* Add margin for spacing */
            height:400px;
        }</style>
</head>

<body>
<button id="payment-button" style="">Pay with Khalti</button>


<script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_ba37a78b0df143b1b38b8f089e48b32e",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "https://www.khec.edu.np/",
            "paymentPreference": [
                "KHALTI",
                "CONNECT_IPS",
                ],
            "eventHandler": {
                onSuccess (payload) {


                    // hit merchant api for initiating verfication
                    console.log(payload);

                    window.location.href = 'thank_you.php';
                    
                    
                    
                },
                onError (error) {
                    console.log(error);
                    
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount:1000});
        }
    </script>

<img src="image/khalti.png" alt="Description of the image" style="width:100%;">

</body>
</html>