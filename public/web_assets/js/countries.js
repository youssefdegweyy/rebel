const countrySelect = document.getElementById("country");
const citySelect = document.getElementById("city");

// Function to populate countries from a real API endpoint
let countryData; // Define data at the global scope

function populateCountries() {
  fetch("https://countriesnow.space/api/v0.1/countries")
    .then((response) => response.json())
    .then((data) => {
      // Store the data globally
      countryData = data;

      // Filter out Israel from the country data
      const filteredCountries = data.data.filter(
        (country) => country.country !== "Israel"
      );

      // Sort the remaining country data by country name in alphabetical order
      const sortedCountries = filteredCountries.sort((a, b) => {
        const nameA = a.country.toUpperCase();
        const nameB = b.country.toUpperCase();
        if (nameA < nameB) return -1;
        if (nameA > nameB) return 1;
        return 0;
      });

      sortedCountries.forEach((country) => {
        const option = document.createElement("option");
        option.value = country.country;
        option.textContent = country.country;
        countrySelect.appendChild(option);
      });
    })
    .catch((error) => console.error("Error fetching countries:", error));
}

function populateCities(selectedCountry) {
  if (countryData) {
    const countryInfo = countryData.data.find(
      (country) => country.country === selectedCountry
    );
    if (countryInfo) {
      const cities = countryInfo.cities;
      citySelect.innerHTML = ""; // Clear current city options
      cities.forEach((cityName) => {
        const option = document.createElement("option");
        option.value = cityName;
        option.textContent = cityName;
        citySelect.appendChild(option);
      });
    } else {
      console.error("Country data not found for:", selectedCountry);
    }
  } else {
    console.error("Country data not available.");
  }
}

countrySelect.addEventListener("change", function () {
  const selectedCountry = countrySelect.value;
  populateCities(selectedCountry);
});

// Populate the country select when the page loads
populateCountries();
