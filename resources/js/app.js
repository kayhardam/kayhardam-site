import { initPromptGenerator } from "./promt-generator";

initPromptGenerator();

import Alpine from "alpinejs";
import { leerdoelCoach } from "./leerdoel-coach";

Alpine.data("leerdoelCoach", leerdoelCoach);

window.Alpine = Alpine;
Alpine.start();
