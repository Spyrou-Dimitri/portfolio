import {settings} from "./settings";
import {observers} from "./observers";
import { Fancybox } from "@fancyapps/ui";

import "@fancyapps/ui/dist/fancybox/fancybox.css";
function fancybox() {
    document.addEventListener("DOMContentLoaded", function () {
        Fancybox.bind('[data-fancybox="gallery"]', {});
    });
}

fancybox();


observers.init()