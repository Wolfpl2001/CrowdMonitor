function fetchWeatherData(api, locationType) {
    fetch(api)
        .then(response => response.json())
        .then(data => {
            updateWeatherUI(data, locationType);
        });
}

function updateWeatherUI(data, locationType) {
    const weatherInfoElement = document.getElementById('weatherInfo');
    const temperatureCelsius = convertKelvinToCelsius(data.main.temp);

    weatherInfoElement.innerHTML = `
        <p>Location: ${data.name}, ${data.sys.country}</p>
        <p>Temperature: ${temperatureCelsius} °C</p>
        <p>Description: ${data.weather[0].description}</p>
        <p>Precipitation: ${data.rain ? data.rain['1h'] || 0 : 0} mm</p>
        <p>Chance of Rain: ${data.clouds.all}%</p>
    `;
}

function convertKelvinToCelsius(kelvin) {
    return (kelvin - 273.15).toFixed(2);
}

function getWeather() {
    const locationInput = document.getElementById('locationInput');
    const cityCountry = locationInput.value;

    if (cityCountry) {
        const apiKey = '9be5102136e1e1b2a00abd70b5a40a9d';
        const weatherApi = `https://api.openweathermap.org/data/2.5/weather?q=${cityCountry}&appid=${apiKey}`;

        fetchWeatherData(weatherApi, 'user');
    } else {
        alert('Please enter a valid city, country.');
    }
}

function changeAmount() {
    const newAmount = prompt("Enter the new amount:");

    if (newAmount !== null && !isNaN(newAmount)) {
        document.getElementById('maxAmount').textContent = newAmount;
    } else {
        alert("Please enter a valid number.");
    }
}
