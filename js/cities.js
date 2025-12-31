document.addEventListener("DOMContentLoaded", function () {

  const country = document.querySelector('#country');
  const state = document.querySelector('#state');
  const city = document.querySelector('#city');

  let countries = [];

  fetch("https://raw.githubusercontent.com/dr5hn/countries-states-cities-database/refs/heads/master/json/countries%2Bstates%2Bcities.json")
    .then(res => res.json())
    .then(data => {
      countries = data;
      country.innerHTML = `<option value="">Select Country</option>`;
      data.forEach(c => {
        country.innerHTML += `<option value="${c.name}" data-id="${c.id}">${c.name}</option>`;
      });
    });

  /* COUNTRY CHANGE */
  country.addEventListener("change", function () {
  state.innerHTML = `<option value="">Select State</option>`;
  city.innerHTML = `<option value="other" selected >Select City</option>`;

  if (!this.value) return;

  const countryId =
    this.options[this.selectedIndex].dataset.id;

  const selectedCountry =
    countries.find(c => c.id == countryId);

  selectedCountry.states.forEach(s => {
    state.innerHTML += `
      <option value="${s.name}" data-id="${s.id}">
        ${s.name}
      </option>`;
  });
});


  /* STATE CHANGE */
  state.addEventListener("change", function () {
  city.innerHTML = `<option value="other" selected >Select City</option>`;

  if (!this.value) return;

  const countryId =
    country.options[country.selectedIndex].dataset.id;

  const stateId =
    this.options[this.selectedIndex].dataset.id;

  const selectedCountry =
    countries.find(c => c.id == countryId);

  const selectedState =
    selectedCountry.states.find(s => s.id == stateId);

  selectedState.cities.forEach(c => {
    city.innerHTML += `
      <option value="${c.name}">
        ${c.name}
      </option>`;
  });
});


});
