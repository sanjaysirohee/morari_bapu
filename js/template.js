const totalPeople = document.querySelector("#total_people");
const container = document.querySelector("#peopleContainer");
const template = document.querySelector("#personTemplate");


totalPeople.addEventListener("input", function () {
  container.innerHTML = "";
  // console.log(totalPeople.value);

  const count = parseInt(this.value);
  if (!count) return;

  for (let i = 1; i <= count; i++) {
    const clone = template.content.cloneNode(true);
    clone.querySelector(".person-no").innerText = i;
    container.appendChild(clone);
  }
});
