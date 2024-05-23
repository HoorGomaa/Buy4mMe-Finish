document.getElementById('bmiForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const height = parseFloat(document.getElementById('height').value) / 100;
    const weight = parseFloat(document.getElementById('weight').value);
    const bmi = (weight / (height * height)).toFixed(2);

    let resultMessage = `Your BMI is ${bmi}. `;
    if (bmi < 18.5) {
        resultMessage += 'You are underweight.';
    } else if (bmi < 24.9) {
        resultMessage += 'You are normal weight.';
    } else if (bmi < 29.9) {
        resultMessage += 'You are overweight.';
    } else {
        resultMessage += 'You are obese.';
    }

    document.getElementById('bmiResult').innerText = resultMessage;
});
// *********************
document.getElementById('dietForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const food = document.getElementById('food').value;
    const calories = parseInt(document.getElementById('calories').value);
    const foodList = document.getElementById('foodList');
    const totalCalories = document.getElementById('totalCalories');

    // Add food item to the list
    const listItem = document.createElement('li');
    listItem.textContent = `${food} - ${calories} kcal`;
    foodList.appendChild(listItem);

    // Update total calories
    totalCalories.textContent = parseInt(totalCalories.textContent) + calories;

    // Clear input fields
    document.getElementById('food').value = '';
    document.getElementById('calories').value = '';
});
