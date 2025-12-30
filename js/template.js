const totalPeople = document.querySelector("#total_people");
const container = document.querySelector("#peopleContainer");
const template = document.querySelector("#personTemplate");

totalPeople.addEventListener("input", function () {
  container.innerHTML = "";
  // console.log(totalPeople.value);

  const count = parseInt(this.value);
  if (!count) return;
  for (let i = 0; i < count; i++) {
    const clone = template.content.cloneNode(true);
    clone.querySelector(".person-no").innerText = i+1;
    clone.querySelectorAll('input[type=radio]').forEach(radio=>{
      radio.name=`gender[${i}]`;
    })
    container.appendChild(clone);
  }
});
