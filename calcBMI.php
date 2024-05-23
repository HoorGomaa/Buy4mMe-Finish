<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bmi.css">
</head>
<body>
<div class="bmi-calculator">
    <h2>BMI Calculator</h2>
    <form id="bmiForm">
        <label for="height">Height (cm):</label>
        <input type="number" id="height" required>
        <label for="weight">Weight (kg):</label>
        <input type="number" id="weight" required>
        <button type="submit">Calculate BMI</button>
    </form>
    <div id="bmiResult"></div>
</div>
<!-- **************** -->
<div class="diet-planner">
    <h2>Diet Planner</h2>
    <form id="dietForm">
        <label for="food">Food Item:</label>
        <input type="text" id="food" required>
        <label for="calories">Calories:</label>
        <input type="number" id="calories" required>
        <button type="submit">Add Food</button>
    </form>
    <div id="dietPlan">
        <h3>Diet Plan</h3>
        <ul id="foodList"></ul>
        <p>Total Calories: <span id="totalCalories">0</span></p>
    </div>
</div>

    <script src="js/bmi.js"></script>
</body>
</html>