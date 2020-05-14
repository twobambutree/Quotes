<template>
	<div class="container">
		<div class='row'>
			<h1>Quotes</h1>
			<div class="navbar-form navbar-left">
				<button @click="getRandom()" type="submit" class="btn btn-default">Get a random quote</button>
			</div>
			<form class="navbar-form navbar-right" action="#" @submit.prevent="getQuote()">
				<div class="form-group">
					<datetime v-model="date" placeholder="Enter the date.." ></datetime>
				</div>
				<button type="submit" class="btn btn-default">Get a quote of the day</button>
			</form>
		</div>
		
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="panel-title">Quote</h1>
				</div>
				<div  class="panel-body">
					<h2>{{quote.text}}</h2>
					<h4>{{quote.author}}</h4>
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
				quote: {
					id: '',
					text: '',
					author: ''
				}
			};
		},
		
		created() { // to get the full list of quotes
			this.fetchQuoteList();
		},
		
		methods: {
			fetchQuoteList() {
				axios.get('/quotes/').then((res) => {
					this.list = res.data;
				});
			},
			
			getQuote() {
				axios.get('/quotes/quotd/' + this.subStr(this.date) +'/')
				.then((res) => {
					this.quote = res.data[0]; //for some reason data is coming in as observer object of [0] to get the array
					this.quote.author = this.authorCheck(this.quote.author);
					console.log(res.data[0]);
					console.log(this.subStr(this.date));
				})
				.catch((err) => console.error(
					err,
					alert("You must enter a date!")
				));
			},
			
			getRandom() {
				axios.get('/quotes/random/')
					.then((res) => {
						this.quote = res.data;
						this.quote.author = this.authorCheck(this.quote.author);
						console.log(res.data);
					})
					.catch((err) => console.error(err));
			},
			
			subStr(string) { //bringing in substring function
				return string.substring(10,8);
			},
			
			authorCheck(string) { //checking for unknown author
				if (string == null)
					return 'Unknown';
				else
					return string;
			}
		}
	}
</script>
