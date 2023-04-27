<!DOCTYPE html>
<html>
<head>
	<title>Payment Page</title>
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
	<script>

		paypal.Button.render({
			env: 'sandbox',
			client: {
				sandbox: 'AQWAg2qRpEb2nqKbdkpfMinJgU-wfqoSPsQSLE9U2apT6fB79vy-EN95vbTBTMXBf7Mn6pFzSCyaOU-b',
				production: '<insert your production client id>'
			},
            style:
            {
                color: 'black',
                label: 'paypal',
                tagline: 'false'
            },
			commit: true,
			payment: function(data, actions) {
				return actions.payment.create({
					payment: {
						transactions: [{
							amount: { total: '9.99', currency: 'GBP' }
						}]
					}
				});
			},
			onAuthorize: function(data, actions) {
				return actions.payment.execute().then(function() {
					window.alert('Payment Complete!');
				});
			}
		}, '#paypal-button');
	</script>
</head>
<body>
	<h1>Payment Page</h1>
	<p>Click the button below to make a payment:</p>
	<div id="paypal-button"></div>
</body>
</html>
