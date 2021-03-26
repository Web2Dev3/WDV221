let recipes = [];
let ingredients = [];
let directions = [];

const addRecipe = (ev) => {
ev.preventDefault();
let recipe = {
	title: document.getElementById('title').value,
	image: document.getElementById('image').value,
	servings: document.getElementById('servings').value,
	prep: document.getElementById('prep').value,
	cook: document.getElementById('cook').value,
	difficulty: document.getElementById('difficulty').value
}

	let validForm = true;
		let Value = document.querySelector("#title").value;
		let Value2 = document.querySelector("#image").value;
		let Value3 = document.querySelector("#servings").value;
		let Value4 = document.querySelector("#prep").value;
		let Value5 = document.querySelector("#cook").value;
		let Value6 = document.querySelector("#difficulty").value;
		if (Value === "" || Value2 === "" || Value3 === "" || Value4 === "" || Value5 === "" || Value6 === "") {
		validForm = false;
		alert("Input required");
		}
		else if (Value === " " || Value2 === " " || Value3 === " " || Value4 === " " || Value5 === " " || Value6 === " ") {
		validForm = false;
		alert("Input required");
		}
	        else if (Value3 < 0) {
			validForm = false;
			alert("Cannot use negative numbers");
			}
		else {
			validForm = true;
			recipes.push(recipe);
			document.querySelector('#myForm').reset();
			document.querySelector('#display').innerHTML = "The recipe has been added.";

			let w = JSON.stringify(recipes);

			localStorage.setItem('New_Recipes', w);

			let r = JSON.parse(localStorage.getItem('New_Recipes'));
			}
		}


document.addEventListener ('DOMContentLoaded', () => {
	document.getElementById('btn1').addEventListener('click', addRecipe);
});

const addIngredient = (ev) => {
ev.preventDefault();
let ingredient = {
	quantity: document.getElementById('quantity').value,
	ingredients: document.getElementById('ingredients').value
}

	let validForm = true;
		let Value7 = document.querySelector("#ingredients").value;
		let Value8 = document.querySelector("#quantity").value;
		if (Value7 === "" || Value8 === "") {
		validForm = false;
		alert("Input required");
		}
		else if (Value7 === " " || Value8 === " ") {
		validForm = false;
		alert("Input required");
		}
	        else if (Value8 < 0) {
			validForm = false;
			alert("Cannot use negative numbers");
			}
		else {
			validForm = true;
			ingredients.push(ingredient);
			let counter = 0;
				for (let a = 0; a < ingredients.length; a++) {
					counter++;
				}
			document.querySelector('#form2').reset();
			document.querySelector('#display2').innerHTML = counter+" ingredients have been added.";

			let y = JSON.stringify(ingredients);

			localStorage.setItem('New_Ingredients', y);

			let s = JSON.parse(localStorage.getItem('New_Ingredients'));
			}
		}


document.addEventListener ('DOMContentLoaded', () => {
	document.getElementById('btn2').addEventListener('click', addIngredient);
});

const addDirection = (ev) => {
ev.preventDefault();
let direction = {
	directions: document.getElementById('directions').value
}

	let validForm = true;
		let Value9 = document.querySelector("#directions").value;
		if (Value9 === "") {
		validForm = false;
		alert("Input required");
		}
		else if (Value9 === " ") {
		validForm = false;
		alert("Input required");
		}
		else {
			validForm = true;
			directions.push(direction);
			let counter2 = 0;
				for (let num = 0; num < directions.length; num++) {
					counter2++;
				}
			document.querySelector('#form3').reset();
			document.querySelector('#display3').innerHTML = counter2+" directions have been added.";

			let z = JSON.stringify(directions);

			localStorage.setItem('New_Directions', z);

			let t = JSON.parse(localStorage.getItem('New_Directions'));
			}
		}


document.addEventListener ('DOMContentLoaded', () => {
	document.getElementById('btn3').addEventListener('click', addDirection);
});