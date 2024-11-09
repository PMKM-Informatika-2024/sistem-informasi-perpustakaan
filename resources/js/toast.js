import { Dismiss } from "flowbite";

const progressElement = document.getElementById("progress");
const toastElement = new Dismiss(document.getElementById("toast-success") || null);

function progress() {
  let step = 0;

  if (step == 0) {
    step = 1;

    let width = 1;
    const interval = setInterval(() => {
      if (width >= 100) {
        clearInterval(interval);
        step = 0;
      } else {
        width++;
        progressElement.style.width = `${width}%`;
      }
    }, 30);
  }
}

progress();
setTimeout(() => {
  toastElement.hide();
}, 3000);
