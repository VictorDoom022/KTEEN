class Orders{
	constructor(food_id, name, quantity, price){
		this.food_id = food_id;
		this.name = name;
		this.quantity = quantity;
		this.price = price;
	}

	get getFood_id(){
		return this.food_id;
	}

	get getName(){
		return this.name;
	}

	get getQuantity(){
		return this.quantity;
	}

	get getPrice(){
		return this.price;
	}

	add_quantity(){
		this.quantity ++;
	}

	minus_quantiy(){
		this.quantity --;
	}

	get getTotalPrice(){
		return this.price * this.quantity;
	}
}