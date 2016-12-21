import React from 'react';

const amount = React.createClass({
	getDefaultProps() {
		return {
			other: 'Other'
		}
	},
	
	getInitialState() {
		return {
			amount: 30
		}
	},

	changeAmount(amount,e) {
		if(e) e.preventDefault();
		this.setState({amount});
	},

	handleAmount(e) {
		let el = e.currentTarget;
		let amount = el.value;
		console.log(el, amount);
		if(amount == 5) el.focus();
		this.setState({amount});
	},

	render() {
		return (
			<div>
				<ul>
					<li> <a href="#" onClick={this.changeAmount.bind(null, 10)}>10</a> </li>
					<li> <a href="#" onClick={this.changeAmount.bind(null, 30)}>30</a> </li>
					<li> <a href="#" onClick={this.changeAmount.bind(null, 50)}>50</a> </li>
					<li> <a href="#" onClick={this.changeAmount.bind(null, 100)}>100</a> </li>
					<li> <a href="#" onClick={this.changeAmount.bind(null, 5)}>{this.props.other}</a> </li>
				</ul>
				<input type="text" onChange={this.handleAmount} value={this.state.amount} />
			</div>
		)
	}
});

export default amount;