import "flowbite";
import { Dismiss } from "flowbite";

const progress = document.getElementById("progress");

const toast = new Dismiss(document.getElementById("toast-success"), null, {
  timing: "ease-out",
  transition: "transition-all",
});

setTimeout(() => {
  toast.hide();
}, 3000);

(function () {
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
        progress.style.width = `${width}%`;
      }
    }, 30);
  }
})();
