@extends('layouts.front')

	@section('stylesheets')
	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
	@endsection


@section('content')
	<div class="container">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-12">
					<h2>Dados para Pagamento</h2>
					<hr>
				</div>
			</div>
			<form class="" method="post">

				<div class="row">
					<div class="col-md-12 form-group">
						<label>Nome no Cartão</label>
						<input type="text" class="form-control" name="card_name">
					</div>
				</div>
			
			<div class="row">
				<div class="col-md-12 form-group">
					<label>Número do Cartão <span class="brand"></span></label>
					<input type="text" class="form-control" name="card_number">
					<input type="hidden" name="card_brand">
				</div>
			</div>

			<div class="row">
				
				<div class="col-md-2 form-group">
					<label>MÊs de Expiração</label>
					<input type="text" class="form-control" name="card_month">
				</div>

				<div class="col-md-2 form-group">
					<label>Ano de Expiração</label>
					<input type="text" class="form-control" name="card_year">
				</div>
				
				<div class="col-md-4 form-group ml-2">
					<label>Código de Segurança</label>
					<input type="text" class="form-control" name="card_cvv">
				</div>

					<div class="col-md-12 installments form-group">
						
					</div>

				<button class="btn btn-success btn-lg processCheckout">Efetuar Pagamento </button>

			</div>

			</form>
		</div>
	</div>

@endsection

@section('scripts')
	
	<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" 
	integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" 
	crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
	<script>

		const sessionId = '{{session()->get('pagseguro_session_code')}}';
		PagSeguroDirectPayment.setSessionId(sessionId);
	
	</script>

	<script>

			let amoutTransaction = '{{ $cartItems }}';

			let cardNumber = document.querySelector('input[name=card_number]');
			let spanBrand  = document.querySelector('span.brand');

			cardNumber.addEventListener('keyup', function(){
				if(cardNumber.value.length >= 6){
					PagSeguroDirectPayment.getBrand({
						
						cardBin: cardNumber.value.substr(0, 6),
						success: function(res){
							//console.log(res);
							//spanBrand.innerHTML = res.brand.name;
							let imgFlag = `<img src =" https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/68x30/${res.brand.name}.png">`;
								spanBrand.innerHTML = imgFlag;
							document.querySelector('input[name=card_brand]').value = res.brand.name;
							getInstallments(amoutTransaction, res.brand.name);
						},
						error: function(err){
							console.log(err);
						},
						complete: function(res){
							//console.log('Complete: ', res);
						}
					
					});
				}
				
			});

			let submitButton = document.querySelector('button.processCheckout');

			submitButton.addEventListener('click', function(event){
				//alert(submitButton);
				event.preventDefault();

					PagSeguroDirectPayment.createCardToken({
					cardNumber: document.querySelector('input[name=card_number]').value,
					brand:      document.querySelector('input[name=card_brand]').value,
					cvv:        document.querySelector('input[name=card_cvv]').value,
					expirationMonth: document.querySelector('input[name=card_month]').value,
					expirationYear: document.querySelector('input[name=card_year]').value,
					
					success: function(res){
						proccessPayment(res.card.token)
					}

				});

			});


			function proccessPayment(token){

				let data = {
					card_token: token,
					hash: PagSeguroDirectPayment.getSenderHash(),
					installments: document.querySelector('select.select_installments').value,
					card_name: document.querySelector('input[name=card_name]').value,
					_token: '{{csrf_token()}}'
				};

				$.ajax({

					type: 'POST',
					url: '{{route("checkout.proccess")}}',
					data: data,
					dataType: 'json',
					success: function(res){
						
						toastr.success(res.data.message, 'sucesso');

						window.location.href = '{{route('checkout.thanks')}}?order=' + res.data.order; 
					}

				});
				
			}



			function getInstallments(amount, brand){
					
					PagSeguroDirectPayment.getInstallments({
					amount: amount,
					brand:  brand,
					maxInstallmentNoInterest: 0,
					success: function(res){
						let SelectInstallments = drawSelectInstallments(res.installments[brand]);
						document.querySelector('div.installments').innerHTML = SelectInstallments;
					},

					error: function(err){
						console.log(err);
					},

					complete: function(res){
					
					}
				});
			}

			function drawSelectInstallments(installments) {
			let select = '<label>Opções de Parcelamento:</label>';

			select += '<select class="form-control select_installments">';

			for(let l of installments) {
			    select += `<option value="${l.quantity}|${l.installmentAmount}">${l.quantity}x de ${l.installmentAmount} - Total fica ${l.totalAmount}</option>`;
			}


			select += '</select>';

			return select;
		}

	</script>
@endsection
