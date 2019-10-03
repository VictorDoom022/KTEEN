class Orders{
	constructor(food_id, quantity, remark){
		this.food_id = food_id;
		this.quantity = quantity;
		this.remark = remark;
	}

	get getFood_id(){
		return this.food_id;
	}

	get getQuantity(){
		return this.quantity;
	}

	get getRemark(){
		return this.remark;
	}

	set getRemark(remark){
		this.remark  = remark;
	}

	add_quantity(){
		this.quantity ++;
	}
}