import {ajax} from './modules.js';

const apiLogin = () => {
    alert("here");return;
    const url = "/application/api_login";
    const params = `name=${responsePayload.given_name}&email=${responsePayload.email}`;

    ajax({
        url: url,
        type: "POST",
        params: params
    }).then((result) => {
        console.log(result);
    });
}
