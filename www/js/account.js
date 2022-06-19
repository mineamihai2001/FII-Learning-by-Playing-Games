import {ajax} from "./modules.js";

const status = document.getElementById("status");

var table = new Tabulator("#result-table", {
    height:"311px",
    layout:"fitColumns",
    placeholder:"No Data Set",
    columns:[
        {title:"Name", field:"name", sorter:"string", width:200},
        {title:"Progress", field:"progress", sorter:"number", formatter:"progress"},
        {title:"Gender", field:"gender", sorter:"string"},
        {title:"Rating", field:"rating", formatter:"star", hozAlign:"center", width:100},
        {title:"Favourite Color", field:"col", sorter:"string"},
        {title:"Date Of Birth", field:"dob", sorter:"date", hozAlign:"center"},
        {title:"Driver", field:"car", hozAlign:"center", formatter:"tickCross", sorter:"boolean"},
    ],
});

document.getElementById("ajax-trigger").addEventListener("click", function(){
    table.setData("/application/leaderboards");
});