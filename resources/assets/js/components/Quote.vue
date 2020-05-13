<template>
	<div class="container">
		<div class='row'>
			<h1>Quotes</h1>
			<div class="col-sm-6">
				<button v-on:click="getRandom()" type="submit" class="btn btn-primary">Random Quote of the day</button>
			</div>
			<form action="#" @ok.prevent="getQuote()">
<!--				<div class="col-sm-6">-->
<!--					<div class="input-group">-->
<!--						<input v-model="id" type="text" name="id" class="form-control" placeholder="Enter a date..." autofocus>-->
						
						<div class="example-inputs">
							<datetime v-model="date"></datetime>
							<div class="values"><p><strong>Value:</strong> {{ date }}</p></div>
						</div>
<!--						<span class="input-group-btn">-->
<!--							<button type="submit" class="btn btn-primary">Quote of the day</button>-->
<!--						</span>-->
<!--					</div>-->
<!--				</div>-->
			</form>
		</div>
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Quote</h1>
				</div>
				<div  class="panel-body">
					<h2>{{quote.text}}</h2> <h4>{{quote.author}}</h4>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				list: [],
				date: null,
				day: null,
				quote: {
					id: '',
					text: '',
					author: ''
				}
			};
		},
		
		created() {
			this.fetchQuoteList();
		},
		
		methods: {
			fetchQuoteList() {
				axios.get('/quotes/').then((res) => {
					this.list = res.data;
				});
			},
			
			getQuote() {
				// axios.get('/quotes/quotd/' + this.id+'/')
				// axios.get('/quotes/quotd/' + this.date+'/')
				// 	.then((res) => {
				//
				// 		this.id = '';
				// 		this.quote = res.data[0]; //for some reason data is coming in as observer object of [0] to get the array
				// 		console.log(res.data[0]);
				// 	})
				// 	.catch((err) => console.error(err));
				console.log(date)
			},
			
			getRandom() {
				axios.get('/quotes/random/')
					.then((res) => {
						this.quote = res.data;
						console.log(res.data);
					})
					.catch((err) => console.error(err));
			},
		}
	}
</script>
