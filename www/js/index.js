import {ajax} from "./modules.js";

if(Cookies.get("image")) {
    console.log("image here");
    const picture = document.getElementById("picture");
    const url = Cookies.get("image");
    picture.src = url;
} else {
    console.log('no image');
}