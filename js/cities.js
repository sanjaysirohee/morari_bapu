const stateSelect = document.getElementById("state");
const citySelect = document.getElementById("city");

// ONLINE JSON FILE
const dataURL =
  "https://raw.githubusercontent.com/sab99r/Indian-States-And-Districts/master/states-and-districts.json";

let indiaData = [];

// Load data from internet
fetch(dataURL)
  .then(response => response.json())
  .then(data => {
    indiaData = data.states;

    // Fill state dropdown
    indiaData.forEach(state => {
      const option = document.createElement("option");
      option.value = state.state;
      option.text = state.state;
      stateSelect.appendChild(option);
    });
  });

// When state changes
stateSelect.addEventListener("change", function () {
  citySelect.innerHTML = "<option value=''>Select City</option>";

  const selectedState = this.value;

  const stateObj = indiaData.find(
    s => s.state === selectedState
  );

  if (!stateObj) return;

  stateObj.districts.forEach(city => {
    const option = document.createElement("option");
    option.value = city;
    option.text = city;
    citySelect.appendChild(option);
  });
});
